@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>{{$user->username}}</small>
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
                        <label>User Name</label>
                        <input class="form-control" name="UserName" placeholder="Please Enter User Name" value="{{$user->username}}" />
                    </div>
                     <div class="form-group">
                        <input type="checkbox" id="changePassword" name="ChangePassword">
                        <label>Change Password</label>
                        <input type="password" class="form-control password" name="UserPassword" placeholder="Please Enter Password" disabled="" />
                    </div>
                    <div class="form-group">
                        <label>Type Password Again</label>
                        <input type="password" class="form-control password" name="UserPasswordAgain" placeholder="Please Enter Password Again" disabled="" />
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <label class="radio-inline">
                            <input name="UserLevel" value="0" 
                            @if($user->level == 0)
                            {{"check"}}
                            @endif
                            type="radio">User
                        </label>
                        <label class="radio-inline">
                            <input name="UserLevel" value="1" 
                            @if($user->level == 1)
                            {{"check"}}
                            @endif
                            type="radio">Admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">User Edit</button>
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


@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            }); 
        }); 
    </script>
@endsection