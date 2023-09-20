<?php

namespace App\sts\Controllers;

if (!defined('CURL107')) {

    header("Location:http://localhost:8080/Site_PHP/");
}


class SobreEmpresa
{

    private ?array $dados;

    /** Instanciar a classe responsável em carregar a view
     * @return void
     */
    public function index(): void
    {

        $sobreEmpresa = new \App\sts\Models\SobreEmpresa();
        $this->dados['sobre-empresa'] = $sobreEmpresa->index();
        $loadView = new \Core\ConfigView("sts/Views/sobreempresa/SobreEmpresa", $this->dados);
        $loadView->renderizar();
    }
}
