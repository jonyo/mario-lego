<?php declare(strict_types = 1);

use Jonyo\MarioLego\Exception\BadRequestException;
use Jonyo\MarioLego\Exception\InvalidIdException;
use Jonyo\MarioLego\Exception\InvalidSizeException;
use Jonyo\MarioLego\Exception\NotFoundException;
use Jonyo\MarioLego\Model\Barcode;

require '../bootstrap.php';

$barcode = new Barcode();

$codes = [];

$type = $_GET['type'] ?? null;
$validTypes = [
    'named',
    'all-named',
    'id',
    'id-range',
];

if (!$type || !in_array($type, $validTypes)) {
    throw new BadRequestException('Invalid options');
}

// Whether or not to show ID for named barcodes
$showId = !empty($_GET['showId']);
$lastException = null;

if ($type === 'named') {
    if (empty($_GET['named'])) {
        throw new BadRequestException('No barcodes selected!');
    }
    foreach ($_GET['named'] as $slug) {
        $slug = htmlspecialchars($slug);
        $codes[] = $barcode->detailsFromSlug($slug);
    }
} else if ($type === 'all-named') {
    $codes = $barcode->allNamed();
} else if ($type === 'id') {
    $showId = true;
    if (empty($_GET['id'])) {
        throw new BadRequestException('IDs required');
    }
    $all = $_GET['id'];
    $all = preg_replace('/[^0-9]+/', ' ', $all);
    $all = explode(' ', $all);
    $all = array_map('intval', $all);
    $all = array_values(array_filter($all));
    foreach ($all as $id) {
        if ($id < 1 || $id > 210) {
            continue;
        }
        try {
            $codes[] = $barcode->detailsFromId($id);
        } catch (NotFoundException|InvalidIdException $e) {
            $lastException = $e;
        }
    }
} else if ($type === 'id-range') {
    $showId = true;
    $min = (int)$_GET['min'];
    $max = (int)$_GET['max'];
    if ($min < 1) {
        throw new InvalidIdException('Invalid min ID: ' . $min);
    }
    if ($max < $min) {
        throw new InvalidIdException('Max ' . $max . ' must be more than min ' . $min);
    }
    for ($id = $min; $id <= $max; $id++) {
        try {
            $codes[] = $barcode->detailsFromId($id);
        } catch (NotFoundException|InvalidIdException $e) {
            $lastException = $e;
        }
    }
}

if (empty($codes)) {
    if ($lastException) {
        throw $lastException;
    }
    throw new NotFoundException('No valid barcodes could be found with those options.');
}

if ($showId) {
    $codes = $barcode->appendIdsToTitles($codes);
}

$size = (int)($_GET['size'] ?? 2);
$sizes = [1,2,6,12,18];
if (!in_array($size, $sizes)) {
    throw new InvalidSizeException('Invalid size ' . $size . 'cm, must be one of ' . implode('cm, ', $sizes) . 'cm.');
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Barcodes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header class="header">
        <a href="index.php" class="header__back">< Back</a>
        <h1 class="header__title">Barcodes</h1>
    </header>
    <main class="main" role="main">
        <p class="main__tip">
            <strong>Printing Tip:</strong> Be sure to print with the <strong>highest quality</strong> possible for your
            printer.  The barcode details are quite small so need to be printed at max quality to be scannable.
            <br>
            <button onclick="window.print();" class="print-button">Print</button>
        </p>
        <?php foreach($codes as $details): ?>
            <?php template('repeat-barcode', compact('details', 'size')); ?>
        <?php endforeach; ?>
    </main>
</body>
