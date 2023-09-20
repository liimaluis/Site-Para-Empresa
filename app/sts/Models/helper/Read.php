<?php

namespace App\sts\Models\helper;

if (!defined('CURL107')) {

    header("Location:http://localhost/Site_PHP/");
}

use PDO;
use PDOException;

class Read extends Conn
{

    private array $values = [];
    private string $select;
    private ?array $result = [];
    private object $conn;
    private object $query;

    //  Método que retorna o resultado 
    function getResult(): ?array
    {

        return $this->result;
    }

    /** Método que executa a query com as instruções passadas no método abaixo exeInstruction e retornar todas as colunas
     * @param string $table
     * @param ?string $terms
     * @param ?string $parseString
     */
    public function exeRead(string $table, ?string $terms = null, ?string $parseString =  null)
    {

        if (!empty($parseString)) {
            parse_str($parseString, $this->values);
        }

        $this->select = "SELECT * FROM {$table} {$terms}";

        $this->exeInstruction();
    }

    /** Método no qual eu passo quando só quero retornar algumas colunas da tabela e não todas
     * @param string $table
     * @param ?string $parseString
     */
    public function fullRead(string $query, ?string $parseString = null)
    {
        if (!empty($parseString)) {
            parse_str($parseString, $this->values);
        }

        $this->select = $query;

        $this->exeInstruction();
    }


    // Método que atribui valores a variável $result, fazendo com que retorne um array e caso não, retorne um null
    private function exeInstruction()
    {

        $this->connection();
        $this->exeParam();
        try {

            $this->query->execute();
            $this->result = $this->query->fetchAll();
        } catch (PDOException $err) {

            $this->result = null;
        }
    }


    // Método que faz a conexão com o banco de dados para a execusão da query
    private function connection()
    {

        $this->conn = $this->conectar();
        $this->query = $this->conn->prepare($this->select);
        $this->query->setFetchMode(PDO::FETCH_ASSOC);
    }


    // Método que executa todos os parametros e valores passados na query com a variável $link e faz a validação para verificar se é do tipo inteiro
    private function exeParam()
    {

        if ($this->values) {
            foreach ($this->values as $link => $values) {
                if ($link == 'limit' || $link == 'offset') {
                    $values = (int) $values;
                }

                $this->query->bindValue(":{$link}", $values, (is_int($values) ? PDO::PARAM_INT :
                    PDO::PARAM_STR));
            }
        } else {
            echo "Erro ao passar os parâmetros da query";
        }
    }
}
