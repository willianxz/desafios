<?php

     class database{
        
    private static $dbtype   = "mysql";
    private static $host     = "localhost";
    private static $port     = "3306";
    private static $user     = "root";
    private static $password = "";
    private static $db       = "willian_teste_chag";
    private $conexao;

        
        public function __destruct() {
            $this->disconnect();
            
             /*Método que destroi a conexão com banco de dados e remove da memória todas as variáveis setadas*/
                foreach($this as $key => $value ){
                unset($this->$key);
            }
        }
        
        
        function getConexao() {
            return $this->conexao;
        }

        function setConexao($conexao) {
            $this->conexao = $conexao;
        }

                
        static function getDbtype() {
            return self::$dbtype;
        }

        static function getHost() {
            return self::$host;
        }

        static function getPort() {
            return self::$port;
        }

        static function getUser() {
            return self::$user;
        }

        static function getPassword() {
            return self::$password;
        }

        static function getDb() {
            return self::$db;
        }

        static function setDbtype($dbtype) {
            self::$dbtype = $dbtype;
        }

        static function setHost($host) {
            self::$host = $host;
        }

        static function setPort($port) {
            self::$port = $port;
        }

        static function setUser($user) {
            self::$user = $user;
        }

        static function setPassword($password) {
            self::$password = $password;
        }

        static function setDb($db) {
            self::$db = $db;
        }

    
        public function connect(){
            try{
                $this->conexao = new PDO("mysql:host=".self::getHost().";dbname=".self::getDb()."", "".self::getUser()."", "".self::getPassword()."");
            } catch (PDOException $ex) {
                   die("Erro <code> ".$ex->getMessage()."</code>");
            }
            return $this->conexao;
        }
        
        public function disconnect(){
            $this->conexao = null;
        }
        
        
        
     
    public function insertDB($sql){
        $conexao=$this->connect(); //Faz a conecção com o db
        $conexao->exec($sql); // $sql = "INSERT INTO aluno(col1,col2,col3) VALUES ('','','');" executa a query.
        return true; // se deu tudo certo retorna verdadeiro.
    }
    
    public function selectDB($sql){
      $conexao =   mysqli_connect ( 'localhost' , 'root' , '' , 'willian_teste_chag'); //COLOCAR A CONEXAO CERTA!
      $consulta = mysqli_query($conexao,$sql);
      return $consulta; // retorna a consulta.
       
    }
     
    /*Método update que altera valores do banco de dados e retorna o número de linhas afetadas*/
    public function updateDB($sql){
         $conexao=$this->connect(); //Faz a conecção com o db
         $conexao->exec($sql); // $sql = "UPDATE aluno set nome = 'joão' WHERE id =1;" executa a query.
         return true; // se deu tudo certo retorna verdadeiro.
    }
     
    /*Método delete que excluí valores do banco de dados retorna o número de linhas afetadas*/
    public function deleteDB($sql){
        $conexao=$this->connect(); //Faz a conecção com o db
         $conexao->exec($sql); // $sql = "DELETE aluno set nome = 'joão' WHERE id =1;" executa a query.
         return true; // se deu tudo certo retorna verdadeiro.
    }


        
        
    }




?>
