<?php

namespace App\sts\Models;

// Redirecionar para a página inicial quando o usuário não acessa pelo arquivo index.php
if (!defined('CURL107')) {

    header("Location:http://localhost:8080/Site_PHP/");
}


class Contato
{

    private ?array $dados;

    /** Método no qual vai criar a mensagem
     * @param array $dados
     * @return bool
     */
    public function create(array $dados): bool
    {

        $this->dados = $dados;
        $this->dados['created'] = date("Y-m-d H:i:s");

        $created = new \App\sts\Models\helper\Create();
        $created->exeCreate("contato_msg", $this->dados);

        if ($created->getResult()) {
            $_SESSION['msg'] = "<p style='color: green;'>Mensagem enviada com sucesso</p>";
            return true;
        } else {
            $_SESSION['msg'] = "<p>Erro: Mensagem não enviada</p>";
            return false;
        }

        return true;
    }
}
