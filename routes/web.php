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
use App\Instance;
Route::get('/', function () {
    return view('welcome');
});

Route::get('thu',function(){
    $instance = Instance::find(1);
    foreach($instance->host as $host)
    {
        echo $host->Ten_host."<br>";
    }
});

Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'instance'],function(){
        //admin/instance/list
        Route::get('list','InstanceController@getList');
        Route::get('add','InstanceController@getAdd');
        Route::get('edit','InstanceController@getEdit');

        Route::post('add','InstanceController@postAdd');
    });

    Route::group(['prefix'=>'host'],function(){
        //admin/host/list
        Route::get('list','HostController@getList');
        Route::get('add','HostController@getAdd');
        Route::get('edit','HostController@getEdit');

        Route::post('add','HostController@postAdd');
    });

    Route::group(['prefix'=>'project'],function(){
        //admin/project/list
        Route::get('list','ProjectController@getList');
        Route::get('add','ProjectController@getAdd');
        Route::get('edit','ProjectController@getEdit');

        Route::post('add','ProjectController@postAdd');
    });

    Route::group(['prefix'=>'user'],function(){
        //admin/user/list
        Route::get('list','UserController@getList');
        Route::get('add','UserController@getAdd');
        Route::get('edit','UserController@getEdit');

        Route::post('add','UserController@postAdd');
    });


});
