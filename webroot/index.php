<?php

use Jonyo\MarioLego\Model\Barcode;

require '../bootstrap.php';

$barcode = new Barcode();
$named = $barcode->allNamed();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <!-- My Simple Website -->
    <title>Barcodes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php foreach($named as $code): ?>
        <?php template('repeat-barcode', ['id' => $code['id'], 'size' => 'small']); ?>
    <?php endforeach; ?>
</body>
