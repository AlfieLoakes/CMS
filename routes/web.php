<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//dd(Request::server('HTTP_HOST'));

/*

Route::get('/', function () {
    $tasks = [
        'Go to the store',
        'Go to the market',
        'Go to work'
        ];

    return view('welcome', [
            'tasks' => $tasks
        ]);
});

*/

//Route::get('/admin/site/[', 'PagesController@index');


Route::get('/admin', 'SitesController@index');
Route::resource('admin/site', 'SitesController');

Route::get('/admin/site/{site}/pages', 'PagesController@index');
Route::get('/admin/site/{site}/page/{page}/edit', 'PagesController@edit');
Route::patch('/admin/site/{site}/page/{page}', 'PagesController@update');

Route::get('/admin/site/{site}/page/create', 'PagesController@create');
Route::post('/admin/site/{site}/page/', 'PagesController@store');
Route::delete('/admin/site/{site}/page/{page}', 'PagesController@destroy');

Route::get('/admin/site/{site}/template', 'TemplatesController@index');
Route::post('/admin/site/{site}/template/', 'TemplatesController@store');
Route::get('/admin/site/{site}/template/{template}/edit', 'TemplatesController@edit');
Route::patch('/admin/site/{site}/template/{template}', 'TemplatesController@update');
Route::delete('/admin/site/{site}/template/{template}', 'TemplatesController@destroy');

Route::get('/admin/site/{site}/subtemplate', 'SubtemplateController@index');
Route::post('/admin/site/{site}/subtemplate/', 'SubtemplateController@create');
Route::get('/admin/site/{site}/subtemplate/{subtemplate}/edit', 'SubtemplateController@edit');
Route::patch('/admin/site/{site}/subtemplate/{subtemplate}', 'SubtemplateController@update');
Route::delete('/admin/site/{site}/subtemplate/{subtemplate}', 'SubtemplateController@destroy');

Route::get('/admin/site/{site}/media/','MediaController@fileCreate');
Route::post('/admin/site/{site}/media/upload/store','MediaController@fileStore');
Route::post('/admin/site/{site}/media/upload/delete','MediaController@fileDestroy');


//Route::post('image/upload/store','ImageUploadController@fileStore');
//Route::post('image/delete','ImageUploadController@fileDestroy');


/*Route::get('/sites', 'SitesController@index');
Route::get('/sites/create', 'SitesController@create');
Route::get('/sites/{project}', 'SitesController@show');
Route::post('/sites', 'SitesController@store');
Route::get('/sites/{project}/edit', 'SitesController@edit');
Route::patch('/sites/{project}', 'SitesController@update');
Route::delete('/sites/{project}', 'SitesController@destroy');

*/





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// COMMENT THIS AND CSS GENERATOR BEFORE INITIAL DEPLOYMENT



Route::group(array('domain' => Request::server('HTTP_HOST')), function() {
    $value1 = '127.0.0.1:8000';
    $value2 ='admin';
    $url = Request::server('HTTP_HOST');
    $check1 = str_contains($url, $value1);
    $check2 = str_contains($url, $value2);

    $site_id = App\Site::where('domain', Request::server('HTTP_HOST'))->get('id')->first();



    Route::get('/', [
        'as'      => 'home',
        'uses'    => 'PagesController@home'
    ])->where('slug', '/')->where('site_id', (string)$site_id);



    Route::get('{slug}', [
        'uses' => 'PagesController@getPage'
    ])->where('slug', '([A-Za-z0-9\-\/]+)')->where('site_id', (string)$site_id);


//dd($site_id->id);

    if ($site_id){



        //dd('NO SLUG CONFIGURED');
    }else {
        // dd('NO SITE CONFIGURED');
    }

    if($check1 == true){
        // Routes

             //   Route::get('{slug}', [
               //     'uses' => 'PagesController@getPage'
                //])->where('slug', '([A-Za-z0-9\-\/]+)')->where('site_id', $site_id);


                //dd('test');



    }

    if($check2 == true){
        // Routes
    }else{
        // Routes
    }
});



