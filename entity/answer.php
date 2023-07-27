<?php
require_once('./utils/loadClass.php');
class Answer
{

    private int $id_answers;
    private string $answer;
    private bool $isCorrect;
    public function __construct(array $datas)
    {
        $this->hydrate($datas);
    }

    /**
     * Get the value of answer
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set the value of answer
     *
     * @return  self
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId_answer()
    {
        return $this->id_answers;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId_answer($id_answers)
    {
        $this->id_answers = $id_answers;

        return $this;
    }

    /**
     * Get the value of isCorrect
     */
    public function getIsCorrect()
    {
        return $this->isCorrect;
    }

    /**
     * Set the value of isCorrect
     *
     * @return  self
     */
    public function setIsCorrect($isCorrect)
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }


    public function hydrate(array $datas)
    {
        if (isset($datas["id_answers"])) {
            $this->setId_Answer($datas["id_answers"]);
        }

        if (isset($datas["answer"])) {
            $this->setAnswer($datas["answer"]);
        }

        if (isset($datas["isCorrect"])) {
            $this->setIsCorrect($datas["isCorrect"]);
        }
    }
}
