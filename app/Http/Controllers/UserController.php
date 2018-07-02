<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DateTime;
use Hash;
 
class UserController extends Controller
{
    //
    public function getList(){
        $user = User::all();
        return view('admin.user.list',['user'=>$user]);
    }

    public function getAdd(){
        $user =User::all();
        return view('admin.user.add',['user'=>$user]); 
    }

    public function postAdd(Request $request){  
       $this->validate($request,[
            'UserName'=>'required | min:3',
            'UserPassword'=>'required | min:3 |max:32',
            'UserPasswordAgain'=>'required | same:UserPassword'
        ]);
       $user = new User;
       $user->username= $request->UserName;
       $user->password= bcrypt($request->UserPassword);
       $user->role= $request->UserRole;
       $user->save();

       return redirect('admin/user/add')->with('note','Add Susscessful'); 
    }

    public function getEdit($id){
      $user = User::find($id);
       return view('admin.user.edit',['user'=>$user]);
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'UserName'=>'required | min:3'
        ],[
            'UserName.required' => 'Please type the User Name',
            'UserName.min' => 'User Name must have at least 3 letter'
        ]);

       $user = User::find($id);
       $user->name= $request->UserName;
       $user->role= $request->UserRole;
       $this->validate($request,[
            'OldPassword'=>'required | min:3'
          ],[
            'OldPassword.request'=>'Please type the password correct'
          ]);
       if (Hash::check($request->OldPassword,$user->password)){
          $this->validate($request,[
            'NewPassword'=>'required | min:3 |max:32',
            'RePassword'=>'required | same:NewPassword'
          ],[
            'RePassword.required'=>'Please type password again',
            'RePassword.same'=>'Please retype the same password'
          ]);
          $user->password= bcrypt($request->NewPassword);
          $user->save();
          return redirect('admin/user/edit/'.$id)->with('note','Edit Successfully');
        }else{
          return redirect('admin/user/edit/'.$id)->with('note', 'Edit Failed - Password Uncorrect');
        }
    }

    public function getDelete($id){
      $user = User::find($id);
      $user ->delete();
      return redirect('admin/user/list/')->with('note','Delete Successfully');
    }

    public function getLoginAdmin(){
      if(Auth::check()){
      return redirect()->route('list');
    }
      return view('admin.login');
    }

    public function postLoginAdmin(Request $request){
      // dd($request);
      $this->validate($request,[
        'email'=>'required|email',
        'password'=>'required | min:6 | max:32'
        ]);

      // if(Auth::attemp(['username'=>$request->UserName, 'password'=>$request->UserPassword]))
      // {
      //   return redirect('admin/instance/list'); 
      // }
      // else
      // {
      //   return redirect('admin/login')->with('note','Fail to login');
      // }
      $data=[
        'email'=>$request->email,
        'password'=>$request->password,
      ];
      if(Auth::attempt($data)){
        return redirect()->route('list'); 
      }else{
         return redirect('admin/login')->with('note','Fail to login');
      }
    }

    function getLogoutAdmin()
    {
      Auth::logout();
      return redirect('admin/login');
    }
}
