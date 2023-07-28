<?php

class Qcm
{
    private int $id_qcm;

    private array $questions;


    public function __construct(array $datas, array $questions)
    {
        $this->hydrate($datas);
        $this->setQuestions($questions);
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

    public function generate()
    {
        foreach($this->getQuestions() as $question){
            echo $question->getQuestion();
            echo '<br><br>';

            foreach($question->getAnswers() as $answer){
                echo '- ' . $answer->getAnswer();
                echo '<br>';
            }

            echo '<br><br>';
        }
    }
}
