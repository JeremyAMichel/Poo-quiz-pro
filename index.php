<?php

require_once('utils/loadClass.php');
require_once('utils/db_connect.php');

$quizFactory = new QuizFactory(new QcmRepository($bdd), new AnswerRepository($bdd), new QuestionRepository($bdd));



$qcm = $quizFactory->makeQuiz(1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php $qcm -> generate() ?>
</body>
</html>


