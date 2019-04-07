<?php  
ini_set('default_charset', 'utf-8');
header ('Content-type: text/html; charset=UTF-8');	
 session_start();
 $nome = $_SESSION['usuarioNome']; 
 $logo = $_SESSION['LOGO'];  
 $id_usuario = $_SESSION['usuarioId'];
 $id_unid_posto = $_SESSION['id_unid_posto'];
 $id_emp = $_SESSION['ID_EMP'];
 $rsocial = $_SESSION['R_SOCIAL'];

 
  $connect = mysqli_connect("localhost", "root", "", "smartrouter");   
  mysqli_set_charset( $connect, 'utf8');
  $query ="SELECT * FROM unid_posto ORDER BY NOME ASC LIMIT 300";  
  $result = mysqli_query($connect, $query);  
  
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
	
	
	
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	  <script src="posto/js/jquery-1.3.2.min.js" type="text/javascript" language="javascript"></script> 
	
	</head>  
<body>


<div class="container" style="margin-top: 15px;" id="container_menu">

		<h4 class="card-title">Cadastro Usuários</h4>
		<div class="btn-group" role="group" aria-label="Basic example">
		  <button type="button" class="btn btn-warning" id="cadastrar_usuarios">Usuários</button>
		  <button type="button" class="btn btn-outline-warning" id="cadastrar_unidades">Unidades</button>
		  <button type="button" class="btn btn-outline-warning" id="cadastrar_empresas">Empresas</button>
	    </div>
		
</div>


<div class="container" style="margin-top: 15px;" id="container_center">

<!-- INICIO FORM CADASTRAR COLABORADOR  -->
<div class="card border border-warning">
  <div class="card-body">
  
<form class="form" id="cadastrarColaborador">

    <div class="form-group row">

    <label for="inputNome" class="col-sm-2 col-form-label"><b>Nome</b></label>
	    <div class="col-sm-10">
		   <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Nome" required autofocus >
	    </div>      
	
    </div> 

    <div class="form-group row">
      
      <label for="inputEmail" class="col-sm-2 col-form-label"><b>E-mail</b></label>
          <div class="col-sm-4">
	         <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="E-mail" required >
   	      </div>
	  
      <label for="inputTelefone" class="col-sm-2 col-form-label"><b>Senha</b></label>
          <div class="col-sm-4">
	         <input type="password" class="form-control" id="inputPassword3" placeholder="Senha" required >
   	      </div>
	
    </div>
	
  <div class="form-group row">	  
	  <label for="inputUnidade" class="col-sm-2 col-form-label"><b>Unidade</b></label>
      <div class="col-sm-10">	
	        <select class="form-control" id="inputUnidade">
	                          <option>...</option> 
			   <?php					 
                          while($row = mysqli_fetch_array($result))  
                          {   
			   ?>            
                              <option value="<?php echo $row["ID"]; ?>"><?php echo $row["NOME"]; ?></option>  
               <?php      }  
						 
               ?>  
			</select>
         </div>
	  
	  
	  
	  
	  <!--   <div class="col-sm-4">
	        <input type="text" class="form-control" id="inputUnidade" placeholder="Unidade">
   	     </div> -->  
	</div>  

	  
	

  <div class="form-group row">
    <div class="col-sm-12">
      <button type="button" name="enviarUsuario" id="enviarUsuario" class="btn btn-outline-warning btn-sm btn-block">Cadastrar Usuário</button>
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



 <!-- 
		 <div class="form-group row">
			<div class="col-sm-12" id="resposta2">
					<?php	if(isset($_SESSION['cadUsuario']))
														   {
															echo $_SESSION['cadUsuario'];
															unset($_SESSION['cadUsuario']);
														   }
					?>
			</div>
		  </div>
	-->	  



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