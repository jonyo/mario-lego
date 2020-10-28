<?php declare(strict_types = 1);

namespace Jonyo\MarioLego\Exception;

class InvalidIdException extends BadRequestException {
    /**
     * Default message if none provided
     *
     * @var string
     */
    protected $message = 'Invalid ID Specified.';
}
