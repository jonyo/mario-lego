<?php

// blind bag patterns - shared between them
$blindBags = [
    'a' => ['dark-green', 'red', 'blue', 'pink', 'yellow'],
    'b' => ['dark-green', 'red', 'purple', 'yellow', 'pink'],
    'c' => ['dark-green', 'red', 'pink', 'purple', 'yellow'],
];

$codes = [
    // starter pack
    'start' => [
        'pattern' => ['blue', 'light-green', 'red', 'dark-green', 'purple'],
        'title' => 'start',
    ],
    'goal' => [
        'pattern' => ['red', 'light-green', 'blue', 'yellow', 'dark-green'],
        'title' => 'goal',
    ],
    'goomba' => [
        'pattern' => ['red', 'blue', 'pink', 'yellow', 'dark-green'],
        'title' => 'goomba',
    ],
    'question-block' => [
        'pattern' => ['red', 'pink', 'yellow', 'blue', 'dark-green'],
        'title' => '? block',
    ],
    'cloud-platform' => [
        'pattern' => ['red', 'pink', 'purple', 'blue', 'dark-green'],
        'title' => '☁️ platform',
    ],
    'rotation-platform' => [
        'pattern' => ['red', 'blue', 'purple', 'pink', 'dark-green'],
        'title' => '🔄 platform',
    ],
    'bowser-jr' => [
        'pattern' => ['red', 'teal', 'blue', 'yellow', 'dark-green'],
        'title' => 'bowser jr',
    ],

    // Toad's Treasure Hunt
    'toad-treasure' => [
        'pattern' => ['dark-green', 'red', 'pink', 'blue', 'yellow'],
        'title' => 'toad 💰',
    ],
    'treasure-one' => [
        'pattern' => ['dark-green', 'red', 'pink', 'blue', 'purple'],
        'title' => '💰 1'
    ],
    'treasure-two' => [
        'pattern' => ['dark-green', 'red', 'pink', 'yellow', 'purple'],
        'title' => '💰 2'
    ],
    'treasure-three' => [
        'pattern' => ['dark-green', 'red', 'purple', 'pink', 'yellow'],
        'title' => '💰 3'
    ],

    // Whomp’s Lava Trouble
    'whomp' => [
        'pattern' => ['dark-green', 'red', 'blue', 'pink', 'teal'],
        'title' => 'whomp',
    ],
    'brigde-slide' => [
        'pattern' => ['dark-green', 'red', 'pink', 'yellow', 'teal'],
        'title' => 'bridge slide',
    ],
    'lava-bubble' => [
        'pattern' => $blindBags['a'],
        'title' => 'lava bubble',
    ],
    'p-switch' => [
        'pattern' => ['dark-green', 'red', 'yellow', 'blue', 'light-green'],
        'title' => 'P switch',
    ],

    // Monty Mole & Super Mushroom
    'pow-block' => [
        'pattern' => ['dark-green', 'red', 'yellow', 'blue', 'pink'],
        'title' => 'POW',
    ],
    'stone-eye' => [
        'pattern' => ['dark-green', 'red', 'yellow', 'purple', 'pink'],
        'title' => 'stone eye',
    ],
    'monty-hole' => [
        'pattern' => $blindBags['a'],
        'title' => 'monty hole',
    ],
    'super-mushroom' => [
        'pattern' => ['dark-green', 'red', 'yellow', 'pink', 'teal'],
        'title' => 'super mushroom',
    ],

    // Bowsers Castle
    'time-block' => [
        'pattern' => ['dark-green', 'red', 'blue', 'teal', 'pink'],
        'title' => '⏰ block',
    ],
    'bowser' => [
        'pattern' => ['dark-green', 'red', 'blue', 'light-green', 'purple'],
        'title' => 'bowser',
    ],

    // Blind Bags
    'bullet-bill' => [
        'pattern' => $blindBags['a'],
        'title' => 'bullet bill',
    ],
    'fuzzy' => [
        'pattern' => $blindBags['a'],
        'title' => 'fuzzy',
    ],
    'paragoomba' => [
        'pattern' => $blindBags['a'],
        'title' => 'paragoomba',
    ],
    'urchin' => [
        'pattern' => $blindBags['b'],
        'title' => 'urchin',
    ],
    'eep cheap' => [
        'pattern' => $blindBags['b'],
        'title' => 'eep cheap',
    ],
    'urchin' => [
        'pattern' => $blindBags['b'],
        'title' => 'blooper',
    ],
    'buzzy-beetle' => [
        'pattern' => $blindBags['c'],
        'title' => 'buzzy beetle',
    ],
    'spiny' => [
        'pattern' => $blindBags['c'],
        'title' => 'spiny',
    ],
    'peepa' => [
        'pattern' => ['dark-green', 'red', 'purple', 'pink', 'teal'],
        'title' => 'peepa',
    ],
    'bob-omb' => [
        'pattern' => ['dark-green', 'red', 'blue', 'yellow', 'teal'],
        'title' => 'bob-omb',
    ],

    // Nintendo Entertainment System™
    'telvision' => [
        'pattern' => ['dark-green', 'red', 'blue', 'yellow', 'pink'],
        'title' => 'television',
    ],
    /* 
        Once this mode activates, scanning these solid colors will provide the following effects.

        BLUE: Stomp
        GREEN: Question Block
        RED: Kick Shell
        ORANGE: Mushroom Power-Up
        YELLOW: Coin
    */

    // Found... https://drive.google.com/drive/folders/1T9pvU4igusXtqS5yFyxmRKnSD9FYbbsf
    '' => [
        'pattern' => [],
        'title' => '',
    ],
    'king-boo' => [
        'pattern' => ['dark-green', 'red', 'purple', 'yellow', 'blue'],
        'title' => 'king 👻',
    ],
    'cheep-cheep' => [
        'pattern' => $blindBags['b'],
        'title' => 'cheep cheep',
    ],
    'star' => [
        'pattern' => ['dark-green', 'red', 'purple', 'blue', 'yellow'],
        'title' => 'star',
    ],
    'explosion' => [
        'pattern' => ['dark-green', 'red', 'purple', 'blue', 'pink'],
        'title' => 'explosion',
    ],
    'piranha-plant' => [
        'pattern' => ['dark-green', 'red', 'purple', 'pink', 'blue'],
        'title' => 'piranha plant',
    ],
];

return $codes;
