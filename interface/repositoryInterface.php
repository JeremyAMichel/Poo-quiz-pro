<?php

interface repositoryInterface
{
    public function getDb();
    public function setDb(PDO $db);
    public function findAllById(int $id);
}

?>