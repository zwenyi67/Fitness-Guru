<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CustomNotFoundException extends HttpException
{
    public function render($request)
    {
        return response()->view('errors.404', [], Response::HTTP_NOT_FOUND);
    }
}
