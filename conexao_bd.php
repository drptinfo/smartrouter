<?php

$msg[0] = "Conexao com o banco falhou!";
$msg[1] = "Nao foi possivel selecionar o banco de dados!";

$conexao = mysql_pconnect("localhost", "root", "") or die ($msg[0]);
mysql_select_db("smartrouter",$conexao) or die ($msg[1]);

?>
