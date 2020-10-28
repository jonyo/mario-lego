<?php declare(strict_types = 1);

namespace Jonyo\MarioLego\Exception;

class BadRequestException extends HttpException {
    /**
     * The message used in the header if the exception is not caught
     *
     * @var string
     */
    protected $httpHeaderMessage = 'Bad Request';

    /**
     * The HTTP code
     *
     * @var int
     */
    protected $code = 400;
}
