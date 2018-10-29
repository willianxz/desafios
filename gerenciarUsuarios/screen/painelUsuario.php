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
		   <h3><a href="painelUsuario.php?deslogar=true"><span class="glyphicon glyphicon-arrow-left"></span></a> Gerenciar Usuários</h3>
		  </div>
		  
		  <div class="col-md-3" style="margin-top: 20px;">
		   <a href="../backend/buscarUsuario.php?painel=usuario padrao" id="buscarUsuario"><span class="glyphicon glyphicon-search" ></span></a>
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
			  <li style="text-align:center;"><a class="dropdown-item" href="painelUsuario.php?deslogar=true">Sair</a></li>
			</div>     
		  </div>		  
		</div>
	</div>
	
	<div class="row">
	  <div class="col-md-12" style="background-color: white; height: 15%;">
	     <div class="col-md-9">
	      <h4 style="margin-top: 3%;"><a href="#" id="listarUsuarios">USUÁRIOS</h4></a>
		 </div>		 
	  </div>
	</div>
	
	<!-- O conteudo dessa tabela será populado através de JQUERY, fazendo uma requisição para o php. -->
	<div id="tabelaDinamica"></div>
	
	<script>
	$(document).ready(function(){
		
		//Chame imediatamente a lista
        $.get("../backend/gerarTabelaDinamica.php?painel=usuario padrao", function(data, status){
            $("#tabelaDinamica").html(data).fadeIn(2000);
		});
		
		//Lista os usuarios se clicar no h4 "Usuarios"
		$("#listarUsuarios").click(function(e){
			$("#tabelaDinamica").empty();
			
			 $.get("../backend/gerarTabelaDinamica.php?painel=usuario padrao", function(data, status){
               $("#tabelaDinamica").html(data).fadeIn(2000);			 
		     });
		});
		
		
		//Se o botão de buscar for clicado faça:
		$("#buscarUsuario").click(function(e){
			var campoDeBusca = $("input[name='nomeUsuario']").val();
			e.preventDefault();
			
			//Minha técnica avançada de verificar se está vazio.
			if(campoDeBusca.trim() !== ''){				
				//Tambem poderia fazer utilizando uma requisição do tipo POST, porem é mais lenta.
				$.get("../backend/buscarUsuario.php?painel=usuario padrao&nomeUsuario="+campoDeBusca, function(data, status){
				  $("#tabelaDinamica").empty();
				  $("#tabelaDinamica").html(data).fadeIn(2000);
				});
			}
			
		});
		
	});
	
	</script>
	
</body>
</html>