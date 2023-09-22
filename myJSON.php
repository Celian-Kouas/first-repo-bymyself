<?php
include "connexiondb.php";

$sqlQuery = "select * from table1 where actif = 1";
$temp = $pdo->prepare($sqlQuery);
$temp->execute();
$infos = $temp->fetchAll();

$myJSON['data'] = $infos;
echo json_encode($myJSON);

?>