<?php

require_once('./utils/loadClass.php');
class Question
{
    private int $id_question;
    private string $question;

    private array $answers;

    public function __construct(array $datas, array $answers)
    {
        $this->hydrate($datas);
        $this->setAnswers($answers);
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

        if (isset($datas["intitulé"])) {
            $this->setQuestion($datas["intitulé"]);
        }
    }
}
