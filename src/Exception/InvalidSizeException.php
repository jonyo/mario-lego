<?php declare(strict_types = 1);

namespace Jonyo\MarioLego\Exception;

class InvalidSizeException extends BadRequestException {
    /**
     * Default message if none provided
     *
     * @var string
     */
    protected $message = 'Invalid size provided.';
}
