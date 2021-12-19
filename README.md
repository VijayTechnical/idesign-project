//About Installation

#Cloning

git clone https://github.com/VijayTechnical/idesign.git

1>Run composer install / composer update command

2>Set your database and run php artisan migrate command

3>Go to vendor/laravel/fortify/src/actions/AttemptToAuthenticate.php

4>Add the following code in handle($request, $next)
{
    if (Fortify::$authenticateUsingCallback) { return $this->handleUsingCustomCallback($request, $next); }

    if ($this->guard->attempt( $request->only(Fortify::username(), 'password'), $request->boolean('remember') )) { if (Auth::user()->utype === 'ADM') { session(['utype' => 'ADM']); return redirect(RouteServiceProvider::ADMIN); } else if (Auth::user()->utype === 'USR') { session(['utype' => 'USR']); return redirect(RouteServiceProvider::HOME); } return $next($request); }

    $this->throwFailedAuthenticationException($request);
}



//Thank you and enjoy your coding
