<?php

class Qcm
{
    private int $id_qcm;

    private array $questions;
    private QuestionRepository $questionRepo;


    public function __construct(array $datas, PDO $bdd)
    {
        $this->hydrate($datas);
        $this->setQuestionRepo($bdd);
        $this->setQuestions($this->getQuestionRepo()->findAllQuestionByQcmId($this->id_qcm));
    }


    /**
     * Get the value of id_qcm
     */
    public function getId_qcm()
    {
        return $this->id_qcm;
    }

    /**
     * Set the value of id_qcm
     *
     * @return  self
     */
    public function setId_qcm($id_qcm)
    {
        $this->id_qcm = $id_qcm;

        return $this;
    }

    /**
     * Get the value of questionRepo
     */
    public function getQuestionRepo()
    {
        return $this->questionRepo;
    }

    /**
     * Set the value of questionRepo
     *
     * @return  self
     */
    public function setQuestionRepo(PDO $bdd)
    {
        $this->questionRepo = new QuestionRepository($bdd);

        return $this;
    }


    /**
     * Get the value of questions
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set the value of questions
     *
     * @return  self
     */
    public function setQuestions(array $questions)
    {
        $this->questions = $questions;

        return $this;
    }

    public function hydrate(array $datas)
    {
        if (isset($datas["id_qcm"])) {
            $this->setId_qcm($datas["id_qcm"]);
        }
    }
}
