<?php
    $logo=asset(Storage::url('logo/'));

?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pt-4">
                    <div class="changeLanguage float-right mr-1 position-relative">
                        <select name="language" id="language" class="form-control w-25 position-absolute selectric" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <?php $__currentLoopData = Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($lang == $language): ?> selected <?php endif; ?> value="<?php echo e(route('login',$language)); ?>"><?php echo e(Str::upper($language)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img class="img-fluid logo-img" src="<?php echo e($logo.'/logo.png'); ?>" alt="image">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>ورود کاربر</h4>
                        </div>
                        <div class="col-12 text-right">
                            <a href="<?php echo e(route('customer.login')); ?>" class="btn btn-secondary">ورود مشتری</a>
                            <a href="<?php echo e(route('vender.login')); ?>" class="btn btn-secondary m-">ورود خریدار</a>
                        </div>
                        <div class="card-body">
                            <?php echo e(Form::open(array('route'=>'login','method'=>'post','id'=>'loginForm','class'=> 'login-form' ))); ?>

                            <div class="form-group">
                                <?php echo e(Form::label('email','ایمیل')); ?>

                                <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>'ایمیل خود را وارد نمایید'))); ?>

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

                            <div class="form-group">
                                <div class="d-block">
                                    <?php echo e(Form::label('password','رمز عبور')); ?>

                                    <?php echo e(Form::password('password',array('class'=>'form-control','placeholder'=>'رمز عبور را وارد نمایید'))); ?>

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
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="remember">مرا به یاد داشته باش</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo e(Form::submit('ورود',array('class'=>'btn btn-primary btn-lg btn-block','id'=>'saveBtn'))); ?>

                            </div>
                            <?php echo e(Form::close()); ?>

                            <div class="text-center mt-4 mb-3">
                                <?php if(Route::has('password.request')): ?>
                                    <a href="<?php echo e(route('password.request')); ?>">
                                        فراموشی رمز عبور
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        حساب کاربری ندارید؟ <a href="<?php echo e(route('register')); ?>">ثبت نام</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/accgo/resources/views/auth/login.blade.php ENDPATH**/ ?>