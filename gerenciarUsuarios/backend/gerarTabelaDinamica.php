<?php 
header('Content-type: text/html; charset=UTF-8');
session_start();

$logado = isset($_SESSION['logado']) && $_SESSION['logado'] === true;
if($logado){

 
     $painelAdministrador = $_SESSION['tipo'] == "Administrador";
	 $painelUsuarioPadrao = $_SESSION['tipo'] == "Usuário padrão";
	 
	 if($painelAdministrador){		 
		 
		$conectado = include("conectdb.php");
		
			if($conectado){
				
				
				// Create connection
				$conectado = include("conectdb.php");
				
				// Check connection
				if (!$conectado) {
					die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "SELECT * FROM usuario ORDER BY nome asc";
				$result = mysqli_query($conectado, $sql) or die (mysqli_error($conectado));
				
				
			
			echo "
			 <div class='container' style='padding-top: 30px;'>
			   <table class='table table-hover' style='background-color: white;'>
				<thead>
				  <tr>
					<th>Usuário</th>
					<th>Tipo de usuário</th>
					<th>Usuário ativo</th>
					<th></th>
				  </tr>
				</thead>
				<tbody>
				";
				
					 /* fetch associative array */		
				while ($row = mysqli_fetch_assoc($result)) {
						
						$id = 		  $row["idusuario"];
						$nome =       $row["nome"];
						$sobrenome =  $row["sobrenome"];
						$email =      $row['email'];	
						$senha = 	  $row['senha'];
						$tipo =       $row["tipo"];
						$ativo =      $row['ativo'];
						
						$conteudoInputAtivo = "";
						if($ativo){
							$ativo = "Sim";
							
							$conteudoInputAtivo = "<label class='btn btn-secondary active'>											  
												<input type='radio' name='ativo".$id."' autocomplete='off' value='1' checked> Ativo
											  </label>
											  <label class='btn btn-secondary'>
												<input type='radio' name='ativo".$id."'  autocomplete='off' value='0'> Desativo
											 </label>";
							
							
						}else{
							$ativo = "Não";
							
							$conteudoInputAtivo = "<label class='btn btn-secondary '>											  
												<input type='radio' name='ativo".$id."'  autocomplete='off' value='1'> Ativo
											  </label>
											  <label class='btn btn-secondary active'>
												<input type='radio' name='ativo".$id."'  autocomplete='off' value='0' checked> Desativo
											 </label>";
						}
						
						$conteudoInputTipo = "";
						if($tipo == "Administrador"){
							$conteudoInputTipo = " <div class='radio'>
										  <label><input type='radio' name='tipo".$id."' value='Administrador' checked> Administrador</label>
										</div>
										<div class='radio'>
										  <label><input type='radio' name='tipo".$id."' value='Usuário padrão'> Usuário padrão</label>
										</div>";
						}else{
							$conteudoInputTipo = " <div class='radio'>
									<label><input type='radio' name='tipo".$id."' value='Administrador'> Administrador</label>
									</div>
									<div class='radio'>
									 <label><input type='radio' name='tipo".$id."' value='Usuário padrão' checked> Usuário padrão</label>
								</div>";
						}
						
						
				
				echo "		
				  <tr>
					<td>".$nome." ".$sobrenome."</td>
					<td>".$tipo."</td>
					<td>".$ativo."</td>
					<td>
					
						
						<a href='#'><span class='glyphicon glyphicon-pencil' data-toggle='modal' data-target='#item".$id."Editar'></span></a>

						<!-- Modal -->
						<div class='modal fade' id='item".$id."Editar' tabindex='-1' role='dialog' aria-labelledby='item".$id."EditarLabel' aria-hidden='true'>
						  <div class='modal-dialog' role='document'>
							<div class='modal-content'>
							 <form action='../backend/editarUsuario.php' method='POST'>
								 <div class='modal-header' style='background-color: black;'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									 <h4 class='modal-title' id='item".$id."MyModalLabel' style='color: white;'>Editar Usuário</h4>
								 </div>
								   <div class='modal-body'>
										<div class='row container'>
										  <div class='col-md-12'>
											<div class='col-md-4'>
											 <span>Ativar usuário</span>
											</div>
											<div class='col-md-2'>
												<div class='btn-group btn-group-toggle' data-toggle='buttons'>
												
												  ".$conteudoInputAtivo."
												 
												</div>
											</div>
										  </div>
										</div>
										<hr/>
										<div class='row container'>
										 <div class='col-md-5'>
										   <span>Tipo de usuário</span>
										   
										   ".$conteudoInputTipo."
											
										 </div>
										</div>
										<hr/>
										<div class='row container'>
										
										<div class='col-md-6'>
										   <div class='form-group'>
											  <label for='nome".$id."'>Nome:</label>
											  <input type='text' class='form-control' name='nome".$id."' id='nome".$id."' value='".$nome."'>
											</div>
											<div class='form-group'>
											  <label for='sobrenome".$id."'>Sobrenome:</label>
											  <input type='text' class='form-control' name='sobrenome".$id."' id='sobrenome".$id."' value='".$sobrenome."'>
										   </div>
										   <div class='form-group'>
											  <label for='email".$id."'>E-mail:</label>
											  <input type='email' class='form-control' name='email".$id."' id='email".$id."' value='".$email."'>
										   </div>
										   <div class='form-group'>
											  <label for='senhaEditar".$id."'>Senha:</label>
											  <input type='password' class='form-control' name='senhaEditar".$id."' id='senhaEditar".$id."' value='".$senha."'>
											  <input type='hidden' name='idEditar' value='".$id."'>
										   </div>
										  </div>
									   </div>
										
									  </div>
									  <div class='modal-footer'>
										<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
										<button type='submit' class='btn btn-primary'>Salvar</button>
									  </div>
							  </form>
							</div>
						  </div>
						</div>
					
					  
					  <span class='nav-item dropdown' style='padding-left: 10px;'>
						<a class='nav-link dropdown-toggle' href='#' id='item".$id."Excluir' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						  <span class='glyphicon glyphicon-option-horizontal' style='margin-top: 0px;'></span>
						</a>
						<div class='dropdown-menu' aria-labelledby='item".$id."Excluir'>
						  <li style='text-align: left;'><a class='dropdown-item' href='../backend/excluirUsuario.php?id=".$id."'>Excluir</a></li>
						</div>
					  </span>			  
					</td>
				  </tr>
				  ";
				  } //Fim do while.
				  echo "
				</tbody>
			   </table>
			 </div>";
			 
			
			 mysqli_close($conectado);
		   }
   }else if($painelUsuarioPadrao){
	   $conectado = include("conectdb.php");
		
			if($conectado){
				
				
				// Create connection
				$conectado = include("conectdb.php");
				
				// Check connection
				if (!$conectado) {
					die("Connection failed: " . mysqli_connect_error());
				}

				$sql = "SELECT * FROM usuario ORDER BY nome asc";
				$result = mysqli_query($conectado, $sql) or die (mysqli_error($conectado));
				
				
			
			echo "
			 <div class='container' style='padding-top: 30px;'>
			   <table class='table table-hover' style='background-color: white;'>
				<thead>
				  <tr>
					<th>Usuário</th>
					<th>Tipo de usuário</th>
					<th>Usuário ativo</th>
				  </tr>
				</thead>
				<tbody>
				";
				
					 /* fetch associative array */		
				while ($row = mysqli_fetch_assoc($result)) {						
						
					$nome =       $row["nome"];
					$sobrenome =  $row["sobrenome"];
					$tipo =       $row["tipo"];
					$ativo =      $row['ativo'];
						
					$conteudoInputAtivo = "";
					if($ativo){
						$ativo = "Sim";						
					}else{
						$ativo = "Não";						
					}
						
						
				echo "		
				  <tr>
					<td>".$nome." ".$sobrenome."</td>
					<td>".$tipo."</td>
					<td>".$ativo."</td>					
				  </tr>
				  ";
				  } //Fim do while.
				  echo "
				</tbody>
			   </table>
			 </div>";
			 
			
			 mysqli_close($conectado);
		   }
   }

}else{
	header("location: ../index.html");
}

?>