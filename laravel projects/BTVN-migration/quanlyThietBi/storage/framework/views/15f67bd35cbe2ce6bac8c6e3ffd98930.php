

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mb-4">IT Centers and Devices</h1>

    <?php $__empty_1 = true; $__currentLoopData = $itCenters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $center): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="card mb-3">
        <div class="card-header">
            <h2><?php echo e($center->name); ?></h2>
            <p><?php echo e($center->location); ?></p>
        </div>
        <div class="card-body">
            <h4>Devices:</h4>

            <!-- Nút thêm thiết bị mới -->
            <a href="<?php echo e(route('devices.create')); ?>" class="btn btn-primary mb-3">Add New Device</a>

            <?php if($center->devices->isEmpty()): ?>
            <p>No devices available in this center.</p>
            <?php else: ?>
            <ul>
                <?php $__currentLoopData = $center->devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <?php echo e($device->device_name); ?> (<?php echo e($device->type); ?>) -
                    <?php if($device->status): ?>
                    <span class="text-success">Active</span>
                    <?php else: ?>
                    <span class="text-danger">Inactive</span>
                    <?php endif; ?>

                    <!-- Nút sửa thiết bị -->
                    <a href="<?php echo e(route('devices.edit', $device)); ?>" class="btn btn-warning btn-sm ml-2">Edit</a>

                    <!-- Nút xóa thiết bị -->
                    <form action="<?php echo e(route('devices.destroy', $device)); ?>" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Are you sure you want to delete this device?')">Delete</button>
                    </form>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <p>No IT Centers available.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CongNgheWeb\laravel projects\BTVN-ThucHanh03\QuanLyThietBi\resources\views/devices/index.blade.php ENDPATH**/ ?>