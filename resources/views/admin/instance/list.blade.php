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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Database Name</th>
                        <th>Domain</th>
                        <th>Version</th>
                        <th>Deloy User</th>
                        <th>Status</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instance as $ma)
                    <tr class="odd gradeX" align="center">
                        <td>{{$ma->id}}</td>
                        <td>{{$ma->name}}</td>
                        <td>{{$ma->db_name}}</td>
                        <td>{{$ma->domain}}</td>
                        <td>{{$ma->verion}}</td>
                        <td>{{$ma->user_deployed}}</td>
                        <td>{{$ma->status}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/instance/delete/{{$ma->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/instance/edit/{{$ma->id}}">Edit</a></td>
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