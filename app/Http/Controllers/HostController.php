<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Host;
use App\Instance;
use DateTime;

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
    }

    public function postAdd(Request $request){
        $this->validate($request,
        [ 
            'HostName' => 'required',
            'IpHost' => 'required',
            'PortHost' => 'required'
        ]);

        $host = new Host;
        $host->host_name=$request->HostName;
        $host->ip=$request->IpHost;
        $host->port=$request->PortHost;
        $host->os=$request->OSHost;
        $num_inst = Instance::groupBy('id_host')->where('id_host',$host->id)->count();      
        $host->num_inst=$num_inst;
        $host->save();

        return redirect('admin/host/list')->with('note','Added successfully');
    }

    public function getEdit($id){
        $host = Host::find($id);
       return view('admin.host.edit',['host'=>$host]);
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'HostName'=>'required | min:3'
        ],[
            'HostName.required' => 'Please type the User Name',
            'HostName.min' => 'User Name must have at least 3 letter',
            'HostName.max' => 'Project Name have max 32 letter'
        ]);

       $host = Host::find($id);
       $host->host_name= $request->HostName;
       $host->ip= $request->IP;
       $host->port= $request->Port;
       $host->os= $request->OS;
       $host->num_inst= $request->NumberInstance;
       $host->save();

       return redirect('admin/host/edit/'.$id)->with('note','Edit Successfully');
    }

    public function getDelete($id){
      $host = Host::find($id);
      $host ->delete();
      return redirect('admin/host/list/')->with('note','Delete Successfully');
    }

}
