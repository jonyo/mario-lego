<?php

use Jonyo\MarioLego\Model\Barcode;

require '../bootstrap.php';

$barcode = new Barcode();
$named = $barcode->allNamed();
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
        <h1 class="header__title">Barcode Generator</h1>
    </header>
    <main class="main" role="main">
        <p class="main__tip">
            <strong>Tip:</strong> Be sure to print with the highest quality possible for your printer.  These Barcodes
            are quite small and can get blurred together, or sometimes the color "dimmed" if quality is not set to max.
        </p>
        <form action="generate.php" target="_blank">
            <label>
                Type:
                <select name="type" generator-type>
                    <option value="named">Choose Item(s)</option>
                    <option value="all-named">All Known Items</option>
                    <option value="id">Enter ID(s)</option>
                    <option value="id-range">Enter ID Range</option>
                </select>
            </label>
            <label>
                Size:
                <select name="size">
                    <option>small</option>
                    <option>medium</option>
                    <option value="large">large (full page barcode)</option>
                </select>
            </label>
            <input type="submit" value="Generate">
            <fieldset generator-type-section data-type="named" class="type-section hide">
                <legend>Choose Item(s)</legend>
                <ul class="named-selection">
                    <li class="named-selection__option">
                        <label class="option-box">
                            <input type="checkbox" named-checkbox-all>
                            All
                        </label>
                    </li>
                    <?php foreach($named as $code): ?>
                        <li class="named-selection__option">
                            <label class="option-box">
                                <input type="checkbox" name="named[]" value="<?= $code['slug'] ?>" named-checkbox>
                                <?= $code['title'] ?> (<?= $code['id'] ?>)
                            </label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </fieldset>
            <fieldset generator-type-section data-type="id" class="type-section hide">
                <legend>Enter ID(s)</legend>
                <p class="tip">
                    Enter the ID(s).  If more than one, seperate the number by spaces.
                    <strong>Valid IDs are 1 to 210.</strong>
                    Note that some ID's won't work, it will automatically skip them.  Also note that not all Barcodes
                    will do something.  This option is mainly to experiment to find new working barcodes.
                </p>
                <label>
                    ID(s)
                    <input type="text" name="id" placeholder="e.g. 4 10" required>
                </label>
            </fieldset>
            <fieldset generator-type-section data-type="id-range" class="type-section hide">
                <legend>Enter ID Range</legend>
                <p class="tip">
                    Note that some ID's won't work, it will automatically skip them.  Also note that not all Barcodes
                    will do something.  This option is mainly to experiment to find new working barcodes.
                </p>
                <label>
                    Min ID
                    <input type="number" name="min" min="1" max="210" placeholder="1" value="1" required>
                </label>
                <br>
                <label>
                    Max ID
                    <input type="number" name="max" min="1" max="210" placeholder="150" required>
                </label>
            </fieldset>
        </form>
    </main>
    <script src="generator.js"></script>
</body>
