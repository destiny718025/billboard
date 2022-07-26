<?php


namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class BaseApiException extends Exception
{
    private $reason;
    private $errorConfig;


    public function error(string $code, $message = "")
    {
        $data = $this->errorConfig[$code] ?? null;
        $this->message = $message ?? "未知的錯誤";
        $this->code = $data['type'] ?? Response::HTTP_BAD_REQUEST;

        throw $this;
    }

    public function setErrorConfig(array $config)
    {
        $this->errorConfig = $config;
    }
}