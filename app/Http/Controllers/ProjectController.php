<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use DateTime;
use App\Instance;

class ProjectController extends Controller
{
    //
    public function getList(){
        $project = Project::all();
        return view('admin.project.list',['project'=>$project]);
    }
    public function getAdd(){
        $project = Project::all();
        return view('admin.project.add',['project'=>$project]);
        // return view('admin.instance.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
        [
            'NameProject' => 'required',
            'URL' => 'required'
        ]);
        

        $project = new Project;
        $project->proj_name=$request->NameProject;
        $project->url_remote=$request->URL;
        $project->created_at=new DateTime();
        $project->save();
        // echo $request->Name;
        // echo $request->DatabaseName;
        // echo $request->DomainName;
        // echo $request->DeloyUser;
        // echo $request->Status;
        // echo $request->Version;

        return redirect('admin/project/list')->with('note','Added successfully');
    }

    public function getEdit($id){
        $project = Project::find($id);
       return view('admin.project.edit',['project'=>$project]);
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'NameProject'=>'required | min:3'
        ]);

       $project = Project::find($id);
       $project->proj_name= $request->NameProject;
       $project->url_remote= $request->URL;
       $project->save();

       return redirect('admin/project')->with('note','Edit Successfully');
    }

    public function getDelete($id){
      $project = Project::find($id);
      $project ->delete();
      return redirect('admin/project/list/')->with('note','Delete Successfully');
    }
}
