<?php declare(strict_types = 1);

namespace Jonyo\MarioLego\Exception;

class InternalException extends HttpException {
    /**
     * Default message if none provided
     *
     * @var string
     */
    protected $message = 'Internal Exception.';

    /**
     * The HTTP code
     *
     * @var int
     */
    protected $httpHeaderMessage = 'Internal Server Error';

    /**
     * The HTTP code
     *
     * @var int
     */
    protected $code = 500;
}
