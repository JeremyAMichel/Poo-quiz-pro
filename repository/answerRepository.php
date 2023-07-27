<?php



class AnswerRepository
{
    private PDO $db; // Instance de PDO

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    // public function createAnswer(Answer $answer)
    // {
    //     $request = $this->db->prepare('INSERT INTO cat (id, answers, isCorrect) VALUES(:id, :answers, :isCorrect)');
    //     $request->execute([
    //         ':id' => $answers->getId(),
    //         ':answers' => $answers->getAnswers(),
    //         ':isCorrect' => $answers->getisCorrect(),
    //     ]);
    // }

    public function findAllAnswersByIdQuestion(int $id_question): array
    {
        $query = 'SELECT * FROM answers WHERE answers.id_question = :id_question';
        $result = $this->db->prepare($query);
        $result->execute([
            ':id_question' => $id_question,
        ]);
        $answersDatas = $result->fetchAll(PDO::FETCH_ASSOC);
        $answers = [];


        
        foreach($answersDatas as $answerData) {            
            $answers[] = new Answer($answerData);
        }

        // var_dump($answers);
        return $answers;
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
}
