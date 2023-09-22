<?php

   $sqlQuery = "select * from table1 where actif = 1 order by id";
   $temp = $pdo->prepare($sqlQuery);
   $temp->execute();
   $infos = $temp->fetchAll();

?>