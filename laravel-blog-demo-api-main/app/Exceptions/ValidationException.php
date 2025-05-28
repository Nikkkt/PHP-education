<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException as BaseValidationException;

class ValidationException extends BaseValidationException
{
    public function render($request): JsonResponse
    {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $this->validator->errors()->toArray(),
            ], 422);
        }

        return redirect()->back()
            ->withInput($request->input())
            ->withErrors($this->validator);
    }
}
