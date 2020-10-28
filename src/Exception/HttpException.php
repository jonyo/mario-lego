<?php declare(strict_types = 1);

namespace Jonyo\MarioLego\Exception;

use Exception;

/**
 * Exeption used for displaying errors if not caught, and using the applicable HTTP header
 */
abstract class HttpException extends Exception {
    /**
     * Template used for the header
     */
    protected const HEADER = '%s %d %s';

    /**
     * The HTTP code
     *
     * @var int
     */
    protected $code = 400;

    /**
     * The message used in the header if the exception is not caught
     *
     * @var string
     */
    protected $httpHeaderMessage = 'Bad Request';

    /**
     * Default message if none provided
     *
     * @var string
     */
    protected $message = 'Unknown HTTP Exception';

    /**
     * Get the http header message used in the header
     */
    final public function getHttpHeaderMessage(): string
    {
        return $this->httpHeaderMessage;
    }

    /**
     * Get the full header to use for this exception
     */
    final public function getHttpHeader(): string
    {
        return sprintf(
            static::HEADER,
            $_SERVER["SERVER_PROTOCOL"] ?? 'HTTP/1.1',
            $this->getCode(),
            $this->getHttpHeaderMessage()
        );
    }
}
