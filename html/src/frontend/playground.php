<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

try {
    $conn = \CandidateTest\Helpers\DbHelper::getPdoConnection();

    $st = $conn->prepare('SELECT * FROM manufacturer');
    $st->execute();
    $res = $st->fetchAll();

    echo '<pre>' . print_r($res, true) . '</pre>'; 
} catch(PDOException $pe) {
    echo $pe->getMessage();
}   