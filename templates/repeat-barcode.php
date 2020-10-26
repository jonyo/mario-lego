<?php

use Jonyo\MarioLego\Model\Barcode;

$id = $id ?? 0;
$size = $size ?? 'small';

$sizes = [
    // small = 1x1 images
    'small' => 1,
    // medium = 3x3 images
    'medium' => 9,
    // large = 9x12 images 
    // (fill up entire letter-sized printed page, accounting for print margins)
    'large' => 108
];
$id = (int)$id;
if ($id < 1) {
    throw new Exception('Invalid barcode id ' . $id);
}

$barcode = new Barcode();

$details = $barcode->detailsFromId($id);
$repeat = $sizes[$size ?? 'small'];

?>
<article class="barcode barcode--<?= $size ?>">
    <h1 class="barcode__title"><?= $details['title'] ?></h1>
    <?php for ($i = 0; $i < $repeat; $i++): ?>
        <img src="barcode.php?id=<?= $id ?>" class="barcode__pattern">
    <?php endfor; ?>
</article>
