<?php $__env->startSection('content'); ?>
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
                    <?php $__currentLoopData = $host; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo e($ho->id); ?></td>
                        <td><?php echo e($ho->name); ?></td>
                        <td><?php echo e($ho->IP); ?></td>
                        <td><?php echo e($ho->Port); ?></td>
                        <td><?php echo e($ho->HDH); ?></td>
                        <td><?php echo e($ho->Soluong_instance); ?></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/host/delete/<?php echo e($ho->id); ?>"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/host/edit/<?php echo e($ho->id); ?>">Edit</a></td>
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