<?php echo e(Form::open(array('url' => 'coupons','method' =>'post'))); ?>

<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('name',__('Name'))); ?>

        <?php echo e(Form::text('name',null,array('class'=>'form-control font-style','required'=>'required'))); ?>

    </div>

    <div class="form-group col-md-6">
        <?php echo e(Form::label('discount',__('Discount'))); ?>

        <?php echo e(Form::number('discount',null,array('class'=>'form-control','required'=>'required','step'=>'0.01'))); ?>

        <span class="small"><?php echo e(__('Note: Discount in Percentage')); ?></span>
    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('limit',__('Limit'))); ?>

        <?php echo e(Form::number('limit',null,array('class'=>'form-control','required'=>'required'))); ?>

    </div>

    <div class="form-group col-md-12">
        <?php echo e(Form::label('code',__('Code'))); ?>

        <div class="selectgroup selectgroup-pills">
            <label class="selectgroup-item">
                <input type="radio" name="icon-input" value="manual" class="selectgroup-input code" checked="checked">
                <span class="selectgroup-button selectgroup-button-icon"><?php echo e(__('Manual')); ?></span>
            </label>
            <label class="selectgroup-item">
                <input type="radio" name="icon-input" value="auto" class="selectgroup-input code">
                <span class="selectgroup-button selectgroup-button-icon"><?php echo e(__('Auto Generate')); ?></span>
            </label>
        </div>
    </div>
    <div class="form-group col-md-12 d-block" id="manual">
        <input class="form-control font-uppercase" name="manualCode" type="text">
    </div>
    <div class="form-group col-md-12 d-none" id="auto">
        <div class="row">
            <div class="col-md-10">
                <input class="form-control" name="autoCode" type="text" id="auto-code">
            </div>
            <div class="col-md-2">
                <a href="#" class="btn btn-primary" id="code-generate"><i class="fas fa-history"></i></a>
            </div>
        </div>
    </div>
    <div class="form-group col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
        <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>


<?php /**PATH /var/www/accgo/resources/views/coupon/create.blade.php ENDPATH**/ ?>