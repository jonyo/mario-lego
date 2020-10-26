<?php
$codes = require 'codes.php';

if (!isset($codes[$_GET['code']])) {
    throw new Exception('Invalid code');
}
header('Content-Type: image/svg+xml');
header('Vary: Accept-Encoding');
$code = $codes[$_GET['code']];

// meant to be defined as 2 cm width...
// color should be .2mm, space .2mm
// 5 colors repeating...
// color space color space color space color space color space
?>
<svg viewBox="-1 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
    <g stroke-width="2">
        <?php foreach ($code['pattern'] as $lineNum => $color): ?>
            <?php $x = ($lineNum * 4) ?>
            <line x1="<?= $x ?>" y1="0" x2="<?= $x ?>" y2="100%" stroke="var(--<?= $color ?>)" />
        <?php endforeach; ?>
    </g>
</svg>
