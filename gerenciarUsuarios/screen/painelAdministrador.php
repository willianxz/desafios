<?php 
header('Content-type: text/html; charset=UTF-8');
session_start();

//Se o usuario pediu para deslogar
if(isset($_GET['deslogar']) && $_GET['deslogar'] === "true"){
	session_destroy(); //Destrua a sessão
	header("location: ../index.html"); //Mande-o para a tela de login.
	exit;
}


//Se o usuario está logado, transfira da sessão para variaveis pequenas as informações dele.
if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
	$nome = $_SESSION['nome'];
	$sobrenome = $_SESSION['sobrenome'];
	$tipo = $_SESSION['tipo'];
	
}else{
	header("location: ../index.html"); //Se não, mande-o para a tela de login.
	exit;
}


?>



<html>
<head>
<meta charset="UTF-8">
<title>Gerenciar Usuários</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
   
   body{
     padding-left: 10px;
	 background-color: #f5f5f5;
   }
   
   a:link, a:visited{
     text-decoration: none;
	 color: black;
   }
   
  </style>
</head>
<body>

    <div class="row">
		<div class="col-md-12" style="background-color: #fafafa;">
		 <div class="col-md-6">
		   <h3><a href="painelAdministrador.php?deslogar=true"><span class="glyphicon glyphicon-arrow-left"></span></a> Gerenciar Usuários</h3>
		  </div>
		  
		  <div class="col-md-3" style="margin-top: 20px;">
		   <a href="../backend/buscarUsuario.php" id="buscarUsuario"><span class="glyphicon glyphicon-search" ></span></a>
		   <input type="text" name="nomeUsuario" placeholder=" Pesquise pelo nome." style="margin-left: 3px"/>		   
		  </div>
		  
		  <div class="col-md-3 nav-item dropdown" style="margin-top: 10px;">
		   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<image src="../images/personaIcon.png" class="img-fluid" style="width: 40; height: 40; "/>
				<span style="text-align: top; font-size: 16px; color: gray;"><?php echo $nome." ".$sobrenome ?></span>
				<br>
				<span style="padding-left: 43px; position: absolute; top: 24px; color: gray;"> <?php echo $tipo ?></span>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			  <li style="text-align:center;"><a class="dropdown-item" href="painelAdministrador.php?deslogar=true">Sair</a></li>
			</div>     
		  </div>		  
		</div>
	</div>
	
	<div class="row">
	  <div class="col-md-12" style="background-color: white; height: 15%;">
	     <div class="col-md-9">
	      <h4 style="margin-top: 3%;"><a href="#" id="listarUsuarios">USUÁRIOS</h4></a>
		 </div>
		 <div class="col-md-2">
		   <!-- Button trigger modal -->
		   <button type="submit" class="btn btn-primary" style="margin-top: 20px;" data-toggle="modal" data-target="#cadastroModal">CADASTRAR</button>
		   
		   <!-- Modal Cadastro -->
			<div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroMyModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <form action="../backend/cadastrarUsuario.php" method="POST">
					  <div class="modal-header" style="background-color: black;">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel" style="color: white;">Cadastrar Usuário</h4>
					  </div>
					  <div class="modal-body">
						<div class="row container">
						  <div class="col-md-12">
							<div class="col-md-4">
							 <span>Ativar usuário</span>
							</div>
							<div class="col-md-2">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
								  <label class="btn btn-secondary active">
									<input type="radio" name="ativoCadastro"  value="1" autocomplete="off" checked> Ativo
								  </label>
								  <label class="btn btn-secondary">
									<input type="radio" name="ativoCadastro"  value="0" autocomplete="off" required> Desativo
								  </label>
								</div>
							</div>
						  </div>
						</div>
						<hr/>
						<div class="row container">
						 <div class="col-md-5">
						   <span>Tipo de usuário</span>
						   <div class="radio active">
							  <label><input type="radio" name="tipoCadastro" value="Administrador" checked> Administrador</label>
							</div>
							<div class="radio">
							  <label><input type="radio" name="tipoCadastro" value="Usuário padrão"> Usuário padrão</label>
							</div>
						 </div>
						</div>
						<hr/>
						<div class="row container">
						
						<div class="col-md-6">
						   <div class="form-group">
							  <label for="nome">Nome:</label>
							  <input type="text" class="form-control" name="nomeCadastro" id="nome" required>
							</div>
							<div class="form-group">
							  <label for="sobrenome">Sobrenome:</label>
							  <input type="text" class="form-control" name="sobrenomeCadastro" id="sobrenome" required>
						   </div>
						   <div class="form-group">
							  <label for="email">E-mail:</label>
							  <input type="email" class="form-control" name="emailCadastro" id="email" required>
						   </div>
						   <div class="form-group">
							  <label for="pwd">Senha:</label>
							  <input type="password" class="form-control" name="senhaCadastro" id="pwd" required>
						   </div>
						  </div>
					   </div>
						
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Salvar</button>
					  </div>
				  </form>
				</div>
			  </div>
			</div>
		 </div>
	  </div>
	</div>
	
	<!-- O conteudo dessa tabela ser? populado atrav?s de JQUERY, fazendo uma requisi??o para o php. -->
	<div id="tabelaDinamica"></div>
	
	<script>
	$(document).ready(function(){
		
		//Chame imediatamente a lista
        $.get("../backend/gerarTabelaDinamica.php?painel=administrador", function(data, status){
            $("#tabelaDinamica").html(data).fadeIn(2000);
		});
		
		//Lista os usuarios se clicar no h4 "Usuarios"
		$("#listarUsuarios").click(function(e){
			$("#tabelaDinamica").empty();
			
			 $.get("../backend/gerarTabelaDinamica.php?painel=administrador", function(data, status){
               $("#tabelaDinamica").html(data).fadeIn(2000);			 
		     });
		});
		
		//Isso serve para ao abrir o modal, n?o alterar o atual scroll que est?.
		$("#tabelaDinamica").click(function(){
			$(".glyphicon").click(function(e){
				e.preventDefault();
		    });		
	    });
		
		//Se o bot?o de buscar for clicado fa?a:
		$("#buscarUsuario").click(function(e){
			var campoDeBusca = $("input[name='nomeUsuario']").val();
			e.preventDefault();
			
			//Minha t?cnica avan?ada de verificar se est? vazio.
			if(campoDeBusca.trim() !== ''){				
				//Tamb?m poderia fazer utilizando uma requisi??o do tipo POST, porem ? mais lenta.
				$.get("../backend/buscarUsuario.php?painel=administrador&nomeUsuario="+campoDeBusca, function(data, status){
				  $("#tabelaDinamica").empty();
				  $("#tabelaDinamica").html(data).fadeIn(2000);
				});
			}
			
		});
		
	});
	
	</script>
	
</body>
</html>