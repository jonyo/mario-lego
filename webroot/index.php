<?php declare(strict_types = 1);

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
    <link rel="stylesheet" type="text/css" href="dist/index.css">
</head>
<body>
    <header class="header">
        <?= template('layout/fork-me') ?>
        <h1 class="header__title">Barcode Generator</h1>
    </header>
    <main class="main" role="main">
        <form action="generate.php">
            <section class="settings">
                <label class="setting">
                    Which Ones
                    <select name="type" class="setting__dropdown" generator-type>
                        <option value="named">Choose Item(s) Below</option>
                        <option value="all-named">All Working</option>
                        <option value="id">Enter ID(s)</option>
                        <option value="id-range">Enter ID Range</option>
                    </select>
                </label>
                <label class="setting">
                    Size
                    <select name="size" class="setting__dropdown" size-dropdown>
                        <option value="1">1cm</option>
                        <option value="2" selected>2cm</option>
                        <option value="6">6cm</option>
                        <option value="12">12cm</option>
                        <option value="18">18cm (full page)</option>
                    </select>
                </label>
                <label class="setting">
                    Quantity
                    <input type="number" name="quantity" value="1" class="setting__input" min="1" max="99">
                </label>
                <input type="submit" class="setting__button" value="Generate">
            </section>
            <fieldset generator-type-section data-type="named" class="type-section hide">
                <legend class="type-section__legend">Choose Item(s)</legend>
                <label class="setting">
                    <input type="checkbox" name="showId" value="1" class="setting__checkbox"> Show ID in barcode labels
                </label>
                <br>
                <ul class="named-selection">
                    <li class="named-selection__option">
                        <label class="named-selection__option__label">
                            <input type="checkbox" named-checkbox-all>
                            All
                        </label>
                    </li>
                    <?php foreach($named as $code): ?>
                        <li class="named-selection__option">
                            <label class="named-selection__option__label">
                                <input type="checkbox" name="named[]" value="<?= $code['slug'] ?>" named-checkbox>
                                <?= $code['title'] ?> (<?= $code['id'] ?>)
                            </label>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </fieldset>
            <fieldset generator-type-section data-type="all-named" class="type-section hide">
                <legend>All Working</legend>
                <label class="setting">
                    <input type="checkbox" name="showId" value="1" class="setting__checkbox"> Show ID in barcode labels
                </label>
            </fieldset>
            <fieldset generator-type-section data-type="id" class="type-section hide">
                <legend class="type-section__legend">Enter ID(s)</legend>
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
                <legend class="type-section__legend">Enter ID Range</legend>
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
