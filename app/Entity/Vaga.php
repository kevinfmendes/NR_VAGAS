<?php
    
    namespace App\Entity;
    use \App\Db\Database;
    use \PDO;

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
        $this-> id = $obDatabase->insert([
            'titulo' =>$this->titulo,
            'descricao' =>$this->descricao,
            'ativo' =>$this->ativo,
            'data' =>$this->data
        ]);
        //return success
        return true;
    }

    public function atualizar(){
        return (new Database('vagas'))->update('id = '.$this->id,[
            'titulo' =>$this->titulo,
            'descricao' =>$this->descricao,
            'ativo' =>$this->ativo,
            'data' =>$this->data
        ]);
    }
    /** Método responsável por excluir a vaga do banco
     * @return boolean
     * 
     */
    public function excluir(){
        return (new Database('vagas')) -> delete('id= ' .$this->id);
    }

    /** Método que vai buscar no db as vagas e listar 
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */

    public static function getVagas($where = null, $order = null, $limit = null) {

        return (new Database('vagas'))->select($where, $order, $limit)
                                      ->fetchAll(PDO::FETCH_CLASS, self::class);

    }

    /** Método que vai buscar no db vaga por id
     * @param integer $id
     * @return Vaga
     */
    public static function getVaga($id){
        return (new Database('vagas'))->select('id= '.$id)
                                      ->fetchObject(self::class);
    }


}



    