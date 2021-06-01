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
                        datasets: <?php echo json_encode($billChartData['statusData']); ?>,
                        labels: <?php echo json_encode($billChartData['month']); ?>,
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
                            <div class="text-small float-right font-weight-bold text-muted"><?php echo e($billChartData['progressData']['totalBill'] .'/'.$billChartData['progressData']['totalUnpaidBill']); ?></div>
                            <div class="font-weight-bold mb-1"><?php echo e(__('Unpaid')); ?></div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="<?php echo e($billChartData['progressData']['unpaidPr']); ?>%" aria-valuenow="<?php echo e($billChartData['progressData']['unpaidPr']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($billChartData['progressData']['unpaidPr']); ?>%; background-color: <?php echo e($billChartData['progressData']['unpaidColor']); ?>"></div>
                            </div>
                            <?php echo e(number_format($billChartData['progressData']['unpaidPr'], 2, '.', '').'%'); ?>

                        </div>
                        <div class="col-3">
                            <div class="text-small float-right font-weight-bold text-muted"><?php echo e($billChartData['progressData']['totalBill'] .'/'.$billChartData['progressData']['totalPaidBill']); ?></div>
                            <div class="font-weight-bold mb-1"><?php echo e(__('Paid')); ?></div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="<?php echo e($billChartData['progressData']['paidPr']); ?>%" aria-valuenow="<?php echo e($billChartData['progressData']['paidPr']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($billChartData['progressData']['paidPr']); ?>%;background-color: <?php echo e($billChartData['progressData']['paidColor']); ?>"></div>
                            </div>
                            <?php echo e(number_format($billChartData['progressData']['paidPr'], 2, '.', '').'%'); ?>

                        </div>
                        <div class="col-3">
                            <div class="text-small float-right font-weight-bold text-muted"><?php echo e($billChartData['progressData']['totalBill'] .'/'.$billChartData['progressData']['totalPartialBill']); ?></div>
                            <div class="font-weight-bold mb-1"><?php echo e(__('Partial Paid')); ?></div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="<?php echo e($billChartData['progressData']['partialPr']); ?>%" aria-valuenow="<?php echo e($billChartData['progressData']['partialPr']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($billChartData['progressData']['partialPr']); ?>%;background-color: <?php echo e($billChartData['progressData']['partialColor']); ?>"></div>
                            </div>
                            <?php echo e(number_format($billChartData['progressData']['partialPr'], 2, '.', '').'%'); ?>

                        </div>
                        <div class="col-3">
                            <div class="text-small float-right font-weight-bold text-muted"><?php echo e($billChartData['progressData']['totalBill'] .'/'.$billChartData['progressData']['totalDueBill']); ?></div>
                            <div class="font-weight-bold mb-1"><?php echo e(__('Due')); ?></div>
                            <div class="progress height3" data-height="3">
                                <div class="progress-bar" role="progressbar" data-width="<?php echo e($billChartData['progressData']['duePr']); ?>%" aria-valuenow="<?php echo e($billChartData['progressData']['duePr']); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($billChartData['progressData']['duePr']); ?>%;background-color: <?php echo e($billChartData['progressData']['dueColor']); ?>"></div>
                            </div>
                            <?php echo e(number_format($billChartData['progressData']['duePr'], 2, '.', '').'%'); ?>

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



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/accgo/resources/views/vender/dashboard.blade.php ENDPATH**/ ?>