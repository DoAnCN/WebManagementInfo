<?php $__env->startSection('content'); ?> 
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Project
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" > 
                    <div class="form-group">
                        <label>Project Name</label>
                        <input class="form-control" name="NameProject" placeholder="Please Enter Project Name" />
                    </div>
                    <div class="form-group">
                        <label>Url Remote</label>
                        <input class="form-control" name="URL" placeholder="Please Enter Url Remote" />
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

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>