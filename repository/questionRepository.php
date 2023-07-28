<?php

class QuestionRepository implements repositoryInterface
{

    private PDO $db; // Instance de PDO

    public function __construct(PDO $db)
    {
        $this->setDb($db);
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


    /**
     * Find all the questions related to a Qcm (using his id)
     * 
     * @return array of Question
     */
    public function findAllById (int $id_qcm) {
        $query = 'SELECT * FROM `questions` INNER JOIN qcms_questions ON questions.id_question = qcms_questions.id_question WHERE id_qcm = ?';
        $result = $this->db->prepare($query);
        $result->execute([
            $id_qcm
        ]);
        $questionsDatas = $result->fetchAll(PDO::FETCH_ASSOC);

        // $questions = [];
        // foreach($questionsDatas as $questionData) {
        //     $questions[] = new Question($questionData, $this->getDb() );
        // }

        return $questionsDatas;
    }
}

?>