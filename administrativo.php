<?php  
 session_start();
 header ('Content-type: text/html; charset=UTF-8');	

 $nome = $_SESSION['usuarioNome']; 
 $logo = $_SESSION['LOGO'];  
 $id_usuario = $_SESSION['usuarioId'];
 $id_unid_posto = $_SESSION['id_unid_posto'];
 $id_emp = $_SESSION['ID_EMP'];
 $rsocial = $_SESSION['R_SOCIAL'];
 
  $connect = mysqli_connect("localhost", "root", "", "smartrouter");   
  $query ="SELECT (SELECT empresa.NOME_FANT FROM empresa WHERE empresa.ID=(SELECT unid_posto.ID_EMP FROM unid_posto WHERE unid_posto.ID=cliente.ID_U_P)) AS EMPRESA, cliente.DT_REG, cliente.NOME_PAC, cliente.TEL, cliente.EMAIL, cliente.CEP, cliente.RUA, cliente.NUMERO, cliente.BAIRRO,
cliente.CIDADE, cliente.COMPLEMENTO, cliente.PONTO_REF, exame.EXAME FROM cliente INNER JOIN exame ON exame.ID=cliente.ID_EXAME
ORDER BY cliente.DT_REG DESC";  
  mysqli_set_charset( $connect, 'utf8');
  $result = mysqli_query($connect, $query);  
  
  if ($_SESSION['validacao'] == "1")
  { 
?>  
 
 <!DOCTYPE html>  
<html lang="pt-br">
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
	

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">$("#inputTelefone1").mask("(00) 0000-00009");</script>
	<script type="text/javascript">$("#inputTelefone2").mask("(00) 0000-00009");</script>	
	<script type="text/javascript">$("#inputTelefone3").mask("(00) 0000-00009");</script>	
	<script type="text/javascript">$("#CNPJ").mask("99.999.999/9999-99");</script>
	
	<script src="js/usuario.js"></script>
	<script src="js/empresa.js"></script>
	<script src="js/unidadeposto.js"></script>
	
	
		<script>
		$(document).ready(function() {
		$("#cadastrar").click(function(event) {   //Link1 é a id do seu link
			$.ajaxSetup({cache: false});          //Limpa o cache
		$("#container").load("cadastrar_usuarios.php");  // Carrega pagina1.html dentro da div conteúdo
			});	   
		});
	</script>	 

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
	
	
	
	
	
	
	
    <?php      
	include("api_datatable.php");
	?>
	
	
	
<script type="text/javascript" class="init">

$(document).ready(function() {
	$('#employee_data').DataTable( {
		responsive: true,
		dom: 'Bfrtip',
		lengthMenu: [
                    [ 5, 15, 50, -1 ],
                    [ '5 rows', '15 rows', '50 rows', 'Show all' ]
        ],
		buttons: [
			'excel', 'pageLength'
		]
	} );
} );

</script> 
		<!-- buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print', 'pageLength'
				] 
		-->		   
	   
 
	   


	   
	   
</head>  
 <body style="padding-top: 75px;">	
  
	    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="width: 100%;">
	            
      <div class="container" style="width: 100%;">
	  	  
        <a class="navbar-brand" href="#">
        <img src="<?php echo ''.$logo.''; ?>" width="150" height="40" alt="TAD Express">
        </a>
				
		
		<span class="navbar-text">
	         Colaborador:   <?php echo ''.$nome.' - ID: '.$id_usuario.' - ID UNID: '.$id_unid_posto.' - ID EMP: '.$id_emp.''; ?>
        </span>
	
        
		
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           
            <li class="nav-item"> 
		        <a class="nav-link" href="#" id="cadastrar">Cadastro</a> 
            </li> 
			
			<li class="nav-item"> 
		        <a class="nav-link" href="#" id="Relatórios">Relatórios</a> 
            </li> 
			
			<li class="nav-item"> 
		        <a class="nav-link" href="#" id="Relatórios">Dashboard</a> 
            </li> 

		   
       <!-- <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="#">Router</a>
            </li>
			       	
			
			<li class="nav-item active">
              <a class="nav-link" href="sair.php">Sair
                <span class="sr-only">(current)</span>
              </a>
            </li>
			
          </ul>
        </div>
      </div>
    </nav>
            
		


		
	<!--	
		<div class="container" style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" id="busca">
		
		    <form>
                <div class="form-row">	
		  
					   <div class="col-sm">
						  <input type="date" class="form-control form-control-sm" placeholder="INICIO">
					   </div>
					   <div class="col-sm">
						  <input type="date" class="form-control form-control-sm" placeholder="FIM">
					   </div>
					   <div class="col-sm">
						  <button type="submit" class="btn btn-outline-warning btn-sm">Consultar</button>
					   </div>
		        </div>	
		 
		    </form>
        </div>
		
		-->

<!-- <div id="container2"> </div> -->

		<div class="container" style="margin-left: 60px;" id="container">
						
		
				<table id="employee_data" class="display compact" style="width: 100%;">
					 
					 <thead>  
                               <tr>  
                                    <td>EMPRESA</td>  
									<td>NOME PAC</td> 
									<td>RUA</td>  
									<td>N</td> 
									<td>COMPLEMENTO</td>
									<td>CIDADE</td> 
									<td>BAIRRO</td>  
									<td>CEP</td>  
									<td>PAÍS</td>
									<td>N_NF</td>
									<td>N_P</td>
									<td>P</td>
									<td>VOL</td>
									<td>TAC</td>
									<td>IIP</td>
									<td>FIP</td>
									<td>EMAIL</td> 
									<td>TELEFONE</td>  
									<td>OBS</td>  
									<td>I_ADIC1</td>
									<td>I_ADIC2</td>
									<td>LAT</td>
									<td>LONG</td>
                                    <td>DATA REG</td>  
                                    <!--
                                    <td>P_REF</td>
									<td>EXAME</td>								      
									-->
                               </tr>  
                    </thead>  
					
					<tbody>
						  <?php  
						  $vazio = "";
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["EMPRESA"].'</td> 
                                    <td>'.$row["NOME_PAC"].'</td> 
									<td>'.$row["RUA"].'</td>
									<td>'.$row["NUMERO"].'</td>
									<td>'.$row["COMPLEMENTO"].'</td> 
								    <td>'.$row["CIDADE"].'</td>  
									<td>'.$row["BAIRRO"].'</td>
								    <td>'.$row["CEP"].'</td>
									<td>'.$vazio.'</td>
									<td>'.$vazio.'</td>
									<td>'.$vazio.'</td>
									<td>'.$vazio.'</td>
									<td>'.$vazio.'</td>
									<td>'.$vazio.'</td>
									<td>'.$vazio.'</td>
									<td>'.$vazio.'</td>
									<td>'.$row["EMAIL"].'</td>  
									<td>'.$row["TEL"].'</td> 
									<td>'.$vazio.'</td>
									<td>'.$vazio.'</td>
									<td>'.$vazio.'</td>
									<td>'.$vazio.'</td>
									<td>'.$vazio.'</td>
									<td>'.$row["DT_REG"].'</td> 
									                                   
                                </tr>  
                               ';  
                          }  exit;
                          ?>  
					</tbody>
					
				<!--	<tfoot>
					   <tr>  
                                    <td>ID</td>  
                                    <td>DATA REG</td>  
                                    <td>NOME PAC</td>  
                                    <td>TELEFONE</td>  
                                    <td>EMAIL</td> 
									<td>CEP</td>  
									<td>RUA</td>  
									<td>N</td>  
									<td>BAIRRO</td>  
									<td>CIDADE</td>  
									<td>COMPLEMENTO</td>
									<td>P_REF</td>
									<td>EXAME</td> 
                       </tr>
					</tfoot>
					-->
			 	</table>  
            </div>

     </body>  
	 
	 
	 
  <script src="../jquery/jquery.min.js"></script> 
      <script src="../bootstrap/js/bootstrap.bundle.min.js"></script> 
	  
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
 