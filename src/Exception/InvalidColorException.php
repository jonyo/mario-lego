<?php declare(strict_types = 1);

namespace Jonyo\MarioLego\Exception;

class InvalidColorException extends BadRequestException {
    /**
     * Default message if none provided
     *
     * @var string
     */
    protected $message = 'Invalid color provided';
}
