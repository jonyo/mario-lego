<?php declare(strict_types = 1);

/**
 * Note: this is a very basic app so this just sets up a very basic framework
 */

define ('BASE_DIR', __DIR__ . '/');

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
 * Set up autoload for the few classes we have using PSR-4
 */
spl_autoload_register(function ($class) {
    // project-specific namespace prefix
    $prefix = 'Jonyo\\MarioLego\\';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = BASE_DIR . 'src/' . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});
