<?php  
ini_set('default_charset', 'utf-8');
header("Content-type:text/html;charset=utf-8");
 session_start();
 $nome = $_SESSION['usuarioNome']; 
 $logo = $_SESSION['LOGO'];  
 $id_usuario = $_SESSION['usuarioId'];
 $id_unid_posto = $_SESSION['id_unid_posto'];
 $id_emp = $_SESSION['ID_EMP'];
 $rsocial = $_SESSION['R_SOCIAL'];
 
//  $connect = mysqli_connect("localhost", "root", "", "smartrouter");   
//  $query ="SELECT cliente.ID, cliente.DT_REG, cliente.NOME_PAC, cliente.TEL, cliente.EMAIL, cliente.CEP, cliente.RUA, cliente.NUMERO, cliente.BAIRRO,
//  cliente.CIDADE, cliente.COMPLEMENTO, cliente.PONTO_REF, exame.EXAME FROM cliente INNER JOIN exame ON exame.ID=cliente.ID_EXAME
//  ORDER BY cliente.DT_REG DESC";  
//  $result = mysqli_query($connect, $query);  
  
  if ($_SESSION['validacao'] == "1")
  { 
?>  

<!DOCTYPE html>  
<html lang="en">
      <head>  
           <title></title> 
		  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
		
	 
	 <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/logo-nav.css" rel="stylesheet">
	
	
	<script>
    $(document).ready(function() {
	$("#cadastrar_usuarios").click(function(event) {   //Link1 é a id do seu link
        $.ajaxSetup({cache: false});          //Limpa o cache
	$("#container").load("cadastrar_usuarios.php");  // Carrega pagina1.html dentro da div conteúdo
        });	   
	});
    </script>	
	
	<script>
    $(document).ready(function() {
	$("#cadastrar_unidades").click(function(event) {   //Link1 é a id do seu link
        $.ajaxSetup({cache: false});          //Limpa o cache
	$("#container").load("cadastrar_unidades.php");  // Carrega pagina1.html dentro da div conteúdo
        });	   
	});
    </script>	
	
	<script>
    $(document).ready(function() {
	$("#cadastrar_empresas").click(function(event) {   //Link1 é a id do seu link
        $.ajaxSetup({cache: false});          //Limpa o cache
	$("#container").load("cadastrar_empresas.php");  // Carrega pagina1.html dentro da div conteúdo
        });	   
	});
    </script>	
	
	
	 </head>  
<body>


<div class="container" style="margin-top: 15px;" id="container_menu">

		<h4 class="card-title">Cadastro Empresas</h4>
		<div class="btn-group" role="group" aria-label="Basic example">
		  <button type="button" class="btn btn-outline-warning" id="cadastrar_usuarios">Usuários</button>
		  <button type="button" class="btn btn-outline-warning" id="cadastrar_unidades">Unidades</button>
		  <button type="button" class="btn btn-warning" id="cadastrar_empresas">Empresas</button>
	    </div>
		
</div>


<div class="container" style="margin-top: 15px;" id="container_center">

<!-- INICIO FORM CADASTRAR COLABORADOR  -->
<div class="card border border-warning">
  <div class="card-body">
  
<form class="form" id="cadastrarColaborador">

 <div class="form-group row">

    <label for="inputNomeFantasia" class="col-sm-2 col-form-label"><b>Nome Fantasia</b></label>
	<div class="col-sm-4">
		<input type="text" class="form-control" id="inputNomeFantasia" name="inputNomeFantasia" placeholder="Nome Fantasia" required autofocus >
	</div>     

   <label for="inputRazaoSocial" class="col-sm-2 col-form-label"><b>Razão Social</b></label>
	<div class="col-sm-4">
		<input type="text" class="form-control" id="inputRazaoSocial" name="inputRazaoSocial" placeholder="Razão Social" required autofocus >
	</div>    	
	
</div> 

          <div class="form-group row">
      
					<label for="CNPJ" class="col-sm-2 col-form-label"><b>CNPJ</b></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="CNPJ" name="CNPJ" autocomplete="off" >
					</div>     
				  
					<label for="CNAE" class="col-sm-2 col-form-label"><b>CNAE</b></label>
					<div class="col-sm-4">
					  <input type="text" class="form-control" id="CNAE" name="CNAE" placeholder="CNAE" >
					</div>
					 
          </div>
  
    <div class="form-group row">
			  
			   <label for="inputEmail" class="col-sm-2 col-form-label"><b>E-mail</b></label>
				<div class="col-sm-4">
				  <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="E-mail" required>
				</div>
			  
			  <label for="inputTelefone3" class="col-sm-2 col-form-label"><b>Telefone</b></label>
				<div class="col-sm-4">
				  	<input type="tel" class="form-control" id="inputTelefone3" name="inputTelefone3" autocomplete="off" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" >
				</div>
				 
		  </div>
  
  
  <div class="form-group row">
    <div class="col-sm-12">
      <button type="button" name="enviarEmpresa" id="enviarEmpresa" class="btn btn-outline-warning btn-sm btn-block">Cadastrar Empresa</button>
    </div>
  </div>
  

         <div class="form-group row">
			<div class="col-sm-12" id="resposta2">
			 
			</div>
		  </div>
		  
   </form>
  </div>
</div>
<!-- FIM FORM CADASTRAR COLABORADOR  -->

<br>





</div>








</body>
</html>






  <?php
} else {
//exiba um alerta dizendo que a senha esta errada
?>

<script type="text/javascript">
alert("Login ou senha incorreta");
</script>

<?php
header("Location: index.php");
}
?>