@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>{{$user->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif

            @if(session('note'))
                <div class="alert alert-success">
                    {{session('note')}}
                </div>
            @endif 
                <form action="admin/user/edit/{{$user->id}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="Email" placeholder="Please Enter Email" value="{{$user->email}}" />
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input class="form-control" name="UserName" placeholder="Please Enter User Name" value="{{$user->user_name}}" />
                    </div>
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" class="form-control password" name="OldPassword" placeholder="Please Enter Password"/>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control password" name="NewPassword" placeholder="Please Enter New Password"/>
                    </div>
                    <div class="form-group">
                        <label>Retype New Password</label>
                        <input type="password" class="form-control password" name="RePassword" placeholder="Please Enter Password Again"/>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <label class="radio-inline">
                            <input name="UserRole" value="0" 
                            @if($user->role == 0)
                            {{"check"}}
                            @endif
                            type="radio">Member
                        </label>
                        <label class="radio-inline">
                            <input name="UserRole" value="1" 
                            @if($user->role == 1)
                            {{"check"}}
                            @endif
                            type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Save</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection 
