<?php

namespace App\Http\Controllers;
use DB;
use Response;


/**
 * Class ApiController
 * @package App\Modules\Api\Lesson\Controllers
 */
class ApiController extends Controller{
	public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return Response::json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return Response::json($response, $code);
    }

    public function getInstance($name) {
		$instance_name = $name;
	    $instance = DB::table('instance')
	    				->join('project', 'instance.id_project', '=', 'project.id')
	    				->select('instance.id', 'instance.inst_name' , 'instance.db_name', 'instance.id_host',
                         'instance.version', 'project.proj_name', 'project.url_remote')
	    				->where('instance.inst_name', $instance_name)->first();
        if ( is_null($instance) ){
            return $this->sendError('Not Found', 'Instance '.$name.' not found');
        }else {
            return $this->sendResponse($instance, 'Done');
        }
	}	

    public function getHost($id){
        $host = DB::table('host')
                    ->select('port', 'ip')
                    ->where('id', $id)->first();

        if (is_null($host)){
            return $this->sendError('Not Found', 'Host '.$name.' not found');
        }else {
            return $this->sendResponse($host, 'Done');
        }
    }

	public function updateInstance(Request $request){
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
    }
}