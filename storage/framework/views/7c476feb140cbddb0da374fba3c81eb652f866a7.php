<?php echo e(Form::model($unit, array('route' => array('product-unit.update', $unit->id), 'method' => 'PUT'))); ?>

<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('name', __('Unit Name'))); ?>

        <?php echo e(Form::text('name', null, array('class' => 'form-control font-style','required'=>'required'))); ?>

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
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
        <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-primary'))); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /var/www/accgo/resources/views/productServiceUnit/edit.blade.php ENDPATH**/ ?>