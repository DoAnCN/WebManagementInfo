<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Host;

class HostController extends Controller
{
    //
    public function getList(){
        $host = Host::all();
        return view('admin.host.list',['host'=>$host]);
    }
    public function getAdd(){
        $host = Host::all();
        return view('admin.host.add',['host'=>$host]);
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

        $host = new Host;
        $host->Ten_Host=$request->Name;
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
        return view('admin.host.edit');
    }

}
