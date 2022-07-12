<?php

namespace App\Exceptions;

use Exception;

class ExpiredTokenException extends Exception
{
     public function render($request): \Illuminate\Http\JsonResponse
     {
         return response()->json([
             'codigo' => 5002,
             'message' => 'The token has expired. Refresh it from /login [POST] endpoint.'
         ], 401);
     }
}
