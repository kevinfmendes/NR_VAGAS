<?php

    namespace App\Db;

    use \PDO;

    class Database {

        /**
        * Definindo host de conexao com o db
        */
        const HOST = 'localhost';

        const NAME = 'nr_vagas';

        const USER = 'root';

        const PASS = '';

        private $table;
        private $connection; 

        public function __construct($table){
                
        }
    }