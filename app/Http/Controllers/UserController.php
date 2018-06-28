<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DateTime;
 
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
        ],[
            'UserName.required' => 'Please type the User Name',
            'UserName.min' => 'User Name must have at least 3 letter',

            'UserPassword.required'=> 'Please type the password',
            'UserPassword.min'=> 'Password must have at least 3 letter',
            'UserPassword.max'=> 'Password must have at max 32 letter',

            'UserPasswordAgain.required'=>'Please type password again',
            'UserPasswordAgain.same'=>'Please type the password correct'
        ]);
       $user = new User;
       $user->username= $request->UserName;
       $user->password= bcrypt($request->UserPassword);
       $user->level= $request->UserLevel;
       $user->save();

       return redirect('admin/user/add')->with('note','Add Susscessful'); 
        // echo $request->UserName;
        // echo $request->UserPassword;
        // echo $request->UserLevel;

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
       $user->username= $request->UserName;
       $user->level= $request->UserLevel;

       if($request->changePassword == "on")
       {
          $this->validate($request,[
            'UserPassword'=>'required | min:3 |max:32',
            'UserPasswordAgain'=>'required | same:UserPassword'
        ],[
            'UserPassword.required'=> 'Please type the password',
            'UserPassword.min'=> 'Password must have at least 3 letter',
            'UserPassword.max'=> 'Password must have at max 32 letter',

            'UserPasswordAgain.required'=>'Please type password again',
            'UserPasswordAgain.same'=>'Please type the password correct'
        ]);
       }
       $user->password= bcrypt($request->UserPassword);
       $user->save();

       return redirect('admin/user/edit/'.$id)->with('note','Edit Successfully');
    }

    public function getDelete($id){
      $user = User::find($id);
      $user ->delete();
      return redirect('admin/user/list/')->with('note','Delete Successfully');
    }

    public function getLoginAdmin(){
      return view('admin.login');
    }

    public function postLoginAdmin(Request $request){
      $this->validate($request,[
        'UserName'=>'required',
        'UserPassword'=>'required | min:3 | max:32'
        ],[
        'UserName.required'=>'Please type the UserName',
        'UserPassword.required'=>'Please type the Password',
        'UserPassword.min'=> 'Password must have at least 3 letter',
        'UserPassword.max'=> 'Password must have at max 32 letter',
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
        'username'=>$request->UserName,
        'password'=>$request->UserPassword,
      ];
      if(Auth::attempt($data)){
        return redirect('admin/instance/list'); 
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
