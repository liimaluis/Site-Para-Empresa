<?php

if (!defined('CURL107')) {

    header("Location:http://localhost:8080/Site_PHP/");
}


if (isset($this->dados['form'])) {
    $valueForm = $this->dados['form'];
    extract($valueForm);
}
?>


<section class="contact">
    <div class="max-width">
        <h2 class="title">Contato</h2>
        <div class="contact-content">
            <div class="column left">
                <p>Mauris volutpat arcu eu mi volutpat fermentum. Aenean vel dignissim orci. Vestibulum mollis elit vel tellus viverra dictum.</p>
                <div class="icons">
                    <div class="row">
                        <i class="fa-solid fa-user"></i>
                        <div class="info">
                            <div class="head">
                                Empresa
                            </div>
                            <div class="sub-title">
                                Luis
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <i class="fa-solid fa-location-dot"></i>
                        <div class="info">
                            <div class="head">
                                Enderço
                            </div>
                            <div class="sub-title">
                                Avenida Winston Churchill
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <i class="fa-solid fa-envelope"></i>
                        <div class="info">
                            <div class="head">
                                E-mail
                            </div>
                            <div class="sub-title">
                                suaempresa@gmail.com.br
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column right">
                <div class="text">
                    Mensagem de Contato
                </div>

                <form method="POST" action="">
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    } ?>
                    <div class="fields">

                        <div class="field name">
                            <?php
                            $value_name = "";
                            if (isset($name)) {
                                $value_name = $name;
                            } ?>
                            <input name="name" type="text" id="name" value="<?= $value_name; ?>" placeholder=" Digite o nome" required>
                        </div>

                        <div class="field email">
                            <?php
                            $value_email = "";
                            if (isset($email)) {
                                $value_email = $email;
                            } ?>
                            <input name="email" type="email" id="email" value="<?= $value_email; ?>" placeholder=" Digite o e-mail" required>
                        </div>
                    </div>

                    <div class="field">
                        <?php
                        $value_subject = "";
                        if (isset($subject)) {
                            $value_subject = $subject;
                        } ?>
                        <input name="subject" type="text" id="subject" value="<?= $value_subject; ?>" placeholder=" Digite o assunto" required>
                    </div>

                    <div class="field textarea">
                        <?php
                        $value_content = "";
                        if (isset($content)) {
                            $value_content = $content;
                        } ?>
                        <textarea name="content" cols="30" rows="10" placeholder=" Digite o conteúdo" required><?= $value_content; ?></textarea>
                    </div>

                    <div class="button-area">
                        <button name="addMsg" type="submit" id="addMsg" value="Enviar">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer>
    <span>Created By <a href="<?= URL; ?>">Luis</a></span>
</footer>