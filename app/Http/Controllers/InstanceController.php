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
            'DeloyUser'=>'required',
            'Status'=>'required',
        ]);

        $instance = new Instance;
        $instance->Ten_instance=$request->NameInstance;
        $instance->Ten_database=$request->DatabaseName;
        $instance->Domain=$request->DomainName;
        $instance->Deloy_user=$request->DeloyUser;
        $instance->Status=$request->Status;
        $instance->Version=$request->Version;
        $instance->Project_id="1";
        $instance->Host_id="2";
        $instance->created_at=time();
        $instance->save();
        // echo $request->Name;
        // echo $request->DatabaseName;
        // echo $request->DomainName;
        // echo $request->DeloyUser;
        // echo $request->Status;
        // echo $request->Version;

        return redirect('admin/instance/add')->with('note','Added successfully');
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
        ],[
            'NameInstance.required' => 'Please type the User Name',
            'NameInstance.min' => 'User Name must have at least 3 letter',
            'NameInstance.max' => 'Project Name have max 32 letter'
        ]);

       $instance = Instance::find($id);
       $instance->Ten_instance= $request->NameInstance;
       $instance->Ten_database= $request->DatabaseName;
       $instance->Domain= $request->DomainName;
       $instance->Version= $request->Version;
       $instance->Deloy_user= $request->DeloyUser;
       $instance->Status= $request->Status;
       $instance->Project_id=$request->NameProject;
       $instance->Host_id=$request->NameHost;
       $instance->save();

       return redirect('admin/instance/edit/'.$id)->with('note','Edit Successfully');
    }

    public function getDelete($id){
      $instance = Instance::find($id);
      $instance ->delete();
      return redirect('admin/instance/list/')->with('note','Delete Successfully');
    }
}
