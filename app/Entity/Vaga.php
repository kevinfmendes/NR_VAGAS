<?php
    namespace App\Entity;

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

        //atribuir id

        //return success



    }

}



    