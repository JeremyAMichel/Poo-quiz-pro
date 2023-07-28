<?php

class QcmRepository implements repositoryInterface
{
    private PDO $db; // Instance de PDO

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Get the value of db
     * 
     * @return PDO
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
    public function setDb(PDO $db): self
    {
        $this->db = $db;

        return $this;
    }

    public function findAllById(int $id_qcm)
    {
        $query = 'SELECT * FROM qcms WHERE qcms.id_qcm = :id_qcm';
        $result = $this->db->prepare($query);
        $result->execute([
            ':id_qcm' => $id_qcm,
        ]);
        $qcmData = $result->fetch(PDO::FETCH_ASSOC);

        $qcm = new Qcm($qcmData, $this->getDb());
        return $qcm;

    }


    
}
