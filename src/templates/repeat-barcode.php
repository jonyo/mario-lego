<?php
// need to pass these in
$code = $code ?? '';
$size = $size ?? 'small';

$sizes = [
    'small' => 100,
    'medium' => 600,
    'large' => 5000
];
$codes = require('codes.php');

$repeat = $sizes[$size ?? 'small'];

?>
<article class="barcode barcode--<?= $size ?>">
    <h1 class="barcode__title"><?= $codes[$code]['title'] ?></h1>
    <?php for ($i = 0; $i < $repeat; $i++): ?>
        <img src="barcode.php?code=<?= $code ?>" class="barcode__pattern">
    <?php endfor; ?>
</article>
