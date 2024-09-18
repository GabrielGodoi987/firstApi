<?php
// camada responsável por gerenciar os dados da aplicação e a lógica de negócio, e a interação com banco de dados
// realiza o CRUD e faz validação dos dados
// recebe e valida dados dos controllers, por fim retorna a resposta adequada
namespace Homework\Firstapi\Model;

class User
{
    private $id;
    private $nome;
    private $idade;


    public function __construct($id = null, $nome = null, $idade = null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getIdade()
    {
        return $this->idade;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }
}
