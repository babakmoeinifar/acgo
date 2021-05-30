<?php
    $users=\Auth::user();
    $profile=asset(Storage::url('avatar/'));
    $currantLang = $users->currentLanguage();
    $languages=Utility::languages();
?>
<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto search-element" method="post">
        <div class="easy-autocomplete"><input type="hidden" name="_token" value="ifSnVqGphjkOu1aqYvyflvadZqTOLssR8oVLlL9q" id="eac-5343" style="" autocomplete="off">
            <div class="easy-autocomplete-container" id="eac-container-eac-5343">
                <ul></ul>
            </div>
        </div>




    </form>

    <ul class="navbar-nav navbar-right">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage language')): ?>
            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg language-dd"><i class="fas fa-language"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-header"><?php echo e(__('Choose Language')); ?>

                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create language')): ?>
                        <a href="<?php echo e(route('manage.language',[$currantLang])); ?>" class="dropdown-item btn manage-language-btn">
                            <span> <?php echo e(__('Create & Customize')); ?></span>
                        </a>
                    <?php endif; ?>
                    <div class="dropdown-list-content dropdown-list-icons">
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(\Auth::guard('customer')->check()): ?>
                                <a href="<?php echo e(route('customer.change.language',$language)); ?>" class="dropdown-item dropdown-item-unread <?php if($language == $currantLang): ?> active-language <?php endif; ?>">
                                    <span> <?php echo e(Str::upper($language)); ?></span>
                                </a>
                            <?php elseif(\Auth::guard('vender')->check()): ?>
                                <a href="<?php echo e(route('vender.change.language',$language)); ?>" class="dropdown-item dropdown-item-unread <?php if($language == $currantLang): ?> active-language <?php endif; ?>">
                                    <span> <?php echo e(Str::upper($language)); ?></span>
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('change.language',$language)); ?>" class="dropdown-item dropdown-item-unread <?php if($language == $currantLang): ?> active-language <?php endif; ?>">
                                    <span> <?php echo e(Str::upper($language)); ?></span>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </li>
        <?php endif; ?>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?php echo e((!empty($users->avatar)? $profile.'/'.$users->avatar : $profile.'/avatar.png')); ?>" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"><?php echo e(__('Hi')); ?>, <?php echo e(\Auth::user()->name); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title"><?php echo e(__('Welcome!')); ?></div>
                <?php if(\Auth::guard('customer')->check()): ?>
                    <a href="<?php echo e(route('customer.profile')); ?>" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> <?php echo e(__('My profile')); ?>

                    </a>
                <?php elseif(\Auth::guard('vender')->check()): ?>
                    <a href="<?php echo e(route('vender.profile')); ?>" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> <?php echo e(__('My profile')); ?>

                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('profile')); ?>" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> <?php echo e(__('My profile')); ?>

                    </a>
                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i>
                    <span><?php echo e(__('Logout')); ?></span>
                </a>
                <?php if(\Auth::guard('customer')->check()): ?>
                    <form id="frm-logout" action="<?php echo e(route('customer.logout')); ?>" method="POST" class="d-none">
                        <?php echo e(csrf_field()); ?>

                    </form>
                <?php else: ?>
                    <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                        <?php echo e(csrf_field()); ?>

                    </form>
                <?php endif; ?>
            </div>
        </li>
    </ul>
</nav>

<?php /**PATH /var/www/accgo/resources/views/partials/admin/header.blade.php ENDPATH**/ ?>