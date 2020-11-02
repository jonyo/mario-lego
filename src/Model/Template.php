<?php declare(strict_types = 1);

namespace Jonyo\MarioLego\Model;

use Jonyo\MarioLego\Exception\InternalException;

/**
 * Template class with built in cache for repeating the same template multiple times
 */
class Template {
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $vars;

    /**
     * @var string
     */
    private $encodedVars;

    /**
     * @var string
     */
    private $output;

    /**
     * The cached instance of the last template requested
     *
     * @var ?\Jonyo\MarioLego\Model\Template
     */
    private static $lastTemplate;

    public function __construct(string $name, array $vars = [])
    {
        $this->name = $name;
        $this->vars = $vars;
        $this->encodedVars = json_encode($vars);
        $this->output = $this->generateOutput();
    }

    /**
     * Get the template, using a cached version of the previous template if the same template requested multiple times
     *
     * @throws \Jonyo\MarioLego\Exception\InternalException If cannot find template
     */
    public static function getTemplate(string $name, array $vars = []): Template
    {
        if (static::$lastTemplate && static::$lastTemplate->isSame($name, $vars)) {
            return static::$lastTemplate;
        }
        static::$lastTemplate = new static($name, $vars);
        return static::$lastTemplate;
    }

    /**
     * Get the template outpet
     */
    public function output(): string
    {
        return $this->output;
    }

    /**
     * Check if this template is the same as the given name and vars
     */
    public function isSame(string $name, array $vars): bool
    {
        if ($name !== $this->name) {
            return false;
        }
        return json_encode($vars) === $this->encodedVars;
    }

    /**
     * Generate the output
     */
    private function generateOutput(): string
    {
        if (!is_readable(BASE_DIR . "templates/$this->name.php")) {
            throw new InternalException('Invalid template, could not find template: ' . $this->name);
        }
        ob_start();
        extract($this->vars);
        require BASE_DIR . "templates/$this->name.php";
        return ob_get_clean();
    }
}
