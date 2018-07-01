@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
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
                <form action="{{route("postAddUser")}}" method="POST"> <!-- admin/user/add-->
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>User Name</label>
                        <input class="form-control" name="UserName" placeholder="Please Enter User Name" />
                    </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="UserPassword" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>Type Password Again</label>
                        <input type="password" class="form-control" name="UserPasswordAgain" placeholder="Please Enter Password Again" />
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <label class="radio-inline">
                            <input name="UserRole" value="0" checked="" type="radio">Member
                        </label>
                        <label class="radio-inline">
                            <input name="UserRole" value="1" type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">User Add</button>
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
