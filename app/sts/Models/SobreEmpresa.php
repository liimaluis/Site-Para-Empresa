<?php

namespace App\sts\Models;

if (!defined('CURL107')) {

    header("Location:http://localhost:8080/Site_PHP/");
}

use PDO;

class SobreEmpresa
{

    private ?array $dados;

    public function index(): ?array
    {

        $class = new \App\sts\Models\helper\Read();
        //$class->exeRead("topo_home", "WHERE id=:id LIMIT :limit", "id=1&limit=1");
        $class->fullRead("SELECT id, title, description, image
        FROM abouts_companies
        WHERE situation_id=:situation_id
        LIMIT :limit", "situation_id=1&limit=10");
        $this->dados = $class->getResult();

        return $this->dados;
    }
}
