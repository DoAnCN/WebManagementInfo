<?php $__env->startSection('content'); ?> 
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
            <?php if(count($errors)>0): ?>
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($err); ?><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <?php if(session('note')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('note')); ?>

                </div>
            <?php endif; ?>

                <form action="admin/instance/add" method="POST">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="form-group">
                        <label>Instance Name</label>
                        <input class="form-control" name="Name" placeholder="Please Enter Instance Name" />
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
                        <input class="form-control" name="DeloyUser" placeholder="Please Enter Deloy User" />
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input class="form-control" name="Status" placeholder="Please Enter Status" />
                    </div>
                    <div class="form-group">
                        <label>Version</label>
                        <input class="form-control" name="Version" placeholder="Please Enter Version" /> 
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

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>