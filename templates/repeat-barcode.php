<?php
// requires $details
if (empty($details['id'])) {
    throw new Exception('Invalid barcode passed');
}
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
if (empty($sizes[$size])) {
    throw new Exception('Invalid size');
}
$repeat = $sizes[$size];

?>
<article class="barcode barcode--<?= $size ?>">
    <h1 class="barcode__title"><?= $details['title'] ?></h1>
    <?php for ($i = 0; $i < $repeat; $i++): ?>
        <img src="barcode.php?id=<?= $details['id'] ?>" class="barcode__pattern">
    <?php endfor; ?>
</article>
