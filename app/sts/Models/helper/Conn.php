<?php

namespace App\sts\Models\helper;

if(!defined('CURL107')){

    header("Location:http://localhost/Site_PHP/");

}

use PDO;
use PDOException;

abstract class Conn
{

    private string $db = "mysql";
    private string $host = HOST;
    private string $user = USER;
    private string $pass = PASS;
    private string $dbanme = DBNAME;
    private int|string $port = PORT;
    private object $connect;

    public function conectar(): object
    {

        try {

            $this->connect = new PDO(
                $this->db . ':host=' . $this->host  . ';port=' . $this->port . ';dbname=' . $this->dbanme,
                $this->user,
                $this->pass
            );
            return $this->connect;
        } catch (PDOException $err) {

            die("Entre em contato conosco");
            return false;
        }
    }
}