<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '.code', function () {
            var type = $(this).val();
            if (type == 'manual') {
                $('#manual').removeClass('d-none');
                $('#manual').addClass('d-block');
                $('#auto').removeClass('d-block');
                $('#auto').addClass('d-none');
            } else {
                $('#auto').removeClass('d-none');
                $('#auto').addClass('d-block');
                $('#manual').removeClass('d-block');
                $('#manual').addClass('d-none');
            }
        });

        $(document).on('click', '#code-generate', function () {
            var length = 10;
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            $('#auto-code').val(result);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Coupon')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('Coupon')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(__('Coupon')); ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <h4><?php echo e(__('Manage Coupon')); ?></h4>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create coupon')): ?>
                                <a href="#" data-url="<?php echo e(route('coupons.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Coupon')); ?>" class="btn btn-icon icon-left btn-primary">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                    <span class="btn-inner--text"> <?php echo e(__('Create')); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body p-10">
                        <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-flush" id="dataTable">
                                            <thead class="thead-light">
                                            <tr>

                                                <th> <?php echo e(__('Name')); ?></th>
                                                <th> <?php echo e(__('Code')); ?></th>
                                                <th> <?php echo e(__('Discount (%)')); ?></th>
                                                <th> <?php echo e(__('Limit')); ?></th>
                                                <th> <?php echo e(__('Used')); ?></th>
                                                <th class="text-right"> <?php echo e(__('Action')); ?></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <tr class="font-style">
                                                    <td><?php echo e($coupon->name); ?></td>
                                                    <td><?php echo e($coupon->code); ?></td>
                                                    <td><?php echo e($coupon->discount); ?></td>
                                                    <td><?php echo e($coupon->limit); ?></td>
                                                    <td><?php echo e($coupon->used_coupon()); ?></td>
                                                    <td class="action text-right">

                                                        <a href="<?php echo e(route('coupons.show',$coupon->id)); ?>" class="btn btn-info btn-action mr-1">
                                                            <i class="fas fa-eye"></i>
                                                        </a>

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit coupon')): ?>
                                                            <a href="#!" class="btn btn-primary btn-action mr-1" data-url="<?php echo e(route('coupons.edit',$coupon->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Coupon')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete coupon')): ?>
                                                            <a href="#" class="btn btn-danger btn-action " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($coupon->id); ?>').submit();">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['coupons.destroy', $coupon->id],'id'=>'delete-form-'.$coupon->id]); ?>

                                                            <?php echo Form::close(); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/accgo/resources/views/coupon/index.blade.php ENDPATH**/ ?>