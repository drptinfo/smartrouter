$(document).ready(function() {
	$(document).on("click","#enviarUsuario",function() {
		var nome = $("#inputNome");
		var nomePost = nome.val(); 
		var email = $("#inputEmail");
		var emailPost = email.val(); 
		var senha = $("#inputPassword3");
		var senhaPost = senha.val(); 
		var unidposto = $("#inputUnidade");
		var unidpostoPost = unidposto.val();
		$.post("gravar_usuario.php", {nome: nomePost, email: emailPost, senha: senhaPost, unidposto: unidpostoPost},
		function(data){
			
						$("#resposta2").html(data);
						$("#inputNome").val("");
						$("#inputEmail").val("");
						$("#inputPassword3").val("");
						$("#inputUnidade").val("");
						//alert("Cadastrado com sucesso!");
					   //$("#resposta2").html(data);
					   //$("#container").load("gravar_usuario.php");
					   //setTimeout(function(){ alert("Cadastrado com sucesso!"); }, 8000);
					   //$("#resposta").html(data).show();			   
					   //document.location.reload();
					   //alert("Cadastrado com sucesso!").setTimeout('window.close()', 100000);
					   //document.location.reload();
					   //$("#resposta").html(data);
					   //$("#resposta").delay(3000).fadeOut("slow");
					  }
		 , "html");
	});
});