<?php
    $logo=asset(Storage::url('logo/'));
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pt-4">
                    <div class="changeLanguage float-right mr-1 position-relative">
                        <select name="language" id="language" class="form-control w-25 position-absolute selectric" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <?php $__currentLoopData = Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($lang == $language): ?> selected <?php endif; ?> value="<?php echo e(route('register',$language)); ?>"><?php echo e(Str::upper($language)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 text-right">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img class="img-fluid logo-img" src="<?php echo e($logo.'/logo.png'); ?> " alt="">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>ثبت نام رایگان</h4></div>

                        <div class="card-body">
                            <?php echo e(Form::open(array('route'=>'register','method'=>'post','id'=>'loginForm'))); ?>

                            <div class="row">
                                <div class="form-group col-6">
                                    <?php echo e(Form::label('name','نام')); ?>

                                    <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Your Name')))); ?>

                                    <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                                    <span class="invalid-name text-danger" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                                <div class="form-group col-6">
                                    <?php echo e(Form::label('email','ایمیل')); ?>

                                    <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Your Email')))); ?>

                                    <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                    <span class="invalid-email text-danger" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <?php echo e(Form::label('password','رمز عبور')); ?>

                                    <?php echo e(Form::password('password',array('class'=>'form-control','placeholder'=>__('Enter Your Password')))); ?>

                                    <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                    <span class="invalid-password text-danger" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                                <div class="form-group col-6">
                                    <?php echo e(Form::label('password_confirmation','تکرار رمز عبور')); ?>

                                    <?php echo e(Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>__('Enter Your Password')))); ?>

                                    <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                    <span class="invalid-password_confirmation text-danger" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                    <label class="custom-control-label" for="agree">با مقررات سایت موافق هستم</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo e(Form::submit('ثبت عضویت',array('class'=>'btn btn-primary btn-lg btn-block','id'=>'saveBtn'))); ?>

                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        حساب دارید؟ <a href="<?php echo e(route('login')); ?>">ورود</a>
                    </div>
                    <div class="simple-footer">
                        <?php echo e((Utility::getValByName('footer_text')) ? Utility::getValByName('footer_text') :  __('Copyright AccountGo')); ?> <?php echo e(date('Y')); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/accgo/resources/views/auth/register.blade.php ENDPATH**/ ?>