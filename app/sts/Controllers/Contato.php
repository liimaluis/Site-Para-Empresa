<?php

namespace App\sts\Controllers;

if (!defined('CURL107')) {

    header("Location:http://localhost:8080/Site_PHP/");
}


class Contato
{

    private array|string|null $dados = null;
    private ?array $dadosForm;

    /** Instanciar a classe responsável em carregar a view
     * @return void
     */
    public function index(): void
    {

        $this->dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->dadosForm['addMsg'])) {
            unset($this->dadosForm['addMsg']);
            $createContactMsg = new \App\sts\Models\Contato();
            if ($createContactMsg->create($this->dadosForm)) {
            } else {
                $_SESSION['msg'] = "<p>Erro: Mensagem não enviada</p>";
                $this->dados['form'] = $this->dadosForm;
            }
        }

        $loadView = new \Core\ConfigView("sts/Views/contato/Contato", $this->dados);
        $loadView->renderizar();
    }
}
