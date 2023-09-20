<?php

namespace App\sts\Controllers;


if (!defined('CURL107')) {

    header("Location:http://localhost:8080/Site_PHP/");
}


class Erro
{

    private  ?array $dados;

    /** Instanciar a classe responsável em carregar a view
     * @return void
     */
    public function index(): void
    {

        echo "Controller Erro <br>";
        $this->dados = null;
        $loadView = new \Core\ConfigView("sts/Views/erro/Erro", $this->dados);
        $loadView->renderizar();
    }
}
