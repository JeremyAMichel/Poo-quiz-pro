<?php

require_once('./utils/loadClass.php');
class Question
{
    private int $id_question;
    private string $question;

    private array $answers;
    private AnswerRepository $answerRepo;

    public function __construct(array $datas, PDO $bdd)
    {
        $this->hydrate($datas);
        $this->setAnswerRepo($bdd);
        $this->setAnswers($this->answerRepo->findAllAnswersByIdQuestion($datas['id_question']));
    }

    /**
     * Get the value of id_question
     */ 
    public function getId_question()
    {
        return $this->id_question;
    }

    /**
     * Set the value of id_question
     *
     * @return  self
     */ 
    public function setId_question($id_question)
    {
        $this->id_question = $id_question;

        return $this;
    }

    /**
     * Get the value of question
     */ 
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set the value of question
     *
     * @return  self
     */ 
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get the value of answerRepo
     */ 
    public function getAnswerRepo()
    {
        return $this->answerRepo;
    }

    /**
     * Set the value of answerRepo
     *
     * @return  self
     */ 
    public function setAnswerRepo(PDO $bdd)
    {
        $this->answerRepo = new AnswerRepository($bdd);

        return $this;
    }

    /**
     * Get the value of answers
     */ 
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Set the value of answers
     *
     * @return  self
     */ 
    public function setAnswers(array $answers) // je receptionne mon tableau de réponse
    {
        $this->answers = $answers;

        return $this;
    }

    public function hydrate(array $datas)
    {
        if (isset($datas["id_question"])) {
            $this->setId_question($datas["id_question"]);
        }

        if (isset($datas["question"])) {
            $this->setQuestion($datas["question"]);
        }
    }
}
