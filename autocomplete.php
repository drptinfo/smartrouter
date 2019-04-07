<?php
//session_start();
//$unid_posto = $_SESSION['id_unid_posto'];
//include'conexao_bd.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smartrouter";
$sql = "SELECT * FROM exame WHERE EXAME LIKE '%".$_GET['query']."%' LIMIT 20";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$json = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
$json[] = $rows["EXAME"];
}
echo json_encode($json);

?>
