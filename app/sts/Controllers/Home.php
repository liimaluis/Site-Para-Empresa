<?php

namespace App\sts\Controllers;

if (!defined('CURL107')) {

    header("Location:http://localhost:8080/Site_PHP/");
}


class Home
{

    private ?array $dados;

    /** Instanciar a classe responsável em carregar a view
     * @return void
     */
    public function index(): void
    {
        $home = new \App\sts\Models\Home();
        $this->dados = $home->index();
        $loadView = new \Core\ConfigView("sts/Views/home/Home", $this->dados);
        $loadView->renderizar();
    }
}
