<?php

require_once('utils/loadClass.php');
require_once('utils/db_connect.php');




$QcmRepo = new QcmRepository($bdd);

$Qcm = $QcmRepo->findAllById(1);

$Qcm->generate();

?>


