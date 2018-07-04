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
						->join('host', 'instance.id_host', '=', 'host.id')
	    				->select('instance.id', 'instance.inst_name' , 'instance.db_name',
                         'instance.version', 'project.proj_name', 'project.url_remote',
                          'host.host_name', 'host.ip', 'host.port' )
	    				->where('instance.inst_name', $instance_name)->first();
        if ($instance){
            return $this->sendResponse($instance, 'Done');
        }else {
            return $this->sendError('Not Found', 'Instance '.$name.' not found');
        }
	}	

    public function getHost($name){
        $host = DB::table('host')
                    ->select('port', 'ip')
                    ->where('host_name', $name)->first();

        if ($host){
            return $this->sendResponse($host, 'Done');
        }else {
            return $this->sendError('Not Found', 'Host '.$name.' not found');
        }
    }

	public function updateInstance(){
        $input = $request->all();
        dd($input);
        // $validator = Validator::make($input, [
        //     'name' => 'required',
        //     'user_deployed' => 'required'
        // ]);

        // if($validator->fails()){
        //     return $this->sendError('Validation Error.', $validator->errors());       
        // }

        // $instance = Instance::find($id);
        // if (is_null($instance)) {
        //     return $this->sendError('Instance not found.');
        // }

        // $instance->inst_name = $input['name'];
        // $instance->description = $input['user_deployed'];
        // $post->save();
    }
}