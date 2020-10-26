<?php
// blind bag patterns - shared between enemies
$blindBags = [
    'a' => ['dark-green', 'red', 'blue', 'pink', 'yellow'],
    'b' => ['dark-green', 'red', 'purple', 'yellow', 'pink'],
    'c' => ['dark-green', 'red', 'pink', 'purple', 'yellow'],
];

/**
 * Named codes - index is the slug.  Values are `pattern` and `title`.
 */
return [
    // starter pack
    'start' => [
        'pattern' => ['dark-green', 'red', 'light-green', 'blue', 'purple'],
        'title' => 'start',
    ],
    'goal' => [
        'pattern' => ['dark-green', 'red', 'light-green', 'blue', 'yellow'],
        'title' => 'goal',
    ],
    'goomba' => [
        'pattern' => ['dark-green', 'red', 'blue', 'pink', 'yellow'],
        'title' => 'goomba',
    ],
    'question-block' => [
        'pattern' => ['dark-green', 'red', 'pink', 'yellow', 'blue'],
        'title' => '? block',
    ],
    'cloud-platform' => [
        'pattern' => ['dark-green', 'red', 'pink', 'purple', 'blue'],
        'title' => '☁️ platform',
    ],
    'rotation-platform' => [
        'pattern' => ['dark-green', 'red', 'blue', 'purple', 'pink'],
        'title' => '🔄 platform',
    ],
    'bowser-jr' => [
        'pattern' => ['dark-green', 'red', 'teal', 'blue', 'yellow'],
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
    'bridge-slide' => [
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
    /*
    '' => [
        'pattern' => ['dark-green', 'red',],
        'title' => '',
    ],
    */
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
    'boo' => [
        'pattern' => ['dark-green', 'red', 'purple', 'pink', 'light-green'],
        'title' => 'boo',
    ],
    'pokey' => [
        'pattern' => ['dark-green', 'red', 'yellow', 'purple', 'light-green'],
        'title' => 'pokey',
    ],
    'yoshi-speech' => [
        'pattern' => ['dark-green', 'red', 'yellow', 'blue', 'purple'],
        'title' => 'yoshi',
    ],
    // 71369
    'cyclical-arrows' => [
        'pattern' => ['dark-green', 'red', 'yellow', 'teal', 'purple'],
        'title' => 'cyclical arrows',
    ],
    // 71362
    'koopa-troopa' => [
        'pattern' => ['dark-green', 'red', 'yellow', 'teal', 'light-green'],
        'title' => 'koopa troopa',
    ],
    // 71362
    'coin1' => [
        'pattern' => ['dark-green', 'red', 'yellow', 'teal', 'pink'],
        'title' => 'coin',
    ],
    'dry-bones' => [
        'pattern' => ['dark-green', 'red', 'blue', 'purple', 'yellow'],
        'title' => 'dry bones',
    ],
    // 71360
    'cyclical-arrows2' => [
        'pattern' => ['dark-green', 'red', 'blue', 'purple', 'light-green'],
        'title' => 'cyclical arrows',
    ],
    'mario-melody' => [
        'pattern' => ['dark-green', 'red', 'blue', 'yellow', 'pink'],
        'title' => 'mario melody',
    ],
    'hammer' => [
        'pattern' => ['dark-green', 'red', 'blue', 'light-green', 'pink'],
        'title' => 'hammer',
    ],
    // 71366
    'cyclical-arrows4' => [
        'pattern' => ['dark-green', 'red', 'blue', 'light-green', 'teal'],
        'title' => 'cyclical arrows',
    ],
    'shy-guy' => [
        'pattern' => ['dark-green', 'red', 'blue', 'pink', 'purple'],
        'title' => 'shy guy',
    ],
    // 81369
    'cyclical-arrows5' => [
        'pattern' => ['dark-green', 'red', 'blue', 'teal', 'yellow'],
        'title' => 'cyclical arrows',
    ],
    // 71377
    'coin2' => [
        'pattern' => ['dark-green', 'red', 'light-green', 'pink', 'teal'],
        'title' => 'coin',
    ],
    // 71376
    'bidirectional-arrows' => [
        'pattern' => ['dark-green', 'red', 'pink', 'purple', 'teal'],
        'title' => 'arrows',
    ],
    // 71365
    'bidirectional-arrows2' => [
        'pattern' => ['dark-green', 'red', 'pink', 'light-green', 'blue'],
        'title' => 'arrows',
    ],
    'toad-speech' => [
        'pattern' => ['dark-green', 'red', 'pink', 'light-green', 'teal'],
        'title' => 'toad speech',
    ],
    // 71362 ?? same as other
    'koopa-troopa2' => [
        'pattern' => ['dark-green', 'red', 'pink', 'teal', 'purple'],
        'title' => 'koopa troopa',
    ],
    'lava' => [
        'pattern' => ['dark-green', 'red', 'pink', 'teal', 'yellow'],
        'title' => 'lava',
    ],
    'thwamp' => [
        'pattern' => ['dark-green', 'red', 'pink', 'teal', 'light-green'],
        'title' => 'thwamp',
    ],
];
