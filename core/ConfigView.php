<?php

namespace Core;

if (!defined('CURL107')) {

    header("Location:http://localhost/Site_PHP/");
}

class ConfigView
{


    public function __construct(private ?string $nameView, private array|string|null $dados)
    {
    }


    public function renderizar(): void
    {

        if (file_exists('app/' . $this->nameView . '.php')) {
            include 'app/sts/Views/include/header.php';
            include 'app/sts/Views/include/menu.php';
            include 'app/' . $this->nameView . '.php';
            include 'app/sts/Views/include/footer.php';
        } else {

            echo "Erro 201 : Entre em contato conosco";
        }
    }
}
