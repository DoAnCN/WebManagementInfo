<?php

use Illuminate\Http\Request;
use App\Instance;
use App\Validator;
use App\Model;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('instances/search/{name}', 'ApiController@getInstance');
Route::get('hosts/search/{id}', 'ApiController@getHost');
Route::get('hosts/search/{name}', 'ApiController@getHost');

// Route::put('instances/update', 'ApiController@updateInstance');

Route::put('instances/update', function(Request $request) {
	$input = $request->all();

    // $validator = $input->validate([
    //     'id_inst' => 'required',
    //     'user_deployed' => 'required'
        // 'status' => 'required'
    // ]);

    // if($validator->failed()){
    //     return $this->sendError('Validation Error.', $validator->errors());       
    // }

    $instance = Instance::find($input['id']);
    if (is_null($instance)) {
        return $this->sendError('Instance '.$name.' not found.');
    }

    $instance->user_deployed = $input['user'];
    $instance->status = $input['status'];
    $instance->time_deployed = $input['time'];
    $instance->save();
});
