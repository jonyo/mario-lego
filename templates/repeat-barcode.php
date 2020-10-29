<?php declare(strict_types = 1);

use Jonyo\MarioLego\Exception\InternalException;

// requires $details
if (empty($details['id'])) {
    throw new InternalException('Invalid barcode passed');
}
$size = $size ?? 'small';
$sizes = [
    // small = 1x1 images
    'small' => 2,
    // medium = 3x3 images
    'medium' => 6,
    // large = 9x16-ish images
    // (fill up entire letter-sized printed page, accounting for print margins)
    'large' => 18,
];
if (empty($sizes[$size])) {
    throw new InternalException('Invalid size: ' . htmlspecialchars($size) . ' - must be small, medium, or large');
}
$multiplier = $sizes[$size];

?>
<article class="barcode barcode--<?= $size ?>">
    <h1 class="barcode__title"><?= $details['title'] ?></h1>
    <?php
    /**
     * SVG Notes:
     *
     * Uses pattern:
     * | color | space | color | space | color | space | color | space | color | space |
     *
     * Where each color is .2mm wide and each space is .2mm wide.
     *
     * SVG below uses 10 units = 1mm, so 2 = .2mm
     *
     * Barcodes are 5 colors that repeat.
     */
    ?>
    <svg class="barcode__pattern" viewBox="0 0 <?= 100 * $multiplier ?> 3000" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <g stroke-width="2" id="pattern<?= $details['id'] ?>">
                <?php foreach ($details['pattern'] as $lineNum => $color): ?>
                    <?php $x = ($lineNum * 4) ?>
                    <line x1="<?= $x ?>" y1="0" x2="<?= $x ?>" y2="100%" stroke="var(--<?= $color ?>)" />
                <?php endforeach; ?>
            </g>
        </defs>
        <?php for ($i = 0; $i < 5 * $multiplier; $i++): ?>
            <use href="#pattern<?= $details['id'] ?>" x="<?= $i * 20 + 1 ?>"/>
        <?php endfor; ?>
    </svg>
</article>
