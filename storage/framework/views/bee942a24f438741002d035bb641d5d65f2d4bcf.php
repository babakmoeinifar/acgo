<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Bill')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('Bill')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(__('Bill')); ?></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between w-100">
                                <h4><?php echo e(__('Manage Bill')); ?></h4>
                                <div class="card-header-action">
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-icon icon-left btn-primary"><i class="fas fa-filter"></i><?php echo e(__('Filter')); ?></a>
                                        <div class="dropdown-menu dropdown-list dropdown-menu-right Filter-dropdown w-64">
                                            <?php if(!\Auth::guard('vender')->check()): ?>
                                                <?php echo e(Form::open(array('route' => array('bill.index'),'method' => 'GET'))); ?>

                                            <?php else: ?>
                                                <?php echo e(Form::open(array('route' => array('vender.bill'),'method' => 'GET'))); ?>

                                            <?php endif; ?>
                                            <?php if(!\Auth::guard('vender')->check()): ?>
                                                <div class="form-group">
                                                    <?php echo e(Form::label('vender', __('Vender'))); ?>

                                                    <?php echo e(Form::select('vender',$vender,isset($_GET['vender'])?$_GET['vender']:'', array('class' => 'form-control font-style selectric'))); ?>

                                                </div>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <?php echo e(Form::label('bill_date', __('Date'))); ?>

                                                <?php echo e(Form::text('bill_date', isset($_GET['bill_date'])?$_GET['bill_date']:null, array('class' => 'form-control datepicker-range'))); ?>

                                            </div>
                                            <div class="form-group">
                                                <?php echo e(Form::label('status', __('Status'))); ?>

                                                <?php echo e(Form::select('status', [''=>'All'] + $status,isset($_GET['status'])?$_GET['status']:'', array('class' => 'form-control font-style selectric'))); ?>

                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary"><?php echo e(__('Search')); ?></button>
                                                <?php if(!\Auth::guard('vender')->check()): ?>
                                                    <a href="<?php echo e(route('bill.index')); ?>" class="btn btn-danger"><?php echo e(__('Reset')); ?></a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('vender.bill')); ?>" class="btn btn-danger"><?php echo e(__('Reset')); ?></a>
                                                <?php endif; ?>

                                            </div>
                                            <?php echo e(Form::close()); ?>

                                        </div>
                                    </div>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create bill')): ?>
                                        <a href="<?php echo e(route('bill.create')); ?>" class="btn btn-icon icon-left btn-primary">
                                            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                            <span class="btn-inner--text"> <?php echo e(__('Create')); ?></span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush" id="dataTable">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th> <?php echo e(__('Bill')); ?></th>
                                                        <?php if(!\Auth::guard('vender')->check()): ?>
                                                            <th> <?php echo e(__('Vendor')); ?></th>
                                                        <?php endif; ?>
                                                        <th> <?php echo e(__('Category')); ?></th>
                                                        <th> <?php echo e(__('Bill Date')); ?></th>
                                                        <th> <?php echo e(__('Due Date')); ?></th>
                                                        <th><?php echo e(__('Status')); ?></th>
                                                        <?php if(Gate::check('edit bill') || Gate::check('delete bill') || Gate::check('show bill')): ?>
                                                            <th class="text-right"> <?php echo e(__('Action')); ?></th>
                                                        <?php endif; ?>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <?php $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class="font-style">
                                                            <td>
                                                                <?php if(\Auth::guard('vender')->check()): ?>
                                                                    <a class="btn btn-outline-primary" href="<?php echo e(route('vender.bill.show',$bill->id)); ?>"><?php echo e(AUth::user()->billNumberFormat($bill->bill_id)); ?>

                                                                    </a>
                                                                <?php else: ?>
                                                                    <a class="btn btn-outline-primary" href="<?php echo e(route('bill.show',$bill->id)); ?>"><?php echo e(AUth::user()->billNumberFormat($bill->bill_id)); ?>

                                                                    </a>
                                                                <?php endif; ?>
                                                            </td>
                                                            <?php if(!\Auth::guard('vender')->check()): ?>
                                                                <td> <?php echo e((!empty( $bill->vender)?$bill->vender->name:'')); ?> </td>
                                                            <?php endif; ?>
                                                            <td><?php echo e(!empty($bill->category)?$bill->category->name:''); ?></td>
                                                            <td><?php echo e(Auth::user()->dateFormat($bill->bill_date)); ?></td>
                                                            <td><?php echo e(Auth::user()->dateFormat($bill->due_date)); ?></td>
                                                            <td>
                                                                <?php if($bill->status == 0): ?>
                                                                    <span class="badge badge-primary"><?php echo e(__(\App\Invoice::$statues[$bill->status])); ?></span>
                                                                <?php elseif($bill->status == 1): ?>
                                                                    <span class="badge badge-warning"><?php echo e(__(\App\Invoice::$statues[$bill->status])); ?></span>
                                                                <?php elseif($bill->status == 2): ?>
                                                                    <span class="badge badge-danger"><?php echo e(__(\App\Invoice::$statues[$bill->status])); ?></span>
                                                                <?php elseif($bill->status == 3): ?>
                                                                    <span class="badge badge-info"><?php echo e(__(\App\Invoice::$statues[$bill->status])); ?></span>
                                                                <?php elseif($bill->status == 4): ?>
                                                                    <span class="badge badge-success"><?php echo e(__(\App\Invoice::$statues[$bill->status])); ?></span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <?php if(Gate::check('edit bill') || Gate::check('delete bill') || Gate::check('show bill')): ?>
                                                                <td class="action text-right">
                                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('duplicate bill')): ?>
                                                                        <a href="#" class="btn btn-success btn-action mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Duplicate')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="You want to confirm this action. Press Yes to continue or Cancel to go back" data-confirm-yes="document.getElementById('duplicate-form-<?php echo e($bill->id); ?>').submit();">
                                                                            <i class="fas fa-copy"></i>
                                                                            <?php echo Form::open(['method' => 'get', 'route' => ['bill.duplicate', $bill->id],'id'=>'duplicate-form-'.$bill->id]); ?>

                                                                            <?php echo Form::close(); ?>

                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show bill')): ?>
                                                                        <?php if(\Auth::guard('vender')->check()): ?>
                                                                            <a href="<?php echo e(route('vender.bill.show',$bill->id)); ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Detail')); ?>">
                                                                                <i class="fas fa-eye"></i>
                                                                            </a>
                                                                        <?php else: ?>
                                                                            <a href="<?php echo e(route('bill.show',$bill->id)); ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Detail')); ?>">
                                                                                <i class="fas fa-eye"></i>
                                                                            </a>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit bill')): ?>
                                                                        <a href="<?php echo e(route('bill.edit',$bill->id)); ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                    <?php endif; ?>
                                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete bill')): ?>
                                                                        <a href="#!" class="btn btn-danger btn-action " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($bill->id); ?>').submit();">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['bill.destroy', $bill->id],'id'=>'delete-form-'.$bill->id]); ?>

                                                                        <?php echo Form::close(); ?>

                                                                    <?php endif; ?>
                                                                </td>
                                                            <?php endif; ?>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/accgo/resources/views/bill/index.blade.php ENDPATH**/ ?>