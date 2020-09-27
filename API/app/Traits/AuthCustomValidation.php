<?php

namespace App\Traits;

use App\Contracts\AuthCustomValidationContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait AuthCustomValidation
{
    /**
     * @param Request $request
     * @param $validationArray
     * @return array
     */
    public function customErrorsValidation(Request $request, $validationArray, $classObject): array
    {
        if (!($classObject instanceof AuthCustomValidationContract))
            return [];

        $errors = [];
        $request = $request->all();
        $validator = Validator::make($request, $validationArray);
        if ($validator->fails()) {
            $errors = $this->convertErrors($validator->errors()->toArray());
        }
        return $errors;
    }

    /**
     * @param $errors
     * @return array
     */
    private function convertErrors($errors)
    {
        $convertedErrors = [];
        foreach ($errors as $key => $error) {
            $convertedErrors[$key] = $error[0];
        }
        return $convertedErrors;
    }
}
