<?php
use Illuminate\Support\Facades\Config;
/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
    app_path().'/drivers',
	app_path().'/models',
	app_path().'/database/seeds',
    app_path().'/utils',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

Log::useFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
    // Since API errors can occur in any controller, define a global handler
    // that redirects to login (if non-Ajax request)
    // or returns status (Ajax) appropriately.

    if($exception instanceof GuzzleHttp\Exception\RequestException && $exception->getResponse()) {
        $apiStatus = $exception->getResponse()->getStatusCode();
    } else if($exception instanceof GuzzleHttp\Exception\ConnectException) {
        $apiStatus = 503; // service not available
    } else {
        $apiStatus = 500;
    }

    $apiRequestUnauthorized = $apiStatus == 401;
    $notAuthenticated = $exception instanceof OnlineChatNotAuthenticatedException;

    if($apiRequestUnauthorized || $notAuthenticated) {
        if(Request::ajax()) {
            // There is nothing an Ajax client can do at this point -
            // the human will have to log in. There will need to be appropriate
            // feedback for this in the UI, when an Ajax call fails;
            // e.g. a lightbox with a link to the login page.
            return Response::make('Unauthorized', 401);
        } else {
            if($apiRequestUnauthorized) {
                Session::flash('error', 'Your session has reached its time limit. Please log in again to continue using the CLEAR application.');
            }
            return Redirect::guest('/login');
        }
    }

    Log::error(get_class($exception)."|{$_SERVER['REQUEST_METHOD']}|{$_SERVER['REQUEST_URI']}|".Session::get('email'));
    if (isset($_SERVER['HTTP_REFERER'])) {
        Log::error("Referrer: ".$_SERVER['HTTP_REFERER']);
    }
    // find the last point in application code and log the parameters used there
    foreach ($exception->getTrace() as $trace) {
        if (isset($trace['file']) && !empty($trace['args']) && false !== strpos($trace['file'], "onlineChat/app")) {
            Log::error($trace['file']." : ".$trace['line']);
            Log::error($trace['args']);
            break;
        }
    }
    Log::error($exception);

    // Avoid default HTML error page for Ajax
    if(Request::ajax()) {
        return Response::make(Config::get('app.debug') ? $exception->getMessage() : 'Error', $apiStatus);
    }
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';
Auth::extend('onlineChatApi', function($app) {
    return new \Illuminate\Auth\Guard(new OnlineChatApiUserProvider(), App::make('session.store'));
});
