<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

echo '<h3>PDO Result</h3>';
try {
    $conn = \CandidateTest\Helpers\DbHelper::getPdoConnection();

    $st = $conn->prepare('SELECT * FROM manufacturer');
    $st->execute();
    $res = $st->fetchAll();

    echo '<pre>' . print_r($res, true) . '</pre>'; 
} catch(PDOException $pe) {
    echo $pe->getMessage();
}

echo '<h3>Mysqli Result</h3>';
try {
    $connection = \CandidateTest\Helpers\DbHelper::getMysqliConnection();

    $statement = $connection->prepare('SELECT * FROM manufacturer');
    $statement->execute();
    $result = $statement->get_result();

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        echo '<pre>' . print_r($row, true) . '</pre>'; 
    }

} catch(\Exception $e) {
    echo $e->getMessage();
}