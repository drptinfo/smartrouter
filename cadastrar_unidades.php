<?php  
 header ('Content-type: text/html; charset=UTF-8');	

 session_start();
 $nome = $_SESSION['usuarioNome']; 
 $logo = $_SESSION['LOGO'];  
 $id_usuario = $_SESSION['usuarioId'];
 $id_unid_posto = $_SESSION['id_unid_posto'];
 $id_emp = $_SESSION['ID_EMP'];
 $rsocial = $_SESSION['R_SOCIAL'];
 
  $connect = mysqli_connect("localhost", "root", "", "smartrouter");   
  $query ="SELECT * FROM empresa ORDER BY R_SOCIAL ASC LIMIT 300";  
  $result = mysqli_query($connect, $query);  
  
  if ($_SESSION['validacao'] == "1")
  { 
?>  

<!DOCTYPE html>  
<html lang="en">
      <head>  
           <title></title> 
		
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
		
	 
	 <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/logo-nav.css" rel="stylesheet">
	

	
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> 
	   
	   <!-- INICIO SCRIPT CONSULTA CEP -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
              
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                   

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                            
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
<!-- FIM SCRIPT CONSULTA CEP -->	
	
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

		<h4 class="card-title">Cadastro Unidades</h4>
		<div class="btn-group" role="group" aria-label="Basic example">
		  <button type="button" class="btn btn-outline-warning" id="cadastrar_usuarios">Usuários</button>
		  <button type="button" class="btn btn-warning" id="cadastrar_unidades">Unidades</button>
		  <button type="button" class="btn btn-outline-warning" id="cadastrar_empresas">Empresas</button>
	    </div>
		
</div>


<div class="container" style="margin-top: 15px;" id="container_center">

<!-- INICIO FORM CADASTRAR COLABORADOR  -->
<div class="card border border-warning">
  <div class="card-body">
  
<form class="form" id="cadastrarColaborador" accept-charset="utf-8">

		 <div class="form-group row">

			<label for="inputNome" class="col-sm-2 col-form-label"><b>Nome</b></label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Nome" required autofocus>
			</div>      
			
		 </div> 

		  <div class="form-group row">
			  
			  <label for="inputCodigo" class="col-sm-2 col-form-label"><b>Código</b></label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="inputCodigo" name="inputCodigo" placeholder="Código" required>
				</div>     
			  
			  <label for="inputEmail" class="col-sm-2 col-form-label"><b>E-mail</b></label>
				<div class="col-sm-4">
				  <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="E-mail" required>
				</div>
				 
		  </div>
  
		  <div class="form-group row">
			  
			  <label for="inputTelefone1" class="col-sm-2 col-form-label"><b>Telefone 1</b></label>
				<div class="col-sm-4">
					<input type="tel" class="form-control" id="inputTelefone1" name="inputTelefone1" autocomplete="off" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" >
				</div>     
			  
			  <label for="inputTelefone2" class="col-sm-2 col-form-label"><b>Telefone 2</b></label>
				<div class="col-sm-4">
				  	<input type="tel" class="form-control" id="inputTelefone2" name="inputTelefone2" autocomplete="off" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" >
				</div>
				 
		  </div>
  
		   <div class="form-group row">
			  
				<label for="inputIdEmpresa" class="col-sm-2 col-form-label"><b>Empresa</b></label>
				<div class="col-sm-4">	<select class="form-control" id="inputIdEmpresa" name="inputIdEmpresa">
				 <option>...</option> 
					   <?php	    header ('Content-type: text/html; charset=UTF-8');	
                                    header ('Content-type: text/html; charset=ISO-8859-1');					   
								  while($row = mysqli_fetch_array($result))  
								  {   
					   ?>
									  <option value="<?php echo $row["ID"]; ?>"><?php echo $row["R_SOCIAL"]; ?></option>  
					   <?php      }  
								 
					   ?>  
					</select>
				 </div>
			  
					   <label for="cep" class="col-sm-2 col-form-label"><b>Endereço</b></label>
					   
					   <div class="col-sm-4">
					   <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" >
					   </div>
			</div>
		
		  <div class="form-group row">
      
					<label for="rua" class="col-sm-2 col-form-label"><b>Rua</b></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" >
					</div>     
				  
					<label for="bairro" class="col-sm-2 col-form-label"><b>Bairro</b></label>
					<div class="col-sm-4">
					  <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" >
					</div>
					 
          </div>
		 
		 
		   <div class="form-group row">
      
					<label for="Cidade" class="col-sm-2 col-form-label"><b>Cidade</b></label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" >
					</div>     
				  
					<label for="Numero" class="col-sm-2 col-form-label"><b>Número</b></label>
					<div class="col-sm-4">
					  <input type="text" class="form-control" id="numero" name="numero" placeholder="Número" >
					</div>
					 
           </div>
		   
		 
   
		   <div class="form-group row">
      
					<label for="inputComplemento" class="col-sm-2 col-form-label"><b>Complemento</b></label>
					<div class="col-sm-4">
						  <input type="text" class="form-control" id="inputComplemento" name="inputComplemento" placeholder="Complemento: Apto, Bloco e etc." >
					</div>     
				  
					<label for="inputReferencia" class="col-sm-2 col-form-label"><b>Ponto de Referência</b></label>
					<div class="col-sm-4">
					  <input type="text" class="form-control" id="inputReferencia" name="inputReferencia" placeholder="Ponto de Referência" >
					</div>
					 
           </div>
		
		 
  
  
  
  
  
  <div class="form-group row">
    <div class="col-sm-12">
      <button type="button" name="enviarUnidade" id="enviarUnidade" class="btn btn-outline-warning btn-sm btn-block">Cadastrar Unidade</button>
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