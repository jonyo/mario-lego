<?php declare(strict_types = 1);

namespace Jonyo\MarioLego\Exception;

class InvalidQuantityException extends BadRequestException {
    /**
     * Default message if none provided
     *
     * @var string
     */
    protected $message = 'Invalid quantity provided, must be between 1 and 99.';
}
