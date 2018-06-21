<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instance;
use DateTime;
 

class InstanceController extends Controller
{
    //
    public function getList(){
        $instance = Instance::all();
        return view('admin.instance.list',['instance'=>$instance]);
    }

    public function getAdd(){
        $instance = Instance::all();
        return view('admin.instance.add',['instance'=>$instance]);
        // return view('admin.instance.add');
    }

    public function postAdd(Request $request){
        // $this->validate($request,
        // [
        //     'Name' => 'required|min:3|max:100'
        // ],
        // [
        //     'Name.required' => 'You must fill the Name',
        //     'Name.min' => 'The Instance name must be have at least 3 letter and max 100 letter',
        //     'Name.max' => 'The Instance name must be have at least 3 letter and max 100 letter',
        // ]);

        $instance = new Instance;
        $instance->Ten_instance=$request->Name;
        $instance->Ten_database=$request->DatabaseName;
        $instance->Domain=$request->DomainName;
        $instance->Version=$request->Version;
        $instance->Deloy_user=$request->DeloyUser;
        $instance->Status=$request->Status;
        $instance->created_at=new DateTime();
        $instance->save();
        // echo $request->Name;
        // echo $request->DatabaseName;
        // echo $request->DomainName;
        // echo $request->DeloyUser;
        // echo $request->Status;
        // echo $request->Version;

        return redirect('admin/instance/add')->with('note','Added successfully');
    }

    public function getEdit(){
        return view('admin.instance.edit');
    }
}
