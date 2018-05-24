<?php

namespace App\Exceptions;


use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // 예외를 처리하자.
        // ModelNotFoundException이 발생하면
        // 지정된 뷰를 내용으로 하는 HTTP 404 응답을 반환하라는 의미이다.
        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException or $exception instanceof NotFoundHttpException) {
            return response()->view('errors.notice', [
                'title'       => 'Page Not Found',
                'description' => 'Sorry, the page or resource you are trying to view does not exist.'
            ], 404);
        }
        return parent::render($request, $exception);
        // 주어진 예외를 HTTP 응답으로 변환하고 브라우저에게 보내는 역할
    }
}