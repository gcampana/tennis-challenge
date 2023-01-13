<?php

namespace App\Adapter\Http\ArgumentResolver;

use App\Adapter\Http\DTO\RequestDTO;
use App\Adapter\Http\Exception\RequestValidationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestArgumentResolver implements ArgumentValueResolverInterface
{
    public function __construct(
        private ValidatorInterface $validator
    )
    {
    }

    public function supports(Request $request, ArgumentMetadata $argumentMetadata): bool
    {
        if($argumentMetadata->getType() == ''){
            return false;
        }
        $reflectionClass = new \ReflectionClass($argumentMetadata->getType());
        return $reflectionClass->implementsInterface(RequestDTO::class);
    }

    public function resolve(Request $request, ArgumentMetadata $argumentMetadata): iterable
    {
        $class = $argumentMetadata->getType();
        $dto = new $class($request);

        $errors = $this->validator->validate($dto);
        if(count($errors) > 0){
            throw new RequestValidationException($errors);
        }
        yield $dto;
    }
}
