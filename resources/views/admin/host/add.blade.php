@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Host
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('postAddHost')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                    <div class="form-group">
                        <label>Host Name</label>
                        <input class="form-control" name="HostName" placeholder="Please Enter Host Name" />
                    </div>
                    <div class="form-group">
                        <labe>IP</label>
                        <input class="form-control" name="IpHost" placeholder="Please Enter IP" /> 
                    </div>
                    <div class="form-group">
                        <label>Port</label>
                        <input class="form-control" name="PortHost" type="number" value="22" placeholder="Please Enter Port" />
                    </div>
                    <div class="form-group">
                        <label>System Operating</label>
                        <input class="form-control" name="OSHost" placeholder="Please Enter System Operating" />
                    </div>
                    <div class="form-group">
                        <label>Number of Instance</label>
                        <input class="form-control" name="NumInst" type="number" disabled="disabled" placeholder="Please Enter Number of Instance" />
                    </div>
                    <button type="submit" class="btn btn-default">Category Add</button>
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
