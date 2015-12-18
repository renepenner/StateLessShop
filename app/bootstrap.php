<?php
namespace RenePenner\StateLessShop;

// init autoload
try {
    require_once '../vendor/autoload.php';
} catch (\Exception $e) {
    echo '<h1>Autoload Error!</h1>';
    echo $e->getMessage();
}
