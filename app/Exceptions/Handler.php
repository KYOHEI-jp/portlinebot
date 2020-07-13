<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException; //この追加を忘れないで
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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
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
		return parent::render($request, $exception);
	}
	/*	* 認証していない場合にガードを見てそれぞれのログインページへ飛ばず
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param AuthenticationException $exception
	 * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
	 */
/*	public function unauthenticated($request, authenticationexception $exception)
	{
		if($request->expectsjson()){
			return response()->json(['error' => $exception->getmessage()], 401);
		}

		if (in_array('admin', $exception->guards())) {
			return redirect()->guest(route('admin.login'));
		}
 */
	protected function unauthenticated($request, AuthenticationException $exception) {
		if ($request->expectsJson()) {
			return response()->json(['error' => 'Unauthenticated.'], 401);
		}
		if (in_array('admin', $exception->guards())) { // ここから
			return redirect()->guest('admin/login');
		} // ここまで追記
		return redirect()->guest(route('login'));
	}
}