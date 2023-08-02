<?php
    
    namespace App\Entity;
    use \App\Db\Database;

    class Vaga
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $titulo;

    /**
     * @var string
     */
    public $descricao;

    /**
     * @var string (s/n)
     */
    public $ativo;

    /**
     * @var string
     */
    public $data;


    /**
     * Método para cadastrar nova vaga no bd
     * @return boolean
     */
    public function cadastrar(){
        //definir data
        $this->data = date('Y-m-d H:i:s');

        //inserir no bd
        $obDatabase = new Database('vagas');
        $obDatabase->insert([
            'titulo' =>$this->titulo,
            'descricao' =>$this->descricao,
            'ativo' =>$this->ativo,
            'data' =>$this->data
        ]);
        //echo "<pre>"; print_r($obDatabase); echo "</pre>";
        //atribuir id

        //return success


    }

}



    