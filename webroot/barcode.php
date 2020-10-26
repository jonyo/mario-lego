<?php

use Jonyo\MarioLego\Model\Barcode;

require '../bootstrap.php';

$barcode = new Barcode();
$id = (int)$_GET['id'] ?? 0;
if ($id < 1) {
    throw new Exception('Invalid id');
}
$pattern = $barcode->patternFromId($id);

header('Content-Type: image/svg+xml');
header('Vary: Accept-Encoding');

/**
 * Notes:
 * 
 * Styling:  20.1mm width for correct barcode size
 * 
 * Uses pattern:
 * | color | space | color | space | color | space | color | space | color | space |
 * 
 * Where each color is .2mm wide and each space is .2mm wide.
 * 
 * Barcodes are 5 colors that repeat.  This SVG repeats the pattern 10 times, making a 20x20cm square.
 * 
 * Viewbox starts at -1 to avoid issues when the image is repeated, and is why it needs 20.1mm width to account for
 * stroke width.
 */

?>
<svg viewBox="-1 0 200 200" xmlns="http://www.w3.org/2000/svg">
    <style>
        :root {
            --red: #b22222;/* #c9191a; */
            --yellow: #fad700; /* #fadd13; */
            --light-green: #9acd33; /* #b9d041; */
            --dark-green: #2e8b57; /* #1e9046 */
            --teal: #26b2aa; /* #23a5a1; */
            --blue: #4169e1; /* #246bb3; */
            --purple: #9370db; /* #a57ab4; */
            --pink: #da70d6; /* #d562a1; */
        }
    </style>
    <defs>
        <g stroke-width="2" id="pattern">
            <?php foreach ($pattern as $lineNum => $color): ?>
                <?php $x = ($lineNum * 4) ?>
                <line x1="<?= $x ?>" y1="0" x2="<?= $x ?>" y2="100%" stroke="var(--<?= $color ?>)" />
            <?php endforeach; ?>
        </g>
    </defs>
    <?php for ($i = 0; $i < 10; $i++): ?>
        <use href="#pattern" x="<?= $i * 20 ?>"/>
    <?php endfor; ?>
</svg>
