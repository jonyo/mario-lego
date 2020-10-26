<?php

namespace Jonyo\MarioLego\Model;

use Exception;

class Barcode {
    private const MYSTERY_COLOR = 'mystery';
    
    private $colorCode = [
        0 => 'blue',
        1 => 'pink',
        // so far - seems unused but needed for codes to match ID tags
        2 => self::MYSTERY_COLOR,
        3 => 'yellow',
        4 => 'purple',
        5 => 'teal',
        6 => 'light-green',
    ];

    private $headerColorPattern = [
        'dark-green',
        'red',
    ];

    private static $namedCodesBySlug = [];

    /**
     * List of info for named barcodes indexed by id
     *
     * @var array
     */
    private static $namedCodesById = [];

    public function __construct() {
        if (empty(static::$namedCodesBySlug)) {    
            static::$namedCodesBySlug = codes();
            foreach (static::$namedCodesBySlug as $slug => &$details) {
                $details['id'] = $this->idFromPattern($details['pattern']);
                $details['slug'] = $slug;
                static::$namedCodesById[$details['id']] = $details;
            }
        }
    }

    /**
     * Generate the ID based on the 3 color codes
     */
    private function idFromColorCodes(int $a, int $b, int $c): int
    {
        return $a * 30 + $b * 5 + $c + 1;
    }

    /**
     * Generate the full color pattern based on 3 color codes
     */
    private function patternFromColorCodes(int $a, int $b, int $c): array
    {
        $colors = $this->colorCode;
        $pattern = $this->headerColorPattern;
        if ($colors[$a] === static::MYSTERY_COLOR) {
            // using the "mystery" color - not valid
            throw new Exception('Using mystery color');
        }
        $pattern[] = $colors[$a];
        unset($colors[$a]);
        $colors = array_values($colors);
        if ($colors[$b] === static::MYSTERY_COLOR) {
            // using the "mystery" color - not valid
            throw new Exception('Using mystery color');
        }
        $pattern[] = $colors[$b];
        unset($colors[$b]);
        $colors = array_values($colors);
        if ($colors[$c] === static::MYSTERY_COLOR) {
            // using the "mystery" color - not valid
            throw new Exception('Using mystery color');
        }
        $pattern[] = $colors[$c];
        return $pattern;
    }

    /**
     * Figure out the pattern based on the ID
     */
    public function patternFromId(int $id): array
    {
        // id = a*30 + b*5 + c + 1
        $id--;
        $a = floor($id/30);
        $id -= $a * 30;
        $b = floor($id/5);
        $id -= $b * 5;
        $c = $id;
        return $this->patternFromColorCodes($a, $b, $c);
    }

    /**
     * Figure out the ID based on the pattern
     */
    public function idFromPattern(array $pattern): int
    {
        if (count($pattern) !== 5) {
            throw new Exception('Wrong number of colors in pattern, should be 5 colors.');
        }
        $pattern = array_values($pattern);
        $colors = $this->colorCode;
        $a = array_search($pattern[2], $colors);
        if ($a === false) {
            throw new Exception('Invalid color ' . $pattern[2]);
        }
        unset($colors[$a]);
        $colors = array_values($colors);
        $b = array_search($pattern[3], $colors);
        if ($b === false) {
            throw new Exception('Invalid/reused color ' . $pattern[3]);
        }
        unset($colors[$b]);
        $colors = array_values($colors);
        $c = array_search($pattern[4], $colors);
        if ($c === false) {
            throw new Exception('Invalid/reused color ' . $pattern[4]);
        }
        return $this->idFromColorCodes($a, $b, $c);
    }

    /**
     * Get the details of a barcode based on ID
     * 
     * If the ID does not go to any named codes it will use the ID for title and slug
     */
    public function detailsFromId(int $id): array
    {
        return static::$namedCodesById[$id] ??
            [
                'id' => $id,
                'slug' => $id,
                'title' => $id,
                'pattern' => $this->patternFromId($id)
            ];
    }

    /**
     * Get all of the named barcode details
     */
    public function allNamed(): array
    {
        return static::$namedCodesBySlug;
    }
}
