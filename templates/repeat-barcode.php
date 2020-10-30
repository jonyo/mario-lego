<?php declare(strict_types = 1);

use Jonyo\MarioLego\Exception\InternalException;

// requires $details $size
if (empty($details['id'])) {
    throw new InternalException('Invalid barcode passed');
}
if (empty($size)) {
    throw new InternalException('Invalid size passed');
}

?>
<article class="barcode barcode--<?= $size ?>">
    <h1 class="barcode__title"><?= $details['title'] ?></h1>
    <?php
    /**
     * SVG / Barcode Notes:
     *
     * Uses pattern (5 colors 5 spaces) repeating:
     * | color | space | color | space | color | space | color | space | color | space |
     *
     * Where each color is .2mm wide and each space is .2mm wide.
     *
     * SVG below uses 1 unit = 1mm - if it is scaled differently it will be the wrong size to scan
     */
    ?>
    <svg class="barcode__pattern" viewBox="0 0 <?= 10 * $size ?> 300" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <g stroke-width=".2" id="pattern<?= $details['id'] ?>">
                <?php foreach ($details['pattern'] as $lineNum => $color): ?>
                    <?php $x = ($lineNum * .4) ?>
                    <line x1="<?= $x ?>" y1="0" x2="<?= $x ?>" y2="100%" stroke="var(--barcode-<?= $color ?>)" />
                <?php endforeach; ?>
            </g>
        </defs>
        <?php for ($i = 0; $i < 5 * $size; $i++): ?>
            <use href="#pattern<?= $details['id'] ?>" x="<?= $i * 2 + .1 ?>"/>
        <?php endfor; ?>
    </svg>
</article>
