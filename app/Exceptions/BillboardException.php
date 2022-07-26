<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class BillboardException extends BaseApiException
{
    private $errorConfig = [
        '001-001' => [
            'type' => Response::HTTP_BAD_REQUEST
        ]
    ];

    public function __construct($message = "", $code = 0)
    {
        parent::__construct($message, $code);
        $this->setErrorConfig($this->errorConfig);
    }
}