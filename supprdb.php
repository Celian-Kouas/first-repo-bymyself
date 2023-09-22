<?php

include "connexiondb.php";

$rowjson = json_decode(json_encode($_POST), true);
$rowarray = array_column($rowjson, 'id');
$rowid = array_shift($rowarray);

$sqlQuery = "update table1 set actif = 0 where id = :id";
$temp = $pdo->prepare($sqlQuery);
$temp->bindParam(':id', $rowid);
var_dump($temp);
$temp->execute();
var_dump($temp);
$infos = $temp->fetchAll()

//echo $rowid;


/*$sqlQuery = "DELETE FROM table_name WHERE condition;;
$temp = $pdo->prepare($sqlQuery);
$temp->execute();
$infos = $temp->fetchAll();*/

//echo json_encode($_POST);

?>