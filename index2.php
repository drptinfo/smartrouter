<?php  
 session_start();
 $nome = $_SESSION['usuarioNome'];
 $logo = $_SESSION['LOGO'];
 $id_usuario = $_SESSION['usuarioId'];
 $id_unid_posto = $_SESSION['id_unid_posto'];
 $id_emp = $_SESSION['ID_EMP'];
 $rsocial = $_SESSION['R_SOCIAL'];
 
  $connect = mysqli_connect("localhost", "root", "", "smartrouter");   
  $query ="SELECT * FROM exame WHERE ID_U_POSTO='$id_unid_posto' ORDER BY EXAME ASC LIMIT 200";  
  $result = mysqli_query($connect, $query);
 
if ($_SESSION['validacao'] == "1")
{ 
?>  
 
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
		<title></title>
	 
	 <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/logo-nav.css" rel="stylesheet">	
		
		
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<!--
		<style type="text/css" class="init">
	
	</style>

	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
	
<script type="text/javascript" class="init">

$(document).ready(function() {
	$('#employee_data').DataTable( {
		dom: 'Bfrtip',
		lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
		buttons: [
			'excel', 'pageLength'
		]
	} );
} );

</script>   
-->
		<!-- buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print', 'pageLength'
				] 
		-->		   
	  
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">$("#inputTelefone").mask("(00) 0000-00009");</script>

	   
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
     <script src="posto/js/jquery-1.3.2.min.js" type="text/javascript" language="javascript"></script> 
	
<script>
$(document).ready(function() {
	$(document).on("click","#enviar",function() {
		var nome = $("#inputNome");
		var nomePost = nome.val(); 
		var telefone = $("#inputTelefone");
		var telefonePost = telefone.val(); 
        var email = $("#inputEmail");
		var emailPost = email.val(); 
        var cep = $("#cep");
		var cepPost = cep.val();
        var rua = $("#rua");
		var ruaPost = rua.val();
        var bairro = $("#bairro");
		var bairroPost = bairro.val();
        var cidade = $("#cidade");
		var cidadePost = cidade.val();	
        var numero = $("#inputNumero");
		var numeroPost = numero.val();	
        var complemento = $("#inputComplemento");
		var complementoPost = complemento.val();	
        var referencia = $("#inputReferencia");
		var referenciaPost = referencia.val();
        var exame = $("#inputExame");
		var examePost = exame.val();
        var unidposto = $("#unidposto");
		var unidpostoPost = unidposto.val();
        var idusuario = $("#idusuario");
		var idusuarioPost = idusuario.val();		
		$.post("gravar.php", {nome: nomePost, telefone: telefonePost, email: emailPost, cep: cepPost, 
		rua: ruaPost, bairro: bairroPost, cidade: cidadePost, numero: numeroPost, complemento: complementoPost, referencia: referenciaPost, exame: examePost, unidposto: unidpostoPost, idusuario: idusuarioPost},
		function(data){ 
		                $("#resposta").html(data);
						$("#inputNome").val("");
						$("#inputEmail").val("");
						$("#inputUnidade").val("");
						$("#inputTelefone").val("");
						$("#cep").val("");
						$("#rua").val("");
						$("#bairro").val("");
						$("#cidade").val("");
						$("#inputNumero").val("");
						$("#inputComplemento").val("");
						$("#inputReferencia").val("");
						$("#exame").val("");
					  }
		 , "html");
	});
});
</script>	   
	   
	<script>
		$(document).ready(function() {
		$("#relatorioCliente").click(function(event) {   //Link1 é a id do seu link
			$.ajaxSetup({cache: false});          //Limpa o cache
		$("#container").load("relatorio_cliente.php");  // Carrega pagina1.html dentro da div conteúdo
			});	   
		});
	</script>	    
	   
	  </head>  
<body style="padding-top: 95px;">	
  
	    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	            
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="<?php echo $logo; ?>" width="150" height="40" alt="TAD Express">
        </a>
		
		<span class="navbar-text">
         Colaborador:   <?php echo ''.$nome.' - ID: '.$id_usuario.' - ID UNID: '.$id_unid_posto.' - ID EMP: '.$id_emp.''; ?>
        </span>
		
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
			<!--	<li class="nav-item"> 
		        <a class="nav-link" href="#" id="relatorioCliente">Relatórios</a> 
                </li> 
			    
				<li class="nav-item"> 
		        <a class="nav-link" href="#" id="relatorioCliente"></a> 
                </li> --> 
			
			
			<li class="nav-item active">
              <a class="nav-link" href="sair.php">Sair
                <span class="sr-only">(current)</span>
              </a>
            </li>
			
         <!--   <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
	  
	  
	 
	
	<!--  INICIO DIV CONTAINER  -->
	<div class="container" style="padding-top: 50px;">
	
	<!--  <div class="form-row" align="center">
         <div id="resposta" name="resposta" class="col-12" align="center">
         </div>
      </div>
	-->
	
	<!--  INICIO FORMULARIO   -->
