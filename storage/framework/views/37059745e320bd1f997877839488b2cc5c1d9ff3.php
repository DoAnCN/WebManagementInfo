<?php $__env->startSection('content'); ?>
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
                    <?php $__currentLoopData = $instance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo e($ma->id); ?></td>
                        <td><?php echo e($ma->Ten_instance); ?></td>
                        <td><?php echo e($ma->Ten_database); ?></td>
                        <td><?php echo e($ma->Domain); ?></td>
                        <td><?php echo e($ma->Version); ?></td>
                        <td><?php echo e($ma->Deloy_user); ?></td>
                        <td><?php echo e($ma->Status); ?></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/instance/delete/<?php echo e($ma->id); ?>"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/instance/edit/<?php echo e($ma->id); ?>">Edit</a></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>