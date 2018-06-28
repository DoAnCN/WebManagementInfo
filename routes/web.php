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

Route::get('admin/login','UserController@getLoginAdmin');
Route::post('admin/login','UserController@postLoginAdmin');
Route::get('admin/logout','UserController@getLogoutAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::group(['prefix'=>'instance'],function(){
        //admin/instance/list
        Route::get('list','InstanceController@getList');
        
        Route::get('add','InstanceController@getAdd');
        Route::post('add','InstanceController@postAdd');

        Route::get('edit/{id}','InstanceController@getEdit');
        Route::post('edit/{id}','InstanceController@postEdit');

        Route::get('delete/{id}','InstanceController@getDelete');
    });

    Route::group(['prefix'=>'host'],function(){
        //admin/host/list
        Route::get('list','HostController@getList');

        Route::get('add','HostController@getAdd');
        Route::post('add','HostController@postAdd');

        Route::get('edit/{id}','HostController@getEdit');
        Route::post('edit/{id}','HostController@postEdit');

        Route::get('delete/{id}','HostController@getDelete');

        
    });

    Route::group(['prefix'=>'project'],function(){
        //admin/project/list
        Route::get('list','ProjectController@getList');

        Route::get('add','ProjectController@getAdd');
        Route::post('add','ProjectController@postAdd');

        Route::get('edit/{id}','ProjectController@getEdit');
        Route::post('edit/{id}','ProjectController@postEdit');

        Route::get('delete/{id}','ProjectController@getDelete');
    });

    Route::group(['prefix'=>'user'],function(){
        //admin/user/list
        Route::get('list','UserController@getList');

        Route::get('add','UserController@getAdd');
        Route::post('add','UserController@postAdd');

        Route::get('edit/{id}','UserController@getEdit');
        Route::post('edit/{id}','UserController@postEdit');

        Route::get('delete/{id}','UserController@getDelete');
    });


});