<form class="form" id="cadastroCliente">
    
	<!--		<div class="row">
					<div class="col-md-2"></div> 
					<div class="col-md-2"></div> 
					<div class="col-md-6"> <img src="img/logo5.png" class="img-responsive" alt="TAD Express">  </div>
					<div class="col-md-2"></div> 
			    </div>-->


<!--  INICIO INPUT NOME   -->
<div class="form-group row">

    <label for="inputNome" class="col-sm-2 col-form-label"><b>Nome</b></label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Nome" required autofocus >
	</div>      
	
</div>  

<!--  FIM INPUT NOME   --> 

<!--  INICIO INPUT EMAIL   -->
<!--  INICIO INPUT TELEFONE   -->  

  <div class="form-group row">
      
      <label for="inputEmail" class="col-sm-2 col-form-label"><b>E-mail</b></label>
    <div class="col-sm-4">
	<input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="E-mail" >
   	  </div>
	  
      <label for="inputTelefone" class="col-sm-2 col-form-label"><b>Telefone</b></label>
    <div class="col-sm-4">
	<input type="tel" class="form-control" id="inputTelefone" name="inputTelefone" autocomplete="off" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" >
   	 </div>
	 
  </div>
  
<!--  FIM INPUT TELEFONE   -->
<!--  FIM INPUT EMAIL   --> 
  



  
<!--  INICIO INPUT ENDERECO   -->  

  <div class="form-row">
  
    <div class="form-group col-md-2">    
      <label for="inputNome"><b>Endereço</b></label>
    </div>
	
	 <div class="col-2">   
      <input type="tel" class="form-control" id="cep" name="cep" placeholder="CEP" pattern="[0-9]+$" >
	 </div>

	 <div class="col-6"> 
      <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" required >
	 </div>
	 
	 <div class="col-2"> 
	  <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required >
	 </div>
	 
   </div>


   <div class="form-row">  
      <div class="form-group col-md-2">     
	  <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required >
	  </div>
	  
	  <div class="form-group col-md-2">  
	  <input type="tel" class="form-control" id="inputNumero" name="inputNumero" placeholder="Numero" required pattern="[0-9]+$" >
	  </div>	
	
	<div class="form-group col-md-8">  
	  <input type="text" class="form-control" id="inputComplemento" name="inputComplemento" placeholder="Complemento: Apto, Bloco e etc." >
	</div>
	
   </div>	   
	
	<div class="form-row">  
      <div class="form-group col-md-12">     
      <input type="text" class="form-control" id="inputReferencia" name="inputReferencia" placeholder="Ponto de Referência" >
      </div>    
    </div>
 <!--  FIM INPUT ENDERECO   --> 
 
 
 <!--  INICIO INPUT NOME EXAME   -->
 <div class="form-group row">
      
	  <label for="inputExame" class="col-sm-2 col-form-label"><b>Exame</b></label>
    
   
     
		<div class="col-sm-10">	<select class="form-control" id="inputExame" name="inputExame">
			   <?php					 
                          while($row = mysqli_fetch_array($result))  
                          {   
			   ?>
                              <option value="<?php echo $row["ID"]; ?>"><?php echo $row["EXAME"]; ?></option>  
               <?php      }  
						 
               ?>  
			</select>
         </div>
<!--  FIM INPUT NOME EXAME   --> 
   <br>                                                                   
   
   
         <div style="visibility: hidden;">
		 
			<input  type="text" id="unidposto" name="unidposto" value="<?php echo $id_unid_posto; ?>" >
			<input  type="text" id="idusuario" name="idusuario" value="<?php echo $id_usuario; ?>" >
			
		 </div>

	
      <button type="button" name="enviar" id="enviar" class="btn btn-dark btn-lg btn-block">Enviar</button>
   
    
    
    <div class="form-row" style="margin-top: 15px;">  
      <div id="resposta" name="resposta">     
      
      </div>    
    </div>
  
</form>

   
 
  


  
<!-- FIM FORMULARIO   -->  
	
	<!--   <div id="resposta" style="text-align: center;"> </div> -->  
	
</div>
	<!--  FIM DIV CONTAINER  -->
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>  
	
	 <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>  
	 </body>  
	
	  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  
 
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
 
 
 