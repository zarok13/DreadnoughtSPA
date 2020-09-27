<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface AuthCustomValidationContract
{
    /**
     * customErrorsValidation function
     *
     * @param Request $request
     * @param array $validationArray
     * @return array
     */
    public function customErrorsValidation(Request $request, array $validationArray, $classObject): array;
}
