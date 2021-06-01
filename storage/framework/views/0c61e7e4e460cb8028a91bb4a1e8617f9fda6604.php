<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>

    <script>
        var SalesChart = (function () {
            var $chart = $('#chart-sales');

            function init($this) {
                var salesChart = new Chart($this, {
                    type: 'line',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: Charts.colors.gray[200],
                                    zeroLineColor: Charts.colors.gray[200]
                                },
                                ticks: {}
                            }]
                        }
                    },

                    data: {
                        datasets: <?php echo json_encode($invoiceChartData['statusData']); ?>,
                        labels: <?php echo json_encode($invoiceChartData['month']); ?>,
                    },
                });
                $this.data('chart', salesChart);
            }

            if ($chart.length) {
                init($chart);
            }
        })();
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('Dashboard')); ?></h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">

                        <div class="col-3">
                            <div class="text-small float-right font-weight-bold text-muted"><?php echo e($invoiceChartData['progressData']['totalInvoice'] .'/'.$invoiceChartData['progressData']['totalUnpaidInvoice']); ?></div>
                            <div class="font-weight-bold mb-1"><?php echo e(__('Unpaid')); ?></div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="<?php echo e($invoiceChartData['progressData']['unpaidPr']); ?>%" aria-valuenow="<?php echo e($invoiceChartData['progressData']['unpaidPr']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($invoiceChartData['progressData']['unpaidPr']); ?>%; background-color: <?php echo e($invoiceChartData['progressData']['unpaidColor']); ?>"></div>
                            </div>
                            <?php echo e(($invoiceChartData['progressData']['unpaidPr'].'%')); ?>

                        </div>
                        <div class="col-3">
                            <div class="text-small float-right font-weight-bold text-muted"><?php echo e($invoiceChartData['progressData']['totalInvoice'] .'/'.$invoiceChartData['progressData']['totalPaidInvoice']); ?></div>
                            <div class="font-weight-bold mb-1"><?php echo e(__('Paid')); ?></div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="<?php echo e($invoiceChartData['progressData']['paidPr']); ?>%" aria-valuenow="<?php echo e($invoiceChartData['progressData']['paidPr']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($invoiceChartData['progressData']['paidPr']); ?>%;background-color: <?php echo e($invoiceChartData['progressData']['paidColor']); ?>"></div>
                            </div>
                            <?php echo e(($invoiceChartData['progressData']['paidPr'].'%')); ?>

                        </div>
                        <div class="col-3">
                            <div class="text-small float-right font-weight-bold text-muted"><?php echo e($invoiceChartData['progressData']['totalInvoice'] .'/'.$invoiceChartData['progressData']['totalPartialInvoice']); ?></div>
                            <div class="font-weight-bold mb-1"><?php echo e(__('Partial Paid')); ?></div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="<?php echo e($invoiceChartData['progressData']['partialPr']); ?>%" aria-valuenow="<?php echo e($invoiceChartData['progressData']['partialPr']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($invoiceChartData['progressData']['partialPr']); ?>%;background-color: <?php echo e($invoiceChartData['progressData']['partialColor']); ?>"></div>
                            </div>
                            <?php echo e(($invoiceChartData['progressData']['partialPr'].'%')); ?>

                        </div>
                        <div class="col-3">
                            <div class="text-small float-right font-weight-bold text-muted"><?php echo e($invoiceChartData['progressData']['totalInvoice'] .'/'.$invoiceChartData['progressData']['totalDueInvoice']); ?></div>
                            <div class="font-weight-bold mb-1"><?php echo e(__('Due')); ?></div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="<?php echo e($invoiceChartData['progressData']['duePr']); ?>%" aria-valuenow="<?php echo e($invoiceChartData['progressData']['duePr']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($invoiceChartData['progressData']['duePr']); ?>%;background-color: <?php echo e($invoiceChartData['progressData']['dueColor']); ?>"></div>
                            </div>
                            <?php echo e(($invoiceChartData['progressData']['duePr'].'%')); ?>

                        </div>
                    </div>

                    <div class="card-header"><h4><?php echo e(__('Current year').' - '.date('Y')); ?></h4></div>
                    <div class="card-body">
                        <canvas id="chart-sales" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/accgo/resources/views/customer/dashboard.blade.php ENDPATH**/ ?>