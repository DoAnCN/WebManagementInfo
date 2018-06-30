@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>{{$instance->Ten_instance}}</small>
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
                <form action="admin/instance/edit/{{$instance->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Instance Name</label>
                        <input class="form-control" name="NameInstance" placeholder="Please Enter Instance Name" value="{{$instance->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Database Name</label>
                        <input class="form-control" name="DatabaseName" placeholder="Please Enter Database Name" value="{{$instance->db_name}}" />
                    </div>
                    <div class="form-group">
                        <label>Domain</label>
                        <input class="form-control" name="DomainName" placeholder="Please Enter Domain" value="{{$instance->domain}}" />
                    </div>
                    <div class="form-group">
                        <label>Deloy User</label>
                        <input class="form-control" name="DeloyUser" placeholder="Please Enter Deloy User" value="{{$instance->user_deployed}}" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input class="form-control" name="Status" placeholder="Please Enter Status" value="{{$instance->status}}" />
                    </div>
                    <div class="form-group">
                        <label>Version</label>
                        <input class="form-control" name="Version" placeholder="Please Enter Version" value="{{$instance->version}}" /> 
                    </div>
                    <!-- <div>
                        <select class="form-control" name="NameProject">
                        @foreach($project as $pro)
                            <option value="{{$pro->id}}">{{$pro->name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div>
                        <select class="form-control" name="NameHost">
                        @foreach($host as $ho)
                            <option value="{{$ho->id}}">{{$ho->name}}</option>
                        @endforeach
                        </select>
                    </div> -->
                    <!-- <div class="form-group">
                        <label>Category Status</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" checked="" type="radio">Visible
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="2" type="radio">Invisible
                        </label>
                    </div> -->
                    <button type="submit" class="btn btn-default">Insstance Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection 