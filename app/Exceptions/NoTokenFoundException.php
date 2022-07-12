<?php

namespace App\Exceptions;

use Exception;

class NoTokenFoundException extends Exception
{
     public function render($request): \Illuminate\Http\JsonResponse
     {
         return response()->json([
             'codigo' => 5003,
             'message' => 'No token found. Empty auth header maybe?'
         ], 401);
     }
}
