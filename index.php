<?php

require_once('utils/loadClass.php');
require_once('utils/db_connect.php');




$QcmRepo = new QcmRepository($bdd);

$Qcm = $QcmRepo->findQcmById(1);

var_dump($Qcm);

// echo $question->getQuestion();
// echo '<br>';
// echo '<br>';

// foreach($question->getAnswers() as $answer) {
//     echo $answer->getAnswer();
//     echo '<br>';
    
// };

?>


