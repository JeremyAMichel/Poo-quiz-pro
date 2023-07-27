<?php

class QuestionRepository {

    private PDO $db; // Instance de PDO

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }


    public function findAllQuestionByQcmId (int $id_qcm) {
        $query = 'SELECT * FROM `questions` INNER JOIN id_qcm_question ON questions.id_question = id_qcm_question.id_question WHERE id_qcm = ?';
        $result = $this->db->prepare($query);
        $result->execute([$id_qcm]);
        $questionsDatas = $result->fetchAll(PDO::FETCH_ASSOC);
        $questions = [];

        // var_dump($questionsDatas);   

        foreach($questionsDatas as $questionData) {
            $questions[] = new Question($questionData, $this->getDb() );
        }

        return $questions;
    }








    public function getDb(): PDO
    {
        return $this->db;
    }

    /**
     * Set the value of db
     *
     * @return  self
     */
    public function setDb($db): self
    {
        $this->db = $db;

        return $this;
    }
}

?>