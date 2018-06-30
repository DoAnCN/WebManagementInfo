@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Host
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
                        <th>ID</th>
                        <th>Host Name</th>
                        <th>IP</th>
                        <th>Port</th>
                        <th>System Operating</th>
                        <th>Number of Instance</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($host as $ho)
                    <tr class="odd gradeX" align="center">
                        <td>{{$ho->id}}</td>
                        <td>{{$ho->name}}</td>
                        <td>{{$ho->ip}}</td>
                        <td>{{$ho->port}}</td>
                        <td>{{$ho->os}}</td>
                        <td>{{$ho->num_inst}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/host/delete/{{$ho->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/host/edit/{{$ho->id}}">Edit</a></td>
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