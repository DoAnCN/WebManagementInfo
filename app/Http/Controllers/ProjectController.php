<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

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
        // $this->validate($request,
        // [
        //     'Name' => 'required|min:3|max:100'
        // ],
        // [
        //     'Name.required' => 'You must fill the Name',
        //     'Name.min' => 'The Instance name must be have at least 3 letter and max 100 letter',
        //     'Name.max' => 'The Instance name must be have at least 3 letter and max 100 letter',
        // ]);

        $project = new Project;
        $project->Ten_project=$request->NameProject;
        $instance->Url_remote=$request->URL;
        $instance->created_at=new DateTime();
        $instance->save();
        // echo $request->Name;
        // echo $request->DatabaseName;
        // echo $request->DomainName;
        // echo $request->DeloyUser;
        // echo $request->Status;
        // echo $request->Version;

        return redirect('admin/project/add')->with('note','Added successfully');
    }

    public function getEdit(){
        return view('admin.project.edit');
    }
}
