<div class="card mt-4">
    <div class="card-body">
        <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="media">
                    <img alt="" class="mr-3 rounded-circle" width="50" src="<?php echo e(asset(Storage::url('plan')).'/'.$plan->image); ?>">
                    <div class="media-body">
                        <div class="media-title font-style"><?php echo e($plan->name); ?></div>
                        <div class="text-job text-muted"> <?php echo e(isset(\Auth::user()->planPrice()['stripe_currencys_symbol'])?\Auth::user()->planPrice()['stripe_currency_symbol'].$plan->price:''); ?> <?php echo e(' / '. $plan->duration); ?></div>
                    </div>
                    <div class="media-items">
                        <div class="media-item">
                            <div class="media-value"><?php echo e($plan->max_users); ?></div>
                            <div class="media-label"><?php echo e(__('Users')); ?></div>
                        </div>
                        <div class="media-item">
                            <div class="media-value"><?php echo e($plan->max_customers); ?></div>
                            <div class="media-label"><?php echo e(__('Customers')); ?></div>
                        </div>
                        <div class="media-item">
                            <div class="media-value"><?php echo e($plan->max_venders); ?></div>
                            <div class="media-label"><?php echo e(__('Venders')); ?></div>
                        </div>
                        <div class="media-item">
                            <?php if($user->plan==$plan->id): ?>
                                <div class="media-value"></div>
                                <div class="media-label text-success"><h6><?php echo e(__('Active')); ?></h6></div>
                            <?php else: ?>
                                <div class="media-value">
                                    <a href="<?php echo e(route('plan.active',[$user->id,$plan->id])); ?>" class="btn btn-primary" title="Click to Upgrade Plan"><i class="fas fa-cart-plus"></i></a>
                                </div>
                                <div class="media-label text-success"><h6></h6></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php /**PATH /var/www/accgo/resources/views/user/plan.blade.php ENDPATH**/ ?>