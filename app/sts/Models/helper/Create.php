<?php

namespace App\sts\Models\helper;

use PDO;
use PDOException;

if (!defined('CURL107')) {

    header("Location:http://localhost/Site_PHP/");
}

class Create extends Conn
{

    private array $dados;
    private string $insert;
    private string $table;
    private ?string $result = null;
    private object $conn;
    private object $query;

    private function connection(): void
    {
        $this->conn = $this->conectar();
        $this->query = $this->conn->prepare($this->insert);
    }


    public function getResult(): ?string
    {
        return $this->result;
    }

    public function exeCreate(string $table, array $dados): void
    {

        $this->table = $table;

        $this->dados = $dados;

        $this->exeReplaceValues();
    }

    private function exeInstruction(): void
    {
        $this->connection();
        try {
            $this->query->execute($this->dados);
            $this->result = $this->conn->lastInsertId();
        } catch (PDOException $err) {
            $this->result = null;
        }
    }

    private function exeReplaceValues(): void
    {
        $coluns = implode(', ', array_keys($this->dados));
        $values = ':' . implode(', :', array_keys($this->dados));
        $this->insert = "INSERT INTO {$this->table} ($coluns) VALUES ($values)";
        $this->exeInstruction();
    }
}
