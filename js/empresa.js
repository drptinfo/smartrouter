$(document).ready(function() {
	$(document).on("click","#enviarEmpresa",function() {
		var nomefant = $("#inputNomeFantasia");
		var nomefantPost = nomefant.val(); 
		var nomers = $("#inputRazaoSocial");
		var nomersPost = nomers.val();
		var email = $("#inputEmail");
		var emailPost = email.val(); 
		var cnpj = $("#CNPJ");
		var cnpjPost = cnpj.val(); 
		var cnae = $("#CNAE");
		var cnaePost = cnae.val();
		var telefone3 = $("#inputTelefone3");
		var telefone3Post = telefone3.val();
		$.post("gravar_empresa.php", {nomefant: nomefantPost, nomers: nomersPost, email: emailPost, cnpj: cnpjPost, cnae: cnaePost, telefone3: telefone3Post},
		function(data){
			
						$("#resposta2").html(data);
						$("#inputNomeFantasia").val("");
						$("#inputEmail").val("");
						$("#inputRazaoSocial").val("");
						$("#CNPJ").val("");
						$("#CNAE").val("");
						$("#inputTelefone3").val("");
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