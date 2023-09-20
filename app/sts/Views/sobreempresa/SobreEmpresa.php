<?php

if (!defined('CURL107')) {

    header("Location:http://localhost:8080/Site_PHP/");
}

?>


<section class="about">
    <div class="max-width">
        <h2 class="title">Sobre Empresa</h2>

        <?php

        if (!empty($this->dados['sobre-empresa'])) {

            foreach ($this->dados['sobre-empresa'] as $sobre) {
                extract($sobre);
        ?>

                <div class="about-content">
                    <div class="column left">
                        <img src="<?= URL; ?>app/sts/assets/img/<?= $image; ?>" alt="Sobre Empresa">
                    </div>
                    <div class="column right">
                        <div class="text">
                            <?= $title; ?>
                        </div>
                        <p><?= $description; ?></p>
                    </div>
                </div>

        <?php }
        } else {
            echo "<p style='color: #f00;'>Erro: Nenhum regristro encontrado</p>";
        }
        ?>
    </div>
</section>
<footer>
    <span>Created By <a href="<?= URL; ?>">Luis</a></span>
</footer>