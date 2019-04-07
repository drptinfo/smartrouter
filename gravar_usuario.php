<?php
//session_start();
//include_once("conexao_bd.php");	
//date_default_timezone_set("America/Sao_Paulo");
//header('Content-type: text/plain; charset=utf-8');
header ('Content-type: text/html; charset=UTF-8');	

$date = date('Y-m-d H:i:s');
$nome = $_POST['nome'];
//$telefone = $_POST['telefone'];
$unidposto = $_POST['unidposto']; 
$email = $_POST['email'];
//$cep = $_POST['cep'];
//$rua = $_POST['rua'];
//$bairro = $_POST['bairro'];
//$cidade = $_POST['cidade'];
//$numero = $_POST['numero'];
//$complemento = $_POST['complemento'];
//$referencia = $_POST['referencia'];
  $senha = $_POST['senha'];
  $senha2 = md5($senha);
//$idusuario = $_POST['idusuario'];

//echo"$nome - $unidposto - $email - $senha";


//$nome2 = mysql_real_escape_string($nome);
//$telefone2 = mysql_real_escape_string($telefone);	  


if(!empty($nome) and !empty($email) and !empty($senha) and !empty($unidposto))
{
      $servidor = "localhost";
	  $usuario = "root";
	  $senha = "";
	  $dbname = "smartrouter";
	
	//Criar a conexao
	  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
   

	
		mysqli_set_charset( $conn, 'utf8');
	    $insert = mysqli_query($conn,"INSERT INTO usuarios (nome,email,senha,situacoe_id,niveis_acesso_id,created,modified,cod,id_unid_posto) VALUES 
		('$nome', '$email', '$senha2', '1', '1', '$date', '$date', 'NULL', '$unidposto')") or die ("Erro");
         
		 //$_SESSION['cadUsuario'] = "Usuário cadastrado com sucesso!";	
		//   header("Location: cadastrar_usuarios.php");	 
	    	echo"Usuário cadastrado com sucesso!";
     
		
}
 else
	 { 
        //$_SESSION['cadUsuario'] = "Preencher todos os campos!";	
        //   header("Location: cadastrar_usuarios.php");	  
			echo"Preencher todos os campos!";
	  }	

					  
				   
?>