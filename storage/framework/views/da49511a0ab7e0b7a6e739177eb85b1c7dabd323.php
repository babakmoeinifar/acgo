<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo e((Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'AccountGo')); ?> - <?php echo $__env->yieldContent('page-title'); ?></title>
    <link rel="icon" href="<?php echo e(asset(Storage::url('logo')).'/favicon.png'); ?>" type="image" sizes="16x16">

    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/bootstrap/css/bootstrap.min.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/fontawesome/css/all.min.css')); ?> ">

    <link href="<?php echo e(asset('assets/modules/jquery-selectric/selectric.css')); ?>" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?> ">

</head>

<body>
<div id="app" style="text-align: right !important;">
    <?php echo $__env->yieldContent('content'); ?>
</div>

<!-- General JS Scripts -->
<script src="<?php echo e(asset('assets/modules/jquery.min.js')); ?> "></script>
<script src="<?php echo e(asset('assets/modules/popper.js')); ?> "></script>
<script src="<?php echo e(asset('assets/modules/tooltip.js')); ?> "></script>
<script src="<?php echo e(asset('assets/modules/bootstrap/js/bootstrap.min.js')); ?> "></script>
<script src="<?php echo e(asset('assets/modules/nicescroll/jquery.nicescroll.min.js')); ?> "></script>
<script src="<?php echo e(asset('assets/modules/moment.min.js')); ?> "></script>
<script src="<?php echo e(asset('assets/js/stisla.js')); ?> "></script>

<script src="<?php echo e(asset('assets/modules/datatables/datatables.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/modules/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/modules/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/modules/jquery-selectric/jquery.selectric.min.js')); ?> "></script>
<script src="<?php echo e(asset('assets/js/scripts.js')); ?> "></script>
<script src="<?php echo e(asset('assets/js/custom.js')); ?> "></script>
</body>
</html>
<?php /**PATH /var/www/accgo/resources/views/layouts/auth.blade.php ENDPATH**/ ?>