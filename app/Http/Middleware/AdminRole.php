<?php

namespace App\Http\Middleware;

use Closure;

class AdminRole {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next, $role) {

		  //dd(  admin()->user()->role('AdminGroup_show'));
		if (!admin()->user()->role($role))
		 {
			
			return redirect(url('need/permission'));
		}
		return $next($request);
	}
}
