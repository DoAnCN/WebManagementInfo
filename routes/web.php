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
        echo $host->name."<br>";
    }
});

Route::get('admin/login',['as'=>'getLogin','uses'=>'UserController@getLoginAdmin']);
Route::post('admin/login',['as'=>'postLogin','uses'=>'UserController@postLoginAdmin']);
Route::get('admin/logout','UserController@getLogoutAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::group(['prefix'=>'instance'],function(){
        //admin/instance/list
        Route::get('list',['as'=>'list','uses'=>'InstanceController@getList']);
        
        Route::get('add','InstanceController@getAdd');
        Route::post('add',['as'=>'postAddInstance', 'uses'=>'InstanceController@postAdd']);

        Route::get('edit/{id}','InstanceController@getEdit');
        Route::post('edit/{id}','InstanceController@postEdit');

        Route::get('delete/{id}','InstanceController@getDelete');
    });

    Route::group(['prefix'=>'host'],function(){
        //admin/host/list
        Route::get('list', 'HostController@getList');

        Route::get('add','HostController@getAdd');
        Route::post('add',['as'=>'postAddHost','uses'=>'HostController@postAdd']);

        Route::get('edit/{id}','HostController@getEdit');
        Route::post('edit/{id}','HostController@postEdit');

        Route::get('delete/{id}','HostController@getDelete');

        
    });

    Route::group(['prefix'=>'project'],function(){
        //admin/project/list
        Route::get('list','ProjectController@getList');

        Route::get('add','ProjectController@getAdd');
        Route::post('add',['as'=>'postAddProj','uses'=> 'ProjectController@postAdd']);

        Route::get('edit/{id}','ProjectController@getEdit');
        Route::post('edit/{id}','ProjectController@postEdit');

        Route::get('delete/{id}','ProjectController@getDelete');
    });

    Route::group(['prefix'=>'user'],function(){
        //admin/user/list
        Route::get('list',['as'=>'getListUser','uses'=> 'UserController@getList']);

        Route::get('add','UserController@getAdd');
        Route::post('add',['as'=>'postAddUser','uses'=> 'UserController@postAdd']);

        Route::get('edit/{id}','UserController@getEdit');
        Route::post('edit/{id}','UserController@postEdit');

        Route::get('delete/{id}','UserController@getDelete');
    });


});


Route::get("new-user", function(){
   $user = new App\User;
   $user->name="dat";
   $user->email="admin@gmail.com";
   $user->password=Hash::make("123456");
   echo $user->save();
});
