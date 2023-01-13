<?php

namespace App\Adapter\Http\Exception;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class RequestValidationException extends BadRequestHttpException
{
    public function __construct(private ConstraintViolationListInterface $violationList)
    {
        parent::__construct('Request validation failed');
    }

    public function getViolationList(): ConstraintViolationListInterface
    {
        return $this->violationList;
    }
}