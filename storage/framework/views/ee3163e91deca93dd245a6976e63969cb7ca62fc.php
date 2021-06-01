<script src="<?php echo e(asset('assets/modules/jquery.min.js')); ?> "></script>

<script src="<?php echo e(asset('assets/modules/popper.js')); ?> "></script>
<script src="<?php echo e(asset('assets/modules/tooltip.js')); ?> "></script>
<script src="<?php echo e(asset('assets/modules/bootstrap/js/bootstrap.min.js')); ?> "></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
<script>
    moment.locale('<?php echo e(App::getLocale()); ?>');
</script>

<script src="<?php echo e(asset('assets/js/stisla.js')); ?> "></script>

<script src="<?php echo e(asset('assets/modules/jquery.sparkline.min.js')); ?> "></script>

<script src="<?php echo e(asset('assets/modules/chart/Chart.min.js')); ?> "></script>
<script src="<?php echo e(asset('assets/modules/chart/Chart.extension.js')); ?> "></script>


<script src="<?php echo e(asset('assets/modules/datatables/datatables.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/modules/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/modules/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/modules/bootstrap-toastr/toastr.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/modules/bootstrap-toastr/ui-toastr.min.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('assets/modules/jquery-selectric/jquery.selectric.min.js')); ?> "></script>

<script src="<?php echo e(asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js')); ?> "></script>
<script src="<?php echo e(asset('assets/js/jquery.easy-autocomplete.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/modules/nicescroll/jquery.nicescroll.min.js')); ?> "></script>

<script src="<?php echo e(asset('assets/js/jscolor.js')); ?> "></script>
<script src="<?php echo e(asset('assets/js/scripts.js')); ?> "></script>
<script src="<?php echo e(asset('assets/js/custom.js')); ?> "></script>
<script src="<?php echo e(asset('assets/js/jquery-ui.min.js')); ?>"></script>

<script>
    var date_picker_locale = {
        format: 'YYYY-MM-DD',
        daysOfWeek: [
            "<?php echo e(__('Sun')); ?>",
            "<?php echo e(__('Mon')); ?>",
            "<?php echo e(__('Tue')); ?>",
            "<?php echo e(__('Wed')); ?>",
            "<?php echo e(__('Thu')); ?>",
            "<?php echo e(__('Fri')); ?>",
            "<?php echo e(__('Sat')); ?>"
        ],
        monthNames: [
            "<?php echo e(__('January')); ?>",
            "<?php echo e(__('February')); ?>",
            "<?php echo e(__('March')); ?>",
            "<?php echo e(__('April')); ?>",
            "<?php echo e(__('May')); ?>",
            "<?php echo e(__('June')); ?>",
            "<?php echo e(__('July')); ?>",
            "<?php echo e(__('August')); ?>",
            "<?php echo e(__('September')); ?>",
            "<?php echo e(__('October')); ?>",
            "<?php echo e(__('November')); ?>",
            "<?php echo e(__('December')); ?>"
        ],
    };

    var calender_header = {
        today: "<?php echo e(__('today')); ?>",
        month: '<?php echo e(__('month')); ?>',
        week: '<?php echo e(__('week')); ?>',
        day: '<?php echo e(__('day')); ?>',
        list: '<?php echo e(__('list')); ?>'
    };
</script>

<?php if($message = Session::get('success')): ?>
    <script>
        toastrs('موفق', '<?php echo $message; ?>', 'success')
    </script>
<?php endif; ?>

<?php if($message = Session::get('error')): ?>
    <script>toastrs('خطا', '<?php echo $message; ?>', 'error')</script>
<?php endif; ?>

<?php if($message = Session::get('info')): ?>
    <script>toastrs('اطلاعیه', '<?php echo $message; ?>', 'info')</script>
<?php endif; ?>

<?php echo $__env->yieldPushContent('script-page'); ?>
<?php /**PATH /var/www/accgo/resources/views/partials/admin/footer.blade.php ENDPATH**/ ?>