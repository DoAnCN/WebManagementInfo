<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Host;
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
        $host->Ten_host=$request->HostName;
        $host->IP=$request->IpHost;
        $host->Port=$request->PortHost;
        $host->HDH=$request->OSHost;
        $host->Soluong_instance=$request->NumInst;
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
       $host->Ten_host= $request->HostName;
       $host->IP= $request->IP;
       $host->Port= $request->Port;
       $host->HDH= $request->SO;
       $host->Soluong_instance= $request->NumberInstance;
       $host->save();

       return redirect('admin/host/edit/'.$id)->with('note','Edit Successfully');
    }

    public function getDelete($id){
      $host = Host::find($id);
      $host ->delete();
      return redirect('admin/host/list/')->with('note','Delete Successfully');
    }

}
