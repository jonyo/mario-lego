<?php

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
    throw new Exception('Invalid options');
}

if ($type === 'named') {
    if (empty($_GET['named'])) {
        throw new Exception('No barcodes selected!');
    }
    foreach ($_GET['named'] as $slug) {
        $slug = htmlspecialchars($slug);
        $codes[] = $barcode->detailsFromSlug($slug);
    }
} else if ($type === 'all-named') {
    $codes = $barcode->allNamed();
} else if ($type === 'id') {
    if (empty($_GET['id'])) {
        throw new Exception('IDs required');
    }
    $all = $_GET['id'];
    $all = preg_replace('/[^0-9]+/', ' ', $all);
    $all = explode(' ', $all);
    $all = array_map('intval', $all);
    $all = array_values(array_filter($all));
    foreach ($all as $id) {
        if ($id < 1) {
            continue;
        }
        try {
            $details = $barcode->detailsFromId($id);
            if ($details['title'] !== $id) {
                // include id in title
                $details['title'] .= ' (' . $id . ')';
            }
            $codes[] = $details;
        } catch (Exception $e) {
            // noop - it is expected to just skip any invalid.
        }
    }
} else if ($type === 'id-range') {
    $min = (int)$_GET['min'];
    $max = (int)$_GET['max'];
    if ($min < 1) {
        throw new Exception('Invalid min ID');
    }
    if ($max < $min) {
        throw new Exception('Max must be more than min');
    }
    for ($id = $min; $id <= $max; $id++) {
        try {
            $details = $barcode->detailsFromId($id);
            if ($details['title'] !== $id) {
                // include id in title
                $details['title'] .= ' (' . $id . ')';
            }
            $codes[] = $details;
        } catch (Exception $e) {
            // noop - it is expected to get some that use mystery color, we just skip them
        }
    }
}

if (empty($codes)) {
    throw new Exception('No valid barcodes to show');
}

$size = $_GET['size'] ?? 'small';
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
        <h1 class="header__title">Barcodes</h1>
    </header>
    <main class="main" role="main">
        <?php foreach($codes as $details): ?>
            <?php template('repeat-barcode', compact('details', 'size')); ?>
        <?php endforeach; ?>
    </main>
    <script>
        window.print();
    </script>
</body>
