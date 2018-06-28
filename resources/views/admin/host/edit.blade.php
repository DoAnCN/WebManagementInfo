@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>{{$host->Ten_host}}</small>
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
                <form action="admin/host/edit/{{$host->id}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Host Name</label>
                        <input class="form-control" name="HostName" placeholder="Please Enter Host Name" value="{{$host->Ten_host}}" />
                    </div>
                    <div class="form-group">
                        <labe>IP</label>
                        <input class="form-control" name="IP" placeholder="Please Enter IP" value="{{$host->IP}}"/>
                    </div>
                    <div class="form-group">
                        <label>Port</label>
                        <input class="form-control" name="Port" placeholder="Please Enter Port" value="{{$host->Port}}"/>
                    </div>
                    <div class="form-group">
                        <label>System Operating</label>
                        <input class="form-control" name="SO" placeholder="Please Enter System Operating" value="{{$host->HDH}}" />
                    </div>
                    <div class="form-group">
                        <label>Number of Instance</label>
                        <input class="form-control" name="NumberInstance" placeholder="Please Enter Number of Instance" value="{{$host->Soluong_instance}}" />
                    </div>
                    <button type="submit" class="btn btn-default">Edit Host</button>
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