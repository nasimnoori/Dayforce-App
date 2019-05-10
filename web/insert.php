<?php
require_once '../vendor/autoload.php';

try {
    $rawData = getData();
    $data = $rawData['body']['Data']['Rows'];
    $idList = insertData($data);
    
    foreach ($idList as $id) {
        echo 'The punch has been inserted with the id ' . $id . '<br>';
    }
    
} catch (\PDOException $e) {
    echo $e->getMessage();
}



?>