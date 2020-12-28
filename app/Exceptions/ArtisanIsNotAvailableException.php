<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ArtisanIsNotAvailableException extends HttpException {
    public function __construct(int $statusCode, string $message = null) {
        parent::__construct($statusCode, $message);
    }
}
