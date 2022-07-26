<?php


namespace App\Exceptions;


use Symfony\Component\HttpFoundation\Response;

class ValidationApiException extends BaseApiException
{
    private $errorConfig = [];

    public function __construct($message = "", $code = 0)
    {
        parent::__construct($message, $code);
        $this->setErrorConfig($this->errorConfig);
    }
}