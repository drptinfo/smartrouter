<?php
//session_start();
//include_once("conexao_bd.php");	
//date_default_timezone_set("America/Sao_Paulo");
//header('Content-type: text/plain; charset=utf-8');


$date = date('Y-m-d H:i:s');

$nome = $_POST['nome'];
$telefone1 = $_POST['telefone1'];
$telefone2 = $_POST['telefone2'];
$codigo = $_POST['codigo'];
//$unidposto = $_POST['unidposto']; 
$email = $_POST['email'];
$idempresa = $_POST['idempresa'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$referencia = $_POST['referencia'];

//  $senha = $_POST['senha'];
//  $senha2 = md5($senha);
//  $idusuario = $_POST['idusuario'];

//echo"$nome - $unidposto - $email - $senha";


//$nome2 = mysql_real_escape_string($nome);
//$telefone2 = mysql_real_escape_string($telefone);	  


if(!empty($nome) and !empty($email) and !empty($codigo) and !empty($idempresa))
{
      $servidor = "localhost";
	  $usuario = "root";
	  $senha = "";
	  $dbname = "smartrouter";
	
	//Criar a conexao
	  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);


	
		
	    $insert = mysqli_query($conn,"INSERT INTO unid_posto (COD,NOME,DT_REG,CEP,RUA,BAIRRO,CIDADE,NUMERO,COMPLEMENTO,PONTO_REF,TEL1,TEL2,ID_EMP,EMAIL) VALUES 
		('$codigo', '$nome', '$date', '$cep', '$rua', '$bairro', '$cidade', '$numero', '$complemento', '$referencia', '$telefone1', '$telefone2', '$idempresa', '$email')") or die ("Erro");
         
		 //$_SESSION['cadUsuario'] = "Usuário cadastrado com sucesso!";	
		//   header("Location: cadastrar_usuarios.php");	 
	    	echo"Unidade cadastrada com sucesso!";
     
		
}
 else
	 { 
        //$_SESSION['cadUsuario'] = "Preencher todos os campos!";	
        //   header("Location: cadastrar_usuarios.php");	  
			echo"Preencher todos os campos!";
	  }	

					  
				   
?>