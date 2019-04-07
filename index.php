<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	
    <!------ Include the above in your HEAD tag ---------->
	
	<link href="css/css_formlogin.css" rel="stylesheet" id="bootstrap-css">
	
</head>

<body>

<div class="container">
    <div class="card card-container">
	
        <img id="logo-img" class="logo-img" src="img\logo5.png" />
		
		<h2 class="form-signin-heading" align="center">Área Restrita</h2>
		
			<form class="form-signin" method="POST" action="valida.php">
			
				<input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required autofocus >
				<input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required >
				
				<button class="btn btn-lg btn-secondary btn-block btn-signin" type="submit">Acessar</button>
				
			</form>		
			
        <div class="signin-help">
		  <p class="text-center text-danger">
			<?php 
			if(isset($_SESSION['loginErro'])){
													echo $_SESSION['loginErro'];
													unset($_SESSION['loginErro']);
			                                       }
			?>
		</p>
		<p class="text-center text-success">
			<?php 
			if(isset($_SESSION['logindeslogado'])){
												   echo $_SESSION['logindeslogado'];
												   unset($_SESSION['logindeslogado']);
			                                      }
			?>
		</p>
		
		<!--	
		        <p>forgot your password? <a href="#">click here</a></p>
			    <p>new user? <a href="#">create new account</a></p>
		  -->		
		</div>
    </div>
</div>

</body>

</html>

