<?php
require 'bootstrap.php';
$codes = require 'codes.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <!-- My Simple Website -->
    <title>Jonathan Foote's Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php foreach($codes as $index => $code): ?>
        <?php template('repeat-barcode', ['code' => $index, 'size' => 'small']); ?>
    <?php endforeach; ?>
</body>
