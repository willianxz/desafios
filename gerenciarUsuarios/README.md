# Desafio

Desenvolva um CRUD de usuarios com:
- Autenticação;
- Lista de Usuários cadastrados;
- Tela para cadastro de usuário;
- Edição de usuário;

Outras regrinhas:
- Deve ser desenvolvida uma tela para autenticação;
- Admin deve poder criar/ativar/desativar outros usuários;
- Usuário padrão deve ter acesso somente à lista e aos detalhes dos usuários cadastrados, mas não deve conseguir executar alterações;
- O campo “Buscar usuário” deve filtrar a lista de usuários pelo nome digitado;


----------------------------------------------------------------------------------------------------------------------------

# Requisitos para a execução do sistema

- Mysql workbench
- Apache rodando

----------------------------------------------------------------------------------------------------------------------------

# Instalação do sistema

1 - Dê um git clone no projeto estando dentro da pasta do seu apache (xamp ou wampserve) para executar localmente.


----------------------------------------------------------------------------------------------------------------------------

# Como executar

Crie o Banco de dados:
- Rode o Apache e o Mysql
- Abra o Mysql workbench 
- Entre na pasta do projeto chamada "bd" e abra o arquivo "Modelagem Banco" no Mysql workbench
- No Mysql workbench, abra a aba database e clique em Synchronize Model, aperte em next até gerar o banco.


Execute os inserts no banco de dados para já ter alguns cadastros:
- Na aba chamada local instance do Mysql workbench
- Clique duas vezes no nome do banco de dados chamado "gerenciarusuarios", para ele ficar com o nome em negrito.
- Entre na pasta do projeto chamada "bd" e abra o arquivo "scriptInsertDb" no Mysql workbench
- No Mysql workbench, copie os inserts e cole na aba chamada local instance do Mysql workbench
- Selecione todo o insert e clique no icone do raio para executar.


Execute o sistema:
- Vá na url padrão //localhost/caminhodoprojeto
- Se logue com o email/senha no sistema, onde por padrão coloquei as senhas sendo 123, encriptografadas no banco em md5.