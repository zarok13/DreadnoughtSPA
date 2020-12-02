<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface AuthCustomValidationContract
{
    /**
     * @param Request $request
     * @param $validationArray
     * @param $classObject
     * @return array
     */
    public function customErrorsValidation(Request $request, $validationArray, $classObject): array;
}
