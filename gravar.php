<?php
//session_start();
//include_once("conexao_bd.php");	
date_default_timezone_set("America/Sao_Paulo");
header('Content-type: text/plain; charset=utf-8');


$date = date('Y-m-d H:i:s');
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$unidposto = $_POST['unidposto']; 
$email = $_POST['email'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$referencia = $_POST['referencia'];
$exame = $_POST['exame'];
$idusuario = $_POST['idusuario'];



//$nome2 = mysql_real_escape_string($nome);
//$telefone2 = mysql_real_escape_string($telefone);	  


if(!empty($nome) and
!empty($telefone) and
!empty($cep) and
!empty($rua) and
!empty($bairro) and
!empty($numero) and
!empty($exame))

{
      $servidor = "localhost";
	  $usuario = "root";
	  $senha = "";
	  $dbname = "smartrouter";
	  
	  $alert1 = "Cadastrado com sucesso!";
	  
	
	//Criar a conexao
	  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
  

    	
	         $insert = mysqli_query($conn,"INSERT INTO cliente (DT_REG,NOME_PAC,TEL,STS,ID_U_P,OBS,ID_COL,CEP,RUA,NUMERO,COMPLEMENTO,BAIRRO,
			 CIDADE,PONTO_REF,EMAIL,ID_EXAME) values 
			 ('$date',UPPER('$nome'),'$telefone','1','$unidposto','Null','$idusuario','$cep','$rua','$numero',
			 UPPER('$complemento'),'$bairro','$cidade',UPPER('$referencia'),'$email',UPPER('$exame'))") or die ("Erro");
               
			 
	    echo'<div class="alert alert-primary" role="alert"><h5 class="alert-heading">'.$alert1.'</h5></div>';		
     
		
		}
		 else
			 { 
		        $alert2 = "Preencher todos os campos!";
				  
				echo'<div class="alert alert-danger" role="alert"><h5 class="alert-heading">'.$alert2.'</h5></div>'; 
				
				  }	


					  
				   
?>