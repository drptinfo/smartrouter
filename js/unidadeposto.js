$(document).ready(function() {
	$(document).on("click","#enviarUnidade",function() {
		var nome = $("#inputNome");
		var nomePost = nome.val(); 
		var codigo = $("#inputCodigo");
		var codigoPost = codigo.val(); 
		var email = $("#inputEmail");
		var emailPost = email.val(); 
		var telefone1 = $("#inputTelefone1");
		var telefone1Post = telefone1.val(); 
		var telefone2 = $("#inputTelefone2");
		var telefone2Post = telefone2.val(); 
		var idempresa = $("#inputIdEmpresa");
		var idempresaPost = idempresa.val(); 
		var cep = $("#cep");
		var cepPost = cep.val(); 
		var rua = $("#rua");
		var ruaPost = rua.val(); 
		var bairro = $("#bairro");
		var bairroPost = bairro.val(); 
		var cidade = $("#cidade");
		var cidadePost = cidade.val(); 
		var numero = $("#numero");
		var numeroPost = numero.val(); 
		var complemento = $("#inputComplemento");
		var complementoPost = complemento.val();
		var referencia = $("#inputReferencia");
		var referenciaPost = referencia.val();
		$.post("gravar_unidposto.php", {nome: nomePost, codigo: codigoPost, email: emailPost, telefone1: telefone1Post, telefone2: telefone2Post, idempresa: idempresaPost, cep: cepPost, rua: ruaPost, bairro: bairroPost, cidade: cidadePost, numero: numeroPost, complemento: complementoPost, referencia: referenciaPost},
		function(data){
			
						$("#resposta2").html(data);						
						$("#inputNome").val("");
						$("#inputCodigo").val("");
						$("#inputEmail").val("");
						$("#inputTelefone1").val("");
						$("#inputTelefone2").val("");
					    $("#inputIdEmpresa").val("");
						$("#cep").val("");
						$("#rua").val("");
						$("#bairro").val("");
						$("#cidade").val("");
						$("#numero").val("");
						$("#inputComplemento").val("");
						$("#inputReferencia").val("");					
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