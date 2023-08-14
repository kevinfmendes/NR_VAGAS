<?php

    namespace App\Db;

    use \PDO;
    use \PDOException;

    class Database {

        /**
        * Definindo host de conexao com o db
        * @var string
        */
        const HOST = 'localhost';
        /**
        * nome do DB
        * @var string
        */
        const NAME = 'nr_vagas';
        /**
        * user do db
        * @var string
        */
        const USER = 'root';
        /**
        * senha do db
        * @var string
        */
        const PASS = '';
        /**
        * variavel resp por definir qual tabela do db usar
        * @var string 
        */
        private $table;
        /**
        * Instancia de conexao com o db
        * @var PDO
        */
        private $connection; 
        /**
         * Define a tabela e instancia de conexao
         */
        public function __construct($table = null){
            $this->table = $table;
            $this->setConnection();
        }

        /**
         * Setando a conexao com banco com PDO
         */
        private function setConnection(){
            try{
                $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e){
                die ('ERROR: ' .$e->getMessage());
            }
        }
        /**
         * método p/ executar as queries no db
         * string $query
         * array $params
         */
        private function execute($query,$params = []){
            try{
                //chama connection e dentro dele o prepare p/ verificar os binds la da query
                $statement = $this->connection->prepare($query);
                //passando os parametros que podem ser substituidos
                $statement->execute($params);
                return $statement;

            } catch (PDOException $e){
                die ('ERROR: ' .$e->getMessage());
            }
        }

        /**
         * metodo para inserir no db
         * recebe array field => values
         */
        public function insert($valores){
            //fields para transformar os valores recebidos do insert de Vaga.php
            $fields = array_keys($valores);
            $binds  = array_pad([],count($fields),'?');
            
            /** Poderia ser uma query normal, mas aqui deixamos ela dinâmica
             * após o INTO usando this->table para pegar a variavel $table
             * usando também o implode que pega dinamicamente os campos que serão usados desta tabela específica
             * após o VALUES implode de novo para definir quantos valores serão passados dinamicamente também 
             */
            $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).') ';

            $this->execute($query, array_values($valores));

            return $this->connection->lastInsertId();

        }

        /**
         * metodo para realizar update no db
         * recebe array field => values
         */
        public function update($where, $valores){
            
            $fields = array_keys($valores);

            $query = 'UPDATE '.$this->table. ' SET '.implode('=?,',$fields).'=? WHERE '.$where;

            $this->execute($query, array_values($valores));

            return true;

        }

        /** Executa consulta no db
            * @param string $where
            * @param string $order
            * @param string $limit
            * @return PDOStatement
         */

        public function select ($where = null, $order = null, $limit = null, $fields = '*')  {
             
            $where = strlen($where) ? 'WHERE '.$where : '';
            $order = strlen($order) ? 'ORDER BY '.$order : '';
            $limit = strlen($limit) ? 'LIMIT '.$limit : '';

            $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

            return $this->execute($query);
        }
    }