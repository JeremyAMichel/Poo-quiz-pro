<?php

class QcmRepository
{
    private PDO $db; // Instance de PDO

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    public function findQcmById(int $id_qcm)
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
