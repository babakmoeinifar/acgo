<?php echo e(Form::open(array('url'=>'roles','method'=>'post'))); ?>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Name'))); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Role Name')))); ?>

            <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
            <span class="invalid-name" role="alert">
                    <strong class="text-danger"><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php if(!empty($permissions)): ?>
                <h6><?php echo e(__('Assign Permission to Roles')); ?> </h6>
                <table class="table table-striped mb-0" id="dataTable-1">
                    <thead>
                    <tr>
                        <th><?php echo e(__('Module')); ?> </th>
                        <th><?php echo e(__('Permissions')); ?> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $modules=['account','user','role','proposal','invoice','bill','revenue','payment','proposal product','invoice product','bill product','goal','credit note','debit note','bank account','transfer','transaction','product & service','customer','vender','plan','constant tax','constant category','constant unit','constant payment method','constant custom field','company settings','assets','report'];
                       if(Auth::user()->type == 'super admin'){
                           $modules[] = 'language';
                           $modules[] = 'permission';
                       }
                    ?>
                    <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(ucfirst($module)); ?></td>
                            <td>
                                <div class="row ">
                                    <?php if(in_array('manage '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('manage '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Manage',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(in_array('create '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('create '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Create',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(in_array('edit '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('edit '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Edit',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(in_array('delete '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('delete '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Delete',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(in_array('show '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('show '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Show',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if(in_array('change password '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('change password '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Change Password',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(in_array('buy '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('buy '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Buy',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(in_array('send '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('send '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Send',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if(in_array('create payment '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('create payment '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Create Payment',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(in_array('delete payment '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('delete payment '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Delete Payment',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(in_array('income '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('income '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Income',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(in_array('expense '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('expense '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Expense',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(in_array('income vs expense '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('income vs expense '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Income VS Expense',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(in_array('loss & profit '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('loss & profit '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Loss & Profit',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(in_array('tax '.$module,(array) $permissions)): ?>
                                        <?php if($key = array_search('tax '.$module,$permissions)): ?>
                                            <div class="col-md-3 custom-control custom-checkbox">
                                                <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                <?php echo e(Form::label('permission'.$key,'Tax',['class'=>'custom-control-label'])); ?><br>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                        <?php if(in_array('duplicate '.$module,(array) $permissions)): ?>
                                            <?php if($key = array_search('duplicate '.$module,$permissions)): ?>
                                                <div class="col-md-3 custom-control custom-checkbox">
                                                    <?php echo e(Form::checkbox('permissions[]',$key,false, ['class'=>'custom-control-input','id' =>'permission'.$key])); ?>

                                                    <?php echo e(Form::label('permission'.$key,'Duplicate',['class'=>'custom-control-label'])); ?><br>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
        <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /var/www/accgo/resources/views/role/create.blade.php ENDPATH**/ ?>