<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function render($request, Exception|Throwable $e)
    {
        if($this->isHttpException($e))
        {
            switch ($e->getStatusCode())
            {
                // not found
                case '500':
                case 404:
                    return redirect()->guest('home');
                    break;

                // internal error

                default:
                    return $this->renderHttpException($e);
                    break;
            }
        }
        else
        {
            return parent::render($request, $e);
        }
    }
}
