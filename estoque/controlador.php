<?php
$modulo = $_GET['mod'];
$acao = $_GET['acao'];
if($modulo == 'produto'){
    switch ($acao) {
        case 'insert':
            require_once('modulo/produto/view/insert.php');
            break;
        case 'update':
            require_once('modulo/produto/view/update.php');
            break;
        default:
            require_once('modulo/produto/view/view.php');
            break;
    }
}