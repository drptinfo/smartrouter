<?php
	session_start();	
	//Incluindo a conexão com banco de dados
	// include_once("conexao_bd.php");
	//O campo usuário e senha preenchido entra no if para validar
	$connect = mysqli_connect("localhost", "root", "", "smartrouter");  
	if((isset($_POST['email'])) && (isset($_POST['senha']))){
		$usuario = mysqli_real_escape_string($connect, $_POST['email']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($connect, $_POST['senha']);
		$senha = md5($senha);
			
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM usuarios WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($connect, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($resultado))
		{
			$validacao = '1'; 
			$_SESSION['validacao'] = $validacao;
			$_SESSION['usuarioId'] = $resultado['id'];
			$_SESSION['usuarioNome'] = $resultado['nome'];
			$_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso_id'];
			$_SESSION['usuarioEmail'] = $resultado['email'];
			$_SESSION['id_unid_posto'] = $resultado['id_unid_posto'];
			$id_unid_posto = $_SESSION['id_unid_posto'];
			
			$connect2 = mysqli_connect("localhost", "root", "", "smartrouter");  
            $query2 ="SELECT unid_posto.ID, unid_posto.ID_EMP, empresa.ID, empresa.NOME_FANT, empresa.LOGO, empresa.R_SOCIAL FROM 
unid_posto INNER JOIN empresa ON unid_posto.ID_EMP = empresa.ID WHERE unid_posto.ID='$id_unid_posto' LIMIT 1";  
            $result2 = mysqli_query($connect2, $query2); 
			while($row2 = mysqli_fetch_array($result2))
				{ 
			     $_SESSION['LOGO'] = $row2["LOGO"]; 
				 $_SESSION['ID_EMP'] = $row2['ID_EMP'];
				 $_SESSION['R_SOCIAL'] = $row2['R_SOCIAL'];
				} 		
			
			
				if($_SESSION['usuarioNiveisAcessoId'] == "1") //administrativo
					{
				    header("Location: administrativo.php"); //administrativo
					}
				    elseif($_SESSION['usuarioNiveisAcessoId'] == "2") //colaborador
					      {
						  header("Location: colaborador.php"); //colaborador
					      }
				          else
					          {
						      header("Location: index2.php"); //cliente
					          }
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}
		else
		{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha Inválido";
			   header("Location: index.php");
		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		   header("Location: index.php");
	}
?>