<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Payment')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('Payment')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(route('customer.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(__('Payment')); ?></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between w-100">
                                <h4><?php echo e(__('Manage Payment')); ?></h4>
                                <div class="card-header-action">
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-icon icon-left btn-primary"><i class="fas fa-filter"></i><?php echo e(__('Filter')); ?></a>
                                        <div class="dropdown-menu dropdown-list dropdown-menu-right Filter-dropdown w-64">
                                            <?php echo e(Form::open(array('route' => array('customer.payment'),'method' => 'GET'))); ?>


                                            <div class="form-group">
                                                <?php echo e(Form::label('date', __('Date'))); ?>

                                                <?php echo e(Form::text('date', isset($_GET['date'])?$_GET['date']:null, array('class' => 'form-control datepicker-range'))); ?>

                                            </div>
                                            <div class="form-group">
                                                <?php echo e(Form::label('category', __('Category'))); ?>

                                                <?php echo e(Form::select('category',  [''=>'All']+$category,isset($_GET['category'])?$_GET['category']:'', array('class' => 'form-control font-style selectric'))); ?>

                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary"><?php echo e(__('Search')); ?></button>
                                                <a href="<?php echo e(route('customer.payment')); ?>" class="btn btn-danger"><?php echo e(__('Reset')); ?></a>
                                            </div>
                                            <?php echo e(Form::close()); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush font-style" id="dataTable">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th> <?php echo e(__('Date')); ?></th>
                                                        <th> <?php echo e(__('Amount')); ?></th>
                                                        <th> <?php echo e(__('Category')); ?></th>
                                                        <th> <?php echo e(__('Payment Method')); ?></th>
                                                        <th> <?php echo e(__('Description')); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <tr>
                                                            <td><?php echo e(Auth::user()->dateFormat($payment->date)); ?></td>
                                                            <td><?php echo e(Auth::user()->priceFormat($payment->amount)); ?></td>
                                                            <td><?php echo e($payment->category); ?></td>
                                                            <td><?php echo e(!empty( $payment->payment)? (!empty($payment->payment->paymentMethod)?$payment->payment->paymentMethod->name:''):''); ?></td>
                                                            <td><?php echo e($payment->description); ?></td>
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
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/accgo/resources/views/customer/payment.blade.php ENDPATH**/ ?>