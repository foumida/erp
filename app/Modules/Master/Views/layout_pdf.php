<?php
$session = \Config\Services::session();
$userData = $session->get('userData');
$isLoggedIn = $session->get('isLoggedIn');
$currenturl = current_url();
$currenturl = explode('/',str_replace(site_url(),'',$currenturl));
$path = $currenturl[0];
?>
<!doctype html>
<html lang="zxx">
    <head>
    <link rel="stylesheet" href="<?= base_url() ; ?>/assets/css/bootstrap.min.css">
    </head>
    <body>
        <?= $this->renderSection('main'); ?>
   	</body>
</html>