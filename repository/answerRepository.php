<?php



class AnswerRepository implements repositoryInterface
{
    private PDO $db; // Instance de PDO

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

      /**
     * Get the value of db
     */
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

    public function findAllById(int $id_question): array
    {
        $query = 'SELECT * FROM answers WHERE answers.id_question = :id_question';
        $result = $this->db->prepare($query);
        $result->execute([
            ':id_question' => $id_question,
        ]);
        $answersDatas = $result->fetchAll(PDO::FETCH_ASSOC);
        // $answers = [];
     
        // foreach($answersDatas as $answerData) {            
        //     $answers[] = new Answer($answerData);
        // }

        return $answersDatas;
    }
}
