<?php
$dns = "mysql:host=localhost;dbname=quiz_poo";
$user = "root";
$password = "";

try {
    $bdd = new PDO ($dns,$user,$password);
} catch (Exception $message) {
    echo "il y a un souci <br>" . "<pre>$message</pre>";
}
