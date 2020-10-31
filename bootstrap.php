<?php declare(strict_types = 1);

/**
 * Note: this is a very basic app so this just sets up a very basic framework
 */

define ('BASE_DIR', __DIR__ . '/');

require 'vendor/autoload.php';

/**
 * Display the given template
 */
function template(string $name, array $vars = []): void
{
    extract($vars);
    include BASE_DIR . "templates/$name.php";
}

/**
 * Get the named codes from config
 */
function codes(): array
{
    return require BASE_DIR . 'config/codes.php';
}

/**
 * Handle uncaught exceptions - this is a simple app, we use exceptions for any errors and let this display the error
 */
set_exception_handler(function (Throwable $exception) {
    require BASE_DIR . 'templates/layout/error.php';
});
