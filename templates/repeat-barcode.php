<?php

use Jonyo\MarioLego\Model\Barcode;

$id = $id ?? 0;
$size = $size ?? 'small';

$sizes = [
    'small' => 100,
    'medium' => 600,
    'large' => 5000
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
