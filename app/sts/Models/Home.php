<?php

namespace App\sts\Models;

if (!defined('CURL107')) {

    header("Location:http://localhost:8080/Site_PHP/");
}

use PDO;

class Home
{

    private ?array $dados;

    public function index(): ?array
    {

        /**
         *  Query que traz as colunas em relação ao topo da página home
         */
        $class = new \App\sts\Models\helper\Read();
        //$class->exeRead("topo_home", "WHERE id=:id LIMIT :limit", "id=1&limit=1");
        $class->fullRead("SELECT title_one_topo, title_two_topo , title_three_topo, 
        link_btn_topo, text_btn_topo, image_topo 
        FROM topo_home
        WHERE id=:id
        LIMIT :limit", "id=1&limit=1");
        $this->dados['topo'] = $class->getResult();


        /**
         *  Query que traz as colunas em relação ao serviços da página home
         */
        $class = new \App\sts\Models\helper\Read();
        //$class->exeRead("topo_home", "WHERE id=:id LIMIT :limit", "id=1&limit=1");
        $class->fullRead("SELECT service_title, service_title_one , service_desc_one, service_icon_one,
         service_title_two, service_desc_two, service_icon_two, service_title_three, service_desc_three,
         service_icon_three  
        FROM home_services
        WHERE id=:id
        LIMIT :limit", "id=1&limit=1");
        $this->dados['services'] = $class->getResult();


        /**
         *  Query que traz as colunas em relação ao serviços premiums da página home
         */
        $class = new \App\sts\Models\helper\Read();
        //$class->exeRead("topo_home", "WHERE id=:id LIMIT :limit", "id=1&limit=1");
        $class->fullRead("SELECT premium_title, premium_subtitle , premium_desc, premium_btn_text,
         premium_btn_link, premium_image
        FROM home_premium
        WHERE id=:id
        LIMIT :limit", "id=1&limit=1");
        $this->dados['premium'] = $class->getResult();

        return $this->dados;
    }
}


// Método antigo para retornar o resultado das querys

 /*$conndb = new \App\sts\Models\helper\Conn();
        $this->conndb = $conndb->conectar();

        $query = "SELECT id, title_topo, description_topo, link_btn_topo, text_btn_topo, image 
                  FROM topo_home 
                  WHERE id =:id
                  LIMIT :limit";
        $result = $this->conndb->prepare($query);
        $result->bindValue(':limit', 1, PDO::PARAM_INT);
        $result->bindValue(':id', 1, PDO::PARAM_INT);

        $result->execute();
        $this->dados = $result->fetch();*/