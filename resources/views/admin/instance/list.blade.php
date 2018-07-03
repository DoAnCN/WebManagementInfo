@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Instance
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>No.</th>
                        <th>Name</th>
                        <th>Project</th>
                        <th>Version</th>
                        <th>Database Name</th>
                        <th>Domain</th>
                        <th>Host</th>
                        <th>Deloy User</th>
                        <th>Status</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instance as $inst)
                    <tr class="odd gradeX" align="center">
                        <th>{{$inst->id}}</th>
                        <td>{{$inst->inst_name}}</td>
                        <td>{{$inst->proj_name}}</td>
                        <td>{{$inst->version}}</td>
                        <td>{{$inst->db_name}}</td>
                        <td>{{$inst->domain}}</td>
                        <td>{{$inst->host_name}}</td>
                        <td>{{$inst->user_deployed}}</td>
                        <td>{{$inst->status}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/instance/delete/{{$inst->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/instance/edit/{{$inst->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection