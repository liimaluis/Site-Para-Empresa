<?php

if (!defined('CURL107')) {

    header("Location:http://localhost:8080/Site_PHP/");
}



if (!empty($this->dados['topo'][0])) {
    extract($this->dados['topo'][0]);
} else {
    echo "<p style='color: #f00;'>Erro: Nenhum regristro do topo da página encontrado</p>";
}

?>

<section class="top" style="background: linear-gradient(to right, var(--main-color) 25%, rgba(255, 255, 255, 0)), url('<?= URL; ?>app/sts/assets/img/<?= $image_topo; ?>') ; 
    background-size: cover; background-attachment: fixed;">

    <div class="max-width">
        <div class="top-content">
            <div class="text-1"><?= $title_one_topo; ?></div>
            <div class="text-2"><?= $title_two_topo; ?></div>
            <div class="text-3"><?= $title_three_topo; ?></div>
            <a href="contato.html"><?= $text_btn_topo; ?></a>
        </div>
    </div>

</section>


<?php

if (!empty($this->dados['services'][0])) {
    extract($this->dados['services'][0]);
} else {
    echo "<p style='color: #f00;'>Erro: Nenhum serviço encontrado</p>";
}
?>
<section class="services">
    <div class="max-width">
        <h2 class="title"><?= $service_title; ?></h2>
        <div class="serv-content">
            <div class="card">
                <div class="box">
                    <i class="<?= $service_icon_one; ?>"></i>
                    <div class="text"><?= $service_title_one; ?></div>
                    <p><?= $service_desc_one; ?></p>
                </div>
            </div>

            <div class="card">
                <div class="box">
                    <i class="<?= $service_icon_two; ?>"></i>
                    <div class="text"><?= $service_title_two; ?></div>
                    <p><?= $service_desc_two; ?></p>
                </div>
            </div>

            <div class="card">
                <div class="box">
                    <i class="<?= $service_icon_three; ?>"></i>
                    <div class="text"><?= $service_title_three; ?></div>
                    <p><?= $service_desc_three; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php

if (!empty($this->dados['premium'][0])) {
    extract($this->dados['premium'][0]);
} else {
    echo "<p style='color: #f00;'>Erro: Nenhum serviço premium encontrado encontrado</p>";
}

?>

<section class="premium">
    <div class="max-width">
        <h2 class="title"><?= $premium_title; ?></h2>
        <div class="premium-content">
            <div class="column left">
                <img src="<?= URL; ?>app/sts/assets/img/<?= $premium_image; ?>" alt="Serviço premium">
            </div>
            <div class="column right">
                <div class="text">
                    <?= $premium_subtitle; ?>
                </div>
                <p>
                    <?= $premium_desc; ?>
                </p>
                <a href="<?= $premium_btn_link; ?>"><?= $premium_btn_text; ?></a>
            </div>
        </div>
    </div>
</section>

<footer>
    <span>Created By <a href="<?= URL; ?>">Luis</a></span>
</footer>