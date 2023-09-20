<?php

namespace Core;

if (!defined('CURL107')) {

    header("Location:http://localhost:8080/Site_PHP/");
}


abstract class Config
{

    protected function config(): void
    {

        //Definindo uma contante para as URLS utilizadas no projeto
        define('URL', 'http://localhost:8080/Site_PHP/');
        define('URLADM', 'http://localhost:8080/Site_PHP/adm/');

        //Definindo uma contante para os Controllers utilizados no projeto
        define('CONTROLLER', 'Home');
        define('CONTROLLERERRO', 'Erro');

        //Credenciais do banco de dados 
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'site');
        define('PORT', '3306');
    }
}
