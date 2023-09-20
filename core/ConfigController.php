<?php

namespace Core;

if (!defined('CURL107')) {

    header("Location:http://localhost/Site_PHP/");
}

use \Core\Config;

class ConfigController extends Config
{

    private string $url;
    private array $urlArray;
    private string $urlController;
    private string $urlSlugController;
    private array $format;
    private string $classLoad;

    public function __construct()
    {

        $this->config();

        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {

            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            $this->clearUrl();

            $this->urlArray = explode("/", $this->url);

            if ((isset($this->urlArray[0])) /*and (isset($this->urlArray[1]))*/) {

                $this->urlController = $this->slugController($this->urlArray[0]);
                //$this->urlMetodo = $this->slugController($this->urlArray[1]);

            } else {

                $this->urlController = $this->slugController(CONTROLLERERRO);
                //$this->urlMetodo = 'index';
            }
        } else {

            $this->urlController = $this->slugController(CONTROLLER);
            //$this->urlMetodo = 'index';
        }

        //echo "Controller: {$this->urlController} <br>";/*- Metodo: {$this->urlMetodo}<br>";*/

    }


    private function clearUrl()
    {
        //Eliminar as tag
        $this->url = strip_tags($this->url);
        //Eliminar espaços em branco
        $this->url = trim($this->url);
        //Eliminar a barra no final da URL
        $this->url = rtrim($this->url, "/");
        //Eliminar caracteres 
        $this->format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        $this->format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr-------------------------------------------------------------------------------------------------';
        $this->url = strtr(mb_convert_encoding($this->url, "UTF-8"), mb_convert_encoding($this->format['a'], "UTF-8"), $this->format['b']);
    }

    private function slugController(?string $slugController): string
    {
        //Converter para minusculo
        $this->urlSlugController = strtolower($slugController);
        //Converter o traco para espaco em braco
        $this->urlSlugController = str_replace("-", " ", $this->urlSlugController);
        //Converter a primeira letra de cada palavra para maiusculo
        $this->urlSlugController = ucwords($this->urlSlugController);
        //Retirar espaco em branco
        $this->urlSlugController = str_replace(" ", "", $this->urlSlugController);
        return $this->urlSlugController;
    }

    /** Carrega o controlador da pa´gina e faz a verificação do método apartir da função loadClass
     * @return void
     */
    public function loadPage(): void
    {

        $this->classLoad = "\\App\\sts\\Controllers\\" . $this->urlController;
        if (class_exists($this->classLoad)) {

            $this->loadClass();
        } else {

            $this->urlController = $this->slugController(CONTROLLERERRO);
            $this->loadPage();
        }
    }


    /** Verifica se o método existe, existindo co método carrega a página
     * Não existindo, apresenta a mensagem de erro
     * @return void
     */
    private function loadClass(): void
    {

        $return = new $this->classLoad();
        if (method_exists($return, "index")) {

            $return->index();
        } else {

            die("Erro, Por favor tente novamente e caso o problema 
            venha a persistir, nos mande mensagem");
        }
    }
}
