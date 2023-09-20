<?php if (!defined('CURL107')) {

    header(URL);
} ?>


<nav class="navbar">
    <div class="max-width">
        <div class="logo">
            <a href="<?= URL; ?>">Sua Empresa</a>
        </div>
        <ul class="menu" id="menu-site">
            <li><a href="<?= URL; ?>">Home</a></li>
            <li><a href="<?= URL; ?>sobre-empresa">Sobre Empresa</a></li>
            <li><a href="<?= URL; ?>Contato">Contato</a></li>
        </ul>
        <div class="menu-btn" id="menu-btn">
            <i class="fa-solid fa-bars" id="menu-icon"></i>
        </div>
    </div>
</nav>