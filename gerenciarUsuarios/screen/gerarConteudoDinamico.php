<?php 
session_start();

if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){

 //se getpagina == painel && getoperacao == cadastrar 	
 
 $pagina = isset($_GET['pagina']) && $_GET['pagina'] == "painel";
 $conteudo = isset($_GET['operacao']) && $_GET['operacao'] == "consulta";
 if($pagina && $conteudo){
	 
	 ?>
	 <div class="container" style="padding-top: 30px;">
	   <table class="table table-hover" style="background-color: white;">
		<thead>
		  <tr>
			<th>Usuário</th>
			<th>Tipo de usuário</th>
			<th>Usuário ativo</th>
			<th></th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td>John</td>
			<td>Administrador</td>
			<td>Sim</td>
			<td>
			
			  	
				<a href="#"><span class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#item1Editar"></span></a>

				<!-- Modal -->
				<div class="modal fade" id="item1Editar" tabindex="-1" role="dialog" aria-labelledby="item1EditarLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					 <div class="modal-header" style="background-color: black;">
					    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					     <h4 class="modal-title" id="item1MyModalLabel" style="color: white;">Editar Usuário</h4>
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
							   <div class="radio">
								  <label><input type="radio" name="tipodeusuarioEditar1" checked> Administrador</label>
								</div>
								<div class="radio">
								  <label><input type="radio" name="tipodeusuarioEditar1"> Usuário padrão</label>
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
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					  </div>
					</div>
				  </div>
				</div>
			
			  
			  <span class="nav-item dropdown" style="padding-left: 10px;">
				<a class="nav-link dropdown-toggle" href="#" id="item1Excluir" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <span class="glyphicon glyphicon-option-horizontal" style="margin-top: 0px;"></span>
				</a>
				<div class="dropdown-menu" aria-labelledby="item1Excluir">
				  <li style="text-align: left;"><a class="dropdown-item" href="#">Excluir</a></li>
				</div>
			  </span>			  
			</td>
		  </tr>
		  <tr>
			<td>Mary</td>
			<td>Usuário padrão</td>
			<td>Sim</td>
			<td>
			  <a href="#"><span class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#item2Editar"></span></a>
			  
			  <!-- Modal -->
				<div class="modal fade" id="item2Editar" tabindex="-1" role="dialog" aria-labelledby="item2EditarLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					 <div class="modal-header" style="background-color: black;">
					    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					     <h4 class="modal-title" id="item2MyModalLabel" style="color: white;">Editar Usuário</h4>
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
							   <div class="radio">
								 <label><input type="radio" name="tipodeusuarioEditar2" checked> Administrador</label>
								</div>
								<div class="radio">
								  <label><input type="radio" name="tipodeusuarioEditar2"> Usuário padrão</label>
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
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					  </div>
					</div>
				  </div>
				</div>
			  
			  
			   <span class="nav-item dropdown" style="padding-left: 10px;">
				<a class="nav-link dropdown-toggle" href="#" id="item2Excluir" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <span class="glyphicon glyphicon-option-horizontal" style="margin-top: 0px;"></span>
				</a>
				<div class="dropdown-menu" aria-labelledby="item2Excluir">
				  <li style="text-align: left;"><a class="dropdown-item" href="#">Excluir</a></li>
				</div>
			  </span>	
			</td>
		  </tr>
		  <tr>
			<td>July</td>
			<td>Administrador</td>
			<td>Não</td>
			<td>			
			   <a href="#"><span class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#item3Editar"></span></a>
			   
			   <!-- Modal -->
				<div class="modal fade" id="item3Editar" tabindex="-1" role="dialog" aria-labelledby="item3EditarLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					 <div class="modal-header" style="background-color: black;">
					    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					     <h4 class="modal-title" id="item3MyModalLabel" style="color: white;">Editar Usuário</h4>
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
							   <div class="radio">
								 <label><input type="radio" name="tipodeusuarioEditar3" checked> Administrador</label>
								</div>
								<div class="radio">
								  <label><input type="radio" name="tipodeusuarioEditar3"> Usuário padrão</label>
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
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					  </div>
					</div>
				  </div>
				</div>
			 
			   <span class="nav-item dropdown" style="padding-left: 10px;">
				<a class="nav-link dropdown-toggle" href="#" id="item3Excluir" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <span class="glyphicon glyphicon-option-horizontal" style="margin-top: 0px;"></span>
				</a>
				<div class="dropdown-menu" aria-labelledby="item3Excluir">
				  <li style="text-align: left;"><a class="dropdown-item" href="#">Excluir</a></li>
				</div>
			  </span>	
			</td>
		  </tr>
		  
		</tbody>
	  </table>
	</div>
	 
	 <?php
	 
 }
 
 
	
 //se getpagina == painel && getoperacao == select
	
}else{
	header("location: ../index.html");
}

?>