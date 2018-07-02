<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instance;
use App\Project;
use App\Host;
use DateTime;
 

class InstanceController extends Controller
{
    //
    public function getList(){
        $instance = \DB::table('instance')
                        ->join('project', 'instance.id_project', '=', 'project.id')
                        ->join('host', 'instance.id_host', '=', 'host.id')
                        ->select('instance.*', 'project.proj_name', 'host.host_name')
                        ->orderBy('id','DESC')->get();
           // $instance = Instance::orderBy('id','DESC')->get();
        return view('admin.instance.list',['instance'=>$instance]);
    }

    public function getAdd(){
        $project = Project::all();
        $host= Host::all();
        return view('admin.instance.add',['project'=>$project],['host'=>$host]  );
    }

    public function postAdd(Request $request){
        $this->validate($request,
        [
            'NameInstance' => 'required|min:3|max:100',
            'DatabaseName'=>'required',
            'DomainName'=>'required',
            'Version'=>'required',
        ]);

        $instance = new Instance;
        $instance->inst_name=$request->NameInstance;
        $instance->db_name=$request->DatabaseName;
        $instance->domain=$request->DomainName;
        $instance->user_deployed=$request->DeloyUser;
        $instance->status=$request->Status;
        $instance->version=$request->Version;
        $instance->id_project=$request->Project;
        $instance->id_host=$request->Host;
        $instance->created_at=time();
        $host = Host::find($instance->id_host);
        if(count($host) == 1){
          $host->num_inst = $host->num_inst + 1;
          $host->save();
        }
        $instance->save();

        return redirect('admin/instance/list')->with('note','Added successfully');
    }

    public function getEdit($id){
        $host = Host::all();
        $project = Project::all();
        $instance = Instance::find($id);
        // dd($host);
        return view('admin.instance.edit',compact('instance','project','host'));
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'NameInstance'=>'required | min:3'
        ]);

       $instance = Instance::find($id);
       $instance->inst_name= $request->NameInstance;
       $instance->db_name= $request->DatabaseName;
       $instance->domain= $request->DomainName;
       $instance->version= $request->Version;
       $instance->user_deployed= $request->DeloyUser;
       $instance->status= $request->Status;
       $instance->id_project=$request->NameProject;
       $instance->id_host=$request->NameHost;
       $instance->save();

       return redirect('admin/instance/edit/'.$id)->with('note','Edit Successfully');
    }

    public function getDelete($id){
      $instance = Instance::find($id);
      $instance ->delete();
      return redirect('admin/instance/list/')->with('note','Delete Successfully');
    }

    // public function getallheaders()($value='')
    // {
    //   # code...
    // }
}
