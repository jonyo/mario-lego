<?php
/**
 * @var Throwable $exception
 */

use Jonyo\MarioLego\Exception\HttpException;

if ($exception instanceof HttpException) {
    header($exception->getHttpHeader());
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $exception->getCode() ?> Error</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header class="header">
        <a href="index.php" class="header__back">< Back</a>
        <h1 class="header__title">OOPS!</h1>
    </header>
    <main class="main error" role="main">
        <h1 class="error__title"><?= $exception->getCode() ?> Error:</h1>
        <p class="error__message"><?= $exception->getMessage() ?></p>
    </main>
</body>
