<?php

namespace Src\Models;

use Router\Model\Model;

class Lead extends Model
{
    private $id;
    private $nome;
    private $email;
    private $telefone;

    public function __get($var)
    {
        return $this->$var;
    }

    public function __set($var, $value)
    {
        $this->$var = $value;
    }

    public function salvar()
    {
        $query = "INSERT INTO leads(nome, email, telefone)VALUES(:nome, :email, :telefone)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':telefone', $this->__get('telefone'));
        $stmt->execute();

        return $this;
    }

    public function validarCadastro()
    {
        $valido = true;

        if (strlen($this->__get('nome')) < 3) {
            $valido = false;
        }

        if (strlen($this->__get('email')) < 3) {
            $valido = false;
        }

        if (strlen($this->__get('telefone')) < 3) {
            $valido = false;
        }

        return $valido;
    }

    public function getLeadPorEmail()
      {
        $query = "SELECT nome, email FROM leads WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
      }

    public function getAll()
    {
        $query = "SELECT id, nome, email, telefone FROM leads";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function atualizar()
    {
        $query = "UPDATE leads SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':telefone', $this->__get('telefone'));
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return true;
    }

    public function delete()
    {
        $query = "DELETE FROM leads WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return true;
    }
}    