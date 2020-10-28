<?php declare(strict_types = 1);

namespace Jonyo\MarioLego\Model;

use Jonyo\MarioLego\Exception\InvalidColorException;
use Jonyo\MarioLego\Exception\InvalidIdException;
use Jonyo\MarioLego\Exception\InvalidPatternException;
use Jonyo\MarioLego\Exception\NotFoundException;

class Barcode {
    private const MYSTERY_COLOR = 'mystery';

    /**
     * List of barcode colors indexed by code number multiplier
     *
     * @var array
     */
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

    /**
     * First colors in every barcode that are common to all barcodes
     *
     * @var array
     */
    private $headerColorPattern = [
        'dark-green',
        'red',
    ];

    /**
     * List of info for named barcodes set in the config indexed by slug
     *
     * @var array
     */
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
     *
     * @throws \Jonyo\MarioLego\Exception\NotFoundException
     */
    private function patternFromColorCodes(int $a, int $b, int $c): array
    {
        $colors = $this->colorCode;
        $pattern = $this->headerColorPattern;
        if ($colors[$a] === static::MYSTERY_COLOR) {
            // using the "mystery" color - not valid
            throw new NotFoundException('Could not find code - using mystery color');
        }
        $pattern[] = $colors[$a];
        unset($colors[$a]);
        $colors = array_values($colors);
        if ($colors[$b] === static::MYSTERY_COLOR) {
            // using the "mystery" color - not valid
            throw new NotFoundException('Could not find code - using mystery color');
        }
        $pattern[] = $colors[$b];
        unset($colors[$b]);
        $colors = array_values($colors);
        if ($colors[$c] === static::MYSTERY_COLOR) {
            // using the "mystery" color - not valid
            throw new NotFoundException('Could not find code - using mystery color');
        }
        $pattern[] = $colors[$c];
        return $pattern;
    }

    /**
     * Figure out the pattern based on the ID
     *
     * @throws \Jonyo\MarioLego\Exception\NotFoundException
     * @throws \Jonyo\MarioLego\Exception\InvalidIdException
     */
    public function patternFromId(int $id): array
    {
        if ($id < 1 || $id > 210) {
            throw new InvalidIdException('Invalid item ID: ' . $id);
        }
        // id = a*30 + b*5 + c + 1
        $id--;
        $a = (int)floor($id/30);
        $id -= $a * 30;
        $b = (int)floor($id/5);
        $id -= $b * 5;
        $c = $id;
        return $this->patternFromColorCodes($a, $b, $c);
    }

    /**
     * Figure out the ID based on the pattern
     *
     * @throws \Jonyo\MarioLego\Exception\InvalidPatternException
     * @throws \Jonyo\MarioLego\Exception\InvalidColorException
     */
    private function idFromPattern(array $pattern): int
    {
        if (count($pattern) !== 5) {
            throw new InvalidPatternException('Wrong number of colors in pattern, should be 5 colors.');
        }
        $pattern = array_values($pattern);
        $colors = $this->colorCode;
        $a = array_search($pattern[2], $colors);
        if ($a === false) {
            throw new InvalidColorException('Invalid color: ' . $pattern[2]);
        }
        unset($colors[$a]);
        $colors = array_values($colors);
        $b = array_search($pattern[3], $colors);
        if ($b === false) {
            throw new InvalidColorException('Invalid or reused color: ' . $pattern[3]);
        }
        unset($colors[$b]);
        $colors = array_values($colors);
        $c = array_search($pattern[4], $colors);
        if ($c === false) {
            throw new InvalidColorException('Invalid or reused color: ' . $pattern[4]);
        }
        return $this->idFromColorCodes($a, $b, $c);
    }

    /**
     * Get the details of a barcode based on ID
     *
     * If the ID does not go to any named codes it will use the ID for title and slug
     *
     * @throws \Jonyo\MarioLego\Exception\NotFoundException
     * @throws \Jonyo\MarioLego\Exception\InvalidIdException
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
     * Get details from the slug
     *
     * @throws \Jonyo\MarioLego\Exception\NotFoundException
     */
    public function detailsFromSlug(string $slug): array
    {
        if (empty(static::$namedCodesBySlug[$slug])) {
            throw new NotFoundException('Barcode slug not found: ' . $slug);
        }
        return static::$namedCodesBySlug[$slug];
    }

    /**
     * Get all of the named barcode details
     */
    public function allNamed(): array
    {
        return static::$namedCodesBySlug;
    }

    /**
     * Add the id to all titles that are named in the list of codes
     */
    public function appendIdsToTitles(array $codes): array
    {
        foreach ($codes as &$details) {
            if ($details['title'] !== $details['id']) {
                // include id in title
                $details['title'] .= ' [' . $details['id'] . ']';
            }
        }
        return $codes;
    }
}
