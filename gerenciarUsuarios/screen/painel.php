<?php 
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
<meta charset="utf-8">
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
		   <h3><a href="../index.html"><span class="glyphicon glyphicon-arrow-left"></span></a> Gerenciar Usuários</h3>
		  </div>
		  
		  <div class="col-md-3" style="margin-top: 20px;">
		   <a href="#" style="text-decoration: none;"><span class="glyphicon glyphicon-search"></span></a>
		   <input type="text" placeholder=" Pesquise pelo nome." style="margin-left: 3px"/>		   
		  </div>
		  
		  <div class="col-md-3 nav-item dropdown" style="margin-top: 10px;">
		   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<image src="../images/personaIcon.png" class="img-fluid" style="width: 40; height: 40; "/>
				<span style="text-align: top; font-size: 16px; color: gray;"><?php echo $nome." ".$sobrenome ?></span>
				<br>
				<span style="padding-left: 43px; position: absolute; top: 24px; color: gray;"> <?php echo $tipo ?></span>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			  <li style="text-align:center;"><a class="dropdown-item" href="painel.php?deslogar=true">Sair</a></li>
			</div>     
		  </div>		  
		</div>
	</div>
	
	<div class="row">
	  <div class="col-md-12" style="background-color: white; height: 15%;">
	     <div class="col-md-9">
	       <h4 style="margin-top: 3%;">USUÁRIOS</h4>
		 </div>
		 <div class="col-md-2">
		   <!-- Button trigger modal -->
		   <button type="submit" class="btn btn-primary" style="margin-top: 20px;" data-toggle="modal" data-target="#cadastroModal">CADASTRAR</button>
		   
		   <!-- Modal Cadastro -->
			<div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroMyModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
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
								<input type="radio" name="options" id="option1" autocomplete="off" checked> Ativo
							  </label>
							  <label class="btn btn-secondary">
								<input type="radio" name="options" id="option2" autocomplete="off"> Desativo
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
						  <label><input type="radio" name="tipodeusuarioCadastro" checked> Administrador</label>
						</div>
						<div class="radio">
						  <label><input type="radio" name="tipodeusuarioCadastro"> Usuário padrão</label>
						</div>
					 </div>
					</div>
					<hr/>
					<div class="row container">
					
					<div class="col-md-6">
					   <div class="form-group">
						  <label for="nome">Nome:</label>
						  <input type="text" class="form-control" id="nome">
						</div>
						<div class="form-group">
						  <label for="sobrenome">Sobrenome:</label>
						  <input type="text" class="form-control" id="sobrenome">
					   </div>
					   <div class="form-group">
						  <label for="email">E-mail:</label>
						  <input type="email" class="form-control" id="email">
					   </div>
					   <div class="form-group">
						  <label for="pwd">Senha:</label>
						  <input type="password" class="form-control" id="pwd">
					   </div>
					  </div>
				   </div>
					
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary">Salvar</button>
				  </div>
				</div>
			  </div>
			</div>
		 </div>
	  </div>
	</div>
	
	<!-- O conteudo dessa tabela será populado através de JQUERY, fazendo uma requisição para o php. -->
	<div id="tabelaDinamica"></div>
	
	<script>
	$(document).ready(function(){
    
        $.get("../backend/gerarConteudoDinamico.php?pagina=painel&operacao=consulta", function(data, status){
            $("#tabelaDinamica").html(data).fadeIn(2000);
		});
		
	});
	
	</script>
	
</body>
</html>