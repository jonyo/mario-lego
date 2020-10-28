<?php declare(strict_types = 1);

namespace Jonyo\MarioLego\Exception;

class InvalidPatternException extends BadRequestException {
    /**
     * Default message if none provided
     *
     * @var string
     */
    protected $message = 'Invalid pattern provided.';
}
