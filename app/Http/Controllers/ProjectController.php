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
            'NameProject' => 'required|min:3|max:100'
        ],
        [
            'NameProject.required' => 'You must fill the Name',
            'NameProject.min' => 'The Instance name must be have at least 3 letter and max 100 letter',
            'NameProject.max' => 'The Instance name must be have at least 3 letter and max 100 letter',
        ]);

        $project = new Project;
        $project->Ten_project=$request->NameProject;
        $project->Url_remote=$request->URL;
        $project->created_at=new DateTime();
        $project->save();
        // echo $request->Name;
        // echo $request->DatabaseName;
        // echo $request->DomainName;
        // echo $request->DeloyUser;
        // echo $request->Status;
        // echo $request->Version;

        return redirect('admin/project/add')->with('note','Added successfully');
    }

    public function getEdit($id){
        $project = Project::find($id);
       return view('admin.project.edit',['project'=>$project]);
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'NameProject'=>'required | min:3'
        ],[
            'NameProject.required' => 'Please type the User Name',
            'NameProject.min' => 'User Name must have at least 3 letter',
            'NameProject.max' => 'Project Name have max 32 letter'
        ]);

       $project = Project::find($id);
       $project->Ten_project= $request->NameProject;
       $project->Url_remote= $request->URL;
       $project->save();

       return redirect('admin/project/edit/'.$id)->with('note','Edit Successfully');
    }

    public function getDelete($id){
      $project = Project::find($id);
      $project ->delete();
      return redirect('admin/project/list/')->with('note','Delete Successfully');
    }
}
