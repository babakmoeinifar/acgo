<?php echo e(Form::open(array('route' => array('store.language')))); ?>

<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('code', __('Language Code'))); ?>

        <?php echo e(Form::text('code', '', array('class' => 'form-control','required'=>'required'))); ?>

        <?php if ($errors->has('code')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('code'); ?>
        <span class="invalid-code" role="alert">
            <strong class="text-danger"><?php echo e($message); ?></strong>
        </span>
        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

</div>
<?php echo e(Form::close()); ?>


<?php /**PATH /var/www/accgo/resources/views/lang/create.blade.php ENDPATH**/ ?>