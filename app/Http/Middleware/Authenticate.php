<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class Authenticate {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest())
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect()->guest('auth/login');
			}
		}
		else {
			$user = $this->auth->user();
			if($user->role == 'admin') {
				return new RedirectResponse(url('/admin'));
			}
			else if($user->role == 'cashier'){
				return new RedirectResponse(url('/cashier/dashboard'));
			}
			else if($user->role == 'student'){
				return new RedirectResponse(url('/student/dashboard')); // To be edited
			}
			else{
				$next($request);
			}
		}

		return $next($request);
	}

}
