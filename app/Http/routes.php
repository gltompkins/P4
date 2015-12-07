<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

#Route::get('/', function () {
#    echo '<h1>Welcome from Route get / </h1>';
#    echo 'welcome from app/Http/routes.php';
#});

Route::get('/', 'SiteController@getIndex');
#Route::get('/', function () {
#    return redirect('/sites');
#});

Route::get('/', 'SiteController@getIndex');

Route::get('/test', 'SiteController@test');
#Route::get('/sites', function() {
#    echo '<h1>Welcome from /sites </h1>';
#    echo 'welcome from app/Http/routes.php';

Route::get('/sites', 'SiteController@getIndex');
#});

Route::get('/sites/show/{id}', 'SiteController@getShow');

Route::get('/sites/create', function () {
    return 'form for creating a new websites listing';
});

Route::post('/sites/create', function () {
    return 'process of creating a new websites listing';
});

Route::get('/about', function () {
    echo '<h1>Welcome from /about </h1>';
    echo 'welcome from app/Http/routes.php';
});

Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/userProfile', function () {
    return view('welcome');
});

Route::get('/sites/practice', 'SiteController@getPracticeIndex');

Route::get('/practice1', function () {
    echo 'practice1 route';
    echo '<h1>Test Database Query</h1>';
    try {
        #$results = DB::select('select sitename, siteurl from sites;');
        $results = DB::table('sites')->get();
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>SITES table query results:<br><br>";
        #print_r($results);
        foreach($results as $sites) {
            echo $sites->sitename.'<br>';
            echo $sites->siteurl.'<br>';
            echo '<a href="http://www.w3schools.com">W3schools.com</a></p>';
            #echo '<a href="http://www.w3schools.com">' + $sites->siteurl. +'</a></p>';
        }
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }
});

#Route::get('/practice/{testParam}', function ($testParam) {
#    return 'practice with parameter: '.$testParam;
#});

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database archsite');
        DB::statement('CREATE database archsite');

        return 'Dropped archsite; created archsite.';
    });

};
