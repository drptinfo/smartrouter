<?php
//session_start();
//include_once("conexao_bd.php");	
//date_default_timezone_set("America/Sao_Paulo");
//header('Content-type: text/plain; charset=utf-8');


$date = date('Y-m-d H:i:s');

$nomefant = $_POST['nomefant'];
$nomers = $_POST['nomers'];
$telefone3 = $_POST['telefone3'];
$cnpj = $_POST['cnpj']; 
$cnae = $_POST['cnae']; 
$email = $_POST['email'];
//$cep = $_POST['cep'];
//$rua = $_POST['rua'];
//$bairro = $_POST['bairro'];
//$cidade = $_POST['cidade'];
//$numero = $_POST['numero'];
//$complemento = $_POST['complemento'];
//$referencia = $_POST['referencia'];
//$senha = $_POST['senha'];
//$senha2 = md5($senha);
//$idusuario = $_POST['idusuario'];

//echo"$nome - $unidposto - $email - $senha";


//$nome2 = mysql_real_escape_string($nome);
//$telefone2 = mysql_real_escape_string($telefone);	  


if(!empty($nomefant) and !empty($nomers) and !empty($cnpj) and !empty($cnae))
{
      $servidor = "localhost";
	  $usuario = "root";
	  $senha = "";
	  $dbname = "smartrouter";
	
	//Criar a conexao
	  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    

	
		
	    $insert = mysqli_query($conn,"INSERT INTO empresa (R_SOCIAL,NOME_FANT,CNPJ,CNAE,EMAIL,TEL,STS,DT_REG) VALUES 
		('$nomers', '$nomefant', '$cnpj', '$cnae', '$email', '$telefone3', '1', '$date')") or die ("Erro");
         
		 //$_SESSION['cadUsuario'] = "Usuário cadastrado com sucesso!";	
		//   header("Location: cadastrar_usuarios.php");	 
	    	echo"Empresa cadastrada com sucesso!";
     
		
}
 else
	 { 
        //$_SESSION['cadUsuario'] = "Preencher todos os campos!";	
        //   header("Location: cadastrar_usuarios.php");	  
			echo"Preencher todos os campos!";
	  }	

					  
				   
?>