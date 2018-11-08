 <?php 
        
include_once 'conexao/dataBase.php'; // Incluimos nosso arquivo de conexão.

$dataBase = new database(); // Criamos a nossa data base

//Criamos a consulta
$sqlcliente = "SELECT * FROM cliente order by idCliente;";
$selecionarCliente=  $dataBase->selectDB($sqlcliente);

   
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
        <link href="css/jquery.dataTables.min.css" rel="stylesheet">
    </head>
    
    <style>
        body{
         border-style: solid;
         margin: 5px;
        }
        
        *{
            font-size: 20px;
            font-family: serif;
        }
     </style>
    
    <body>
        
        <!-- Javascript -->
        <script type="text/javascript" src="js/jquery.dataTables.min.js"> </script>
        <script type="text/javascript" src="jquery-1.12.3.js"> </script>
            
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable(); //Ele chama certinho,porem não faz efeito algum.
             } );
        </script>
        <!-- Fim javascript -->
        
       
       
        <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Site</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Site</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
            while($linhasCliete = mysqli_fetch_assoc($selecionarCliente)){ //Mostre tudo.
            
              echo "
                  
                        <tr>
                            <td>".$linhasCliete['nome']."</td>
                            <td>".$linhasCliete['email']."</td>
                            <td>".$linhasCliete['telefone']."</td>
                            <td>".$linhasCliete['site']."</td>
                        </tr>
                     ";
            }
            
            $username = "teste_recrutamento";
            $senha = "jH09stM9";
    
    
            echo base64_encode($username.':'.$senha);
            ?>
           
        </tbody>
    </table>
    </body>
</html>
