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
        $instance = Instance::orderBy('id','DESC')->get();
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
        $instance->name=$request->NameInstance;
        $instance->db_name=$request->DatabaseName;
        $instance->domain=$request->DomainName;
        $instance->user_deployed=$request->DeloyUser;
        $instance->status=$request->Status;
        $instance->version=$request->Version;
        $instance->id_project=$request->Project;
        $instance->id_host="1";
        $instance->created_at=time();
        $instance->save();
        // echo $request->Name;
        // echo $request->DatabaseName;
        // echo $request->DomainName;
        // echo $request->DeloyUser;
        // echo $request->Status;
        // echo $request->Version;

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
       $instance->name= $request->NameInstance;
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
}
