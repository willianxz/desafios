<?php 

include_once 'conexao/dataBase.php'; // Incluimos nosso arquivo de conexão.
include_once 'util/funcoes.php';


$texto = ""; //Declaramos que o texto inicialmente sempre será vaziu.

//Aqui declaramos o name dos campos que iremos utilizar no formulario.
$arrayCampos[] = 'nome';
$arrayCampos[] = 'email';
$arrayCampos[] = 'telefone';
$arrayCampos[] = 'site';


//Aqui verificamos se o formulario foi submetido.
if(isset($_POST['btnFormulario'])){

    $cadastrar = true; // Começamos dizendo que cadastrar seja verdadeiro.
    for($i =0;$i < count($arrayCampos);$i++){ //Irá percorrer os campos enviados e verificar se faltou preencher algum.
        if(isset($_POST[$arrayCampos[$i]]) && !empty($_POST[$arrayCampos[$i]])){ 
            $arrayCampos[$i] = $_POST[$arrayCampos[$i]]; //Se realmente tiver algum valor no post, então o próprio post pega ele e armazena nele.
        }else{
            $texto = "<h2 style='color: red;'>Por favor, preencha todos os campos!</h2>";
            $cadastrar = false; //Que pena, faltou algum campo..
            break; 
        }
    }
    
    
    
        if($cadastrar){ //Se o cadastrar ainda é verdadeiro, então pode tentar cadastrar.
            
            $dataBase = new database(); // Criamos a nossa data base e tentamos executar a query.
            $inserirCliente = "INSERT INTO cliente(nome,email,telefone,site) VALUES ( 
                         '".$arrayCampos[0]."',
                         '".$arrayCampos[1]."',
                         '".$arrayCampos[2]."',
                         '".$arrayCampos[3]."'
                               );";

                       //Verificamos se foi inserido os valores:
                       if($dataBase->insertDB($inserirCliente)){
                           $texto = "<h2 style='color: green;'>Cliente cadastrado com sucesso! </h2>";
                           $msg = "Ola".$arrayCampos[0].", seja bem vindo ao sistema de cliente! Obrigado.";
                           $numero = "554898041015";
                           //enviarMsg($msg,$numero);Não consigo usar, falta a classe HttpRequest.
                       }else{
                           $texto = "<h2 style='color: red;'>Houve algum problema técnico.</h2>"; 
                       }
        }

    
}//Fim da verificação se o formulario foi submetido.



?>







<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      </head>
      
      <style>
          body{
              padding-left: 20px;
              padding-right: 20px;
              
          }
          
          #principal *{
              margin: 5px;
          }
          
          h1{
              text-align: center;
              text-shadow: 1px 1px 1px black;
          }
          
          
      </style>
      
      
    <body>
        
        
        <div class="row">
            <?php echo $texto; ?>
            <div class="col-sm-12" style="border-style: solid;" id="principal">
                
                <h1>Cadastro de Cliente</h1>
               
                <form method="POST">
                    <div class="form-group">
                      <label for="nome">Nome</label>
                      <input type="nome" class="form-control" id="nome" placeholder="Preencha o nome" name="nome">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="Preencha o Email" name="email">
                    </div>
                    <div class="form-group">
                      <label for="telefone">Telefone</label>
                      <input type="telefone" class="form-control" id="telefone" placeholder="Preencha o telefone" name="telefone">
                    </div>
                    <div class="form-group">
                      <label for="site">Site</label>
                      <input type="site" class="form-control" id="site" placeholder="Preencha seu site" name="site">
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnFormulario">Cadastrar</button>
                    <a href="listarClientes.php"<button type="button" class="btn btn-primary">Listar Clientes</button></a>
                  </form>
               
            </div>            
        </div>
        
        
        
        <?php
        // put your code here
        ?>
    </body>
</html>
