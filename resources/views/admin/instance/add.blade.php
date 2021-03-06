@extends('admin.layout.index')

@section('content') 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Instance
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

                <form action="{{route('postAddInstance')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Instance Name</label>
                        <input class="form-control" name="NameInstance" placeholder="Please Enter Instance Name" />
                    </div>
                    <div class="form-group">
                        <label>Project</label>
                        <select class="form-control" name="Project">
                            <option value="" selected="selected"></option>
                            @foreach($project as $item)
                                <option value="{{$item->id}}">{{$item->proj_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Version</label>
                        <input class="form-control" name="Version" placeholder="Please Enter Version" /> 
                    </div>
                    <div class="form-group">
                        <label>Host</label>
                        <select class="form-control" name="Host">
                            <option value="" selected="selected"></option>
                            @foreach($host as $item)
                                <option value="{{$item->id}}">{{$item->host_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Database Name</label>
                        <input class="form-control" name="DatabaseName" placeholder="Please Enter Database Name" />
                    </div>
                    <div class="form-group">
                        <label>Domain</label>
                        <input class="form-control" name="DomainName" placeholder="Please Enter Domain" />
                    </div>
                    <div class="form-group">
                        <label>Deloy User</label>
                        <input class="form-control" name="DeloyUser" placeholder="User Deployed" disabled="disabled" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input class="form-control" name="Status" placeholder="Status" disabled="disabled"/>
                    </div>
                    
                   
                    <!-- <div class="form-group">
                        <label>Category Status</label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="1" checked="" type="radio">Visible
                        </label>
                        <label class="radio-inline">
                            <input name="rdoStatus" value="2" type="radio">Invisible
                        </label>
                    </div> -->
                    <button type="submit" class="btn btn-default">Category Add</button>
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
{{-- 
<script type="text/javascript">
    var content = new XMLHttpRequest();
    var method = "GET";
    var url = 
</script> --}}