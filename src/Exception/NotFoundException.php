<?php declare(strict_types = 1);

namespace Jonyo\MarioLego\Exception;

class NotFoundException extends HttpException {
    /**
     * Default message if none provided
     *
     * @var string
     */
    protected $message = 'Item not found.';

    /**
     * The message used in the header if the exception is not caught
     *
     * @var string
     */
    protected $httpHeaderMessage = 'Not Found';

    /**
     * The HTTP code
     *
     * @var int
     */
    protected $code = 404;
}
