<?php
    $profile=asset(Storage::url('avatar/'));
?>
<?php $__env->startPush('script-page'); ?>
    <script>

        $(document).on('click', '#billing_data', function () {
            $("[name='shipping_name']").val($("[name='billing_name']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_phone']").val($("[name='billing_phone']").val());
            $("[name='shipping_zip']").val($("[name='billing_zip']").val());
            $("[name='shipping_address']").val($("[name='billing_address']").val());
        })
        $(document).on('click', '#vend_detail', function () {
            $('#cust_table').addClass('col-6').removeClass('col-12')
            $('#customer_details').removeClass('d-none');
            $('#customer_details').addClass('d-block');
            var id = $(this).data('id');
            var url = $(this).data('url');
            $.ajax({
                url: url,
                type: 'GET',
                cache: false,
                success: function (data) {
                    $('#customer_details').html(data);
                },

            });
        });

        $(document).ready(function () {
            $('.commonModal').click(function () {
                $('#commonModal').modal({
                    backdrop: 'static'
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Vendor')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('Vendor')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(__('Vendor')); ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <h4><?php echo e(__('Manage Vendor')); ?></h4>
                            <div class="card-header-action">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create vender')): ?>
                                    <a href="#" data-size="2xl" data-url="<?php echo e(route('vender.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Vendor')); ?>" class="btn btn-icon icon-left btn-primary commonModal">
                                        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                        <span class="btn-inner--text"> <?php echo e(__('Create')); ?></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12" id="cust_table">
                                <table class="table table-flush" id="dataTable">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th> <?php echo e(__('Name')); ?></th>
                                        <th> <?php echo e(__('Contact')); ?></th>
                                        <th> <?php echo e(__('Email')); ?></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $venders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$Vender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="cust_tr" id="vend_detail" data-url="<?php echo e(route('vender.show',$Vender['id'])); ?>" data-id="<?php echo e($Vender['id']); ?>">
                                            <td><a href="#" class="btn btn-outline-primary"> <?php echo e(AUth::user()->venderNumberFormat($Vender['vender_id'])); ?></a></td>
                                            <td><?php echo e($Vender['name']); ?></td>
                                            <td><?php echo e($Vender['contact']); ?></td>
                                            <td><?php echo e($Vender['email']); ?></td>
                                            <td>
                                                <?php if($Vender['is_active']==0): ?>
                                                    <i class="fa fa-lock" title="Inactive"></i>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 d-none" id="customer_details">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/accgo/resources/views/vender/index.blade.php ENDPATH**/ ?>