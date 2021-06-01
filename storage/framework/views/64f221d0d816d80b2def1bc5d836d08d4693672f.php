<?php
    $logo=asset(Storage::url('logo/'));
    $company_logo=Utility::getValByName('company_logo');
    $company_small_logo=Utility::getValByName('company_small_logo');
    $company_favicon=Utility::getValByName('company_favicon');

?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link href="<?php echo e(asset('assets/modules/bootstrap-fileinput/bootstrap-fileinput.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on("change", "select[name='invoice_template'], input[name='invoice_color']", function () {
            var template = $("select[name='invoice_template']").val();
            var color = $("input[name='invoice_color']:checked").val();
            $('#invoice_frame').attr('src', '<?php echo e(url('/invoices/preview')); ?>/' + template + '/' + color);
        });

        $(document).on("change", "select[name='proposal_template'], input[name='proposal_color']", function () {
            var template = $("select[name='proposal_template']").val();
            var color = $("input[name='proposal_color']:checked").val();
            $('#proposal_frame').attr('src', '<?php echo e(url('/proposal/preview')); ?>/' + template + '/' + color);
        });

        $(document).on("change", "select[name='bill_template'], input[name='bill_color']", function () {
            var template = $("select[name='bill_template']").val();
            var color = $("input[name='bill_color']:checked").val();
            $('#bill_frame').attr('src', '<?php echo e(url('/bill/preview')); ?>/' + template + '/' + color);
        });
    </script>
    <script src="<?php echo e(asset('assets/modules/bootstrap-fileinput/bootstrap-fileinput.js')); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('Settings')); ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                <div class="breadcrumb-item"><?php echo e(__('Settings')); ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <h4><?php echo e(__('Settings')); ?></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="setting-tab">
                            <ul class="nav nav-pills mb-3" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="contact-tab4" data-toggle="tab" href="#business-setting" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Business Setting')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#system-setting" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('System Setting')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#company-setting" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Company Setting')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#proposal-template-setting" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Proposal Print Setting')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#template-setting" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Invoice Print Setting')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#bill-template-setting" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Bill Print Setting')); ?></a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade fade show active" id="business-setting" role="tabpanel" aria-labelledby="profile-tab3">
                                    <div class="company-setting-wrap">
                                        <?php echo e(Form::model($settings,array('route'=>'business.setting','method'=>'POST','enctype' => "multipart/form-data"))); ?>

                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <h5><?php echo e(__('Logo')); ?></h5>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail h-150">
                                                                <img src="<?php echo e($logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')); ?>" alt="">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h3"></div>
                                                            <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> <?php echo e(__('Select image')); ?> </span>
                                                                <span class="fileinput-exists"> <?php echo e(__('Change')); ?> </span>
                                                                <input type="hidden">
                                                                <input type="file" name="company_logo" id="logo">
                                                            </span>
                                                                <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> <?php echo e(__('Remove')); ?> </a>
                                                            </div>
                                                        </div>
                                                        <p class="mt-3 text-primary"> <?php echo e(__('These Logo will appear on Bill and Invoice as well.')); ?></p>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h5><?php echo e(__('Small Logo')); ?></h5>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail h-150">
                                                                <img src="<?php echo e($logo.'/'.(isset($company_small_logo) && !empty($company_small_logo)?$company_small_logo:'small_logo.png')); ?>" alt="">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h3"></div>
                                                            <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> <?php echo e(__('Select image')); ?> </span>
                                                                <span class="fileinput-exists"> <?php echo e(__('Change')); ?> </span>
                                                                <input type="hidden">
                                                                <input type="file" name="company_small_logo" id="company_small_logo">
                                                            </span>
                                                                <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> <?php echo e(__('Remove')); ?> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <h5><?php echo e(__('Favicon')); ?></h5>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail h-150">
                                                                <img src="<?php echo e($logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')); ?>" alt="">
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail thumbnail-h3"></div>
                                                            <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"> <?php echo e(__('Select image')); ?> </span>
                                                                <span class="fileinput-exists"> <?php echo e(__('Change')); ?> </span>
                                                                <input type="hidden">
                                                                <input type="file" name="company_favicon" id="company_favicon">
                                                            </span>
                                                                <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> <?php echo e(__('Remove')); ?> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <?php if ($errors->has('logo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('logo'); ?>
                                                    <span class="invalid-logo" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                     </span>
                                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                </div>
                                                <div class="row mt-20">
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('title_text',__('Title Text'))); ?>

                                                        <?php echo e(Form::text('title_text',null,array('class'=>'form-control','placeholder'=>__('Title Text')))); ?>

                                                        <?php if ($errors->has('title_text')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title_text'); ?>
                                                        <span class="invalid-title_text" role="alert">
                                                             <strong class="text-danger"><?php echo e($message); ?></strong>
                                                             </span>
                                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))); ?>

                                        </div>
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>
                                <div class="tab-pane fade fade" id="system-setting" role="tabpanel" aria-labelledby="profile-tab3">
                                    <div class="company-setting-wrap">
                                        <?php echo e(Form::model($settings,array('route'=>'system.settings','method'=>'post'))); ?>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <?php echo e(Form::label('site_currency',__('Currency *'))); ?>

                                                    <?php echo e(Form::text('site_currency',null,array('class'=>'form-control font-style'))); ?>

                                                    <?php if ($errors->has('site_currency')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('site_currency'); ?>
                                                    <span class="invalid-site_currency" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php echo e(Form::label('site_currency_symbol',__('Currency Symbol *'))); ?>

                                                    <?php echo e(Form::text('site_currency_symbol',null,array('class'=>'form-control'))); ?>

                                                    <?php if ($errors->has('site_currency_symbol')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('site_currency_symbol'); ?>
                                                    <span class="invalid-site_currency_symbol" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="example3cols3Input"><?php echo e(__('Currency Symbol Position')); ?></label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="custom-control custom-radio mb-3">

                                                                    <input type="radio" id="customRadio5" name="site_currency_symbol_position" value="pre" class="custom-control-input" <?php if(@$settings['site_currency_symbol_position'] == 'pre'): ?> checked <?php endif; ?>>
                                                                    <label class="custom-control-label" for="customRadio5"><?php echo e(__('Pre')); ?></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="custom-control custom-radio mb-3">
                                                                    <input type="radio" id="customRadio6" name="site_currency_symbol_position" value="post" class="custom-control-input" <?php if(@$settings['site_currency_symbol_position'] == 'post'): ?> checked <?php endif; ?>>
                                                                    <label class="custom-control-label" for="customRadio6"><?php echo e(__('Post')); ?></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="site_date_format" class="form-control-label"><?php echo e(__('Date Format')); ?></label>
                                                    <select type="text" name="site_date_format" class="form-control selectric" id="site_date_format">
                                                        <option value="M j, Y" <?php if(@$settings['site_date_format'] == 'M j, Y'): ?> selected="selected" <?php endif; ?>>Jan 1,2015</option>
                                                        <option value="d-m-Y" <?php if(@$settings['site_date_format'] == 'd-m-Y'): ?> selected="selected" <?php endif; ?>>d-m-y</option>
                                                        <option value="m-d-Y" <?php if(@$settings['site_date_format'] == 'm-d-Y'): ?> selected="selected" <?php endif; ?>>m-d-y</option>
                                                        <option value="Y-m-d" <?php if(@$settings['site_date_format'] == 'Y-m-d'): ?> selected="selected" <?php endif; ?>>y-m-d</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="site_time_format" class="form-control-label"><?php echo e(__('Time Format')); ?></label>
                                                    <select type="text" name="site_time_format" class="form-control selectric" id="site_time_format">
                                                        <option value="g:i A" <?php if(@$settings['site_time_format'] == 'g:i A'): ?> selected="selected" <?php endif; ?>>10:30 PM</option>
                                                        <option value="g:i a" <?php if(@$settings['site_time_format'] == 'g:i a'): ?> selected="selected" <?php endif; ?>>10:30 pm</option>
                                                        <option value="H:i" <?php if(@$settings['site_time_format'] == 'H:i'): ?> selected="selected" <?php endif; ?>>22:30</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php echo e(Form::label('invoice_prefix',__('Invoice Prefix'))); ?>

                                                    <?php echo e(Form::text('invoice_prefix',null,array('class'=>'form-control'))); ?>

                                                    <?php if ($errors->has('invoice_prefix')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('invoice_prefix'); ?>
                                                    <span class="invalid-invoice_prefix" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php echo e(Form::label('proposal_prefix',__('Proposal Prefix'))); ?>

                                                    <?php echo e(Form::text('proposal_prefix',null,array('class'=>'form-control'))); ?>

                                                    <?php if ($errors->has('proposal_prefix')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('proposal_prefix'); ?>
                                                    <span class="invalid-proposal_prefix" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php echo e(Form::label('bill_prefix',__('Bill Prefix'))); ?>

                                                    <?php echo e(Form::text('bill_prefix',null,array('class'=>'form-control'))); ?>

                                                    <?php if ($errors->has('bill_prefix')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('bill_prefix'); ?>
                                                    <span class="invalid-bill_prefix" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php echo e(Form::label('customer_prefix',__('Customer Prefix'))); ?>

                                                    <?php echo e(Form::text('customer_prefix',null,array('class'=>'form-control'))); ?>

                                                    <?php if ($errors->has('customer_prefix')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('customer_prefix'); ?>
                                                    <span class="invalid-customer_prefix" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php echo e(Form::label('vender_prefix',__('Vender Prefix'))); ?>

                                                    <?php echo e(Form::text('vender_prefix',null,array('class'=>'form-control'))); ?>

                                                    <?php if ($errors->has('vender_prefix')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('vender_prefix'); ?>
                                                    <span class="invalid-vender_prefix" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php echo e(Form::label('invoice_color',__('Invoice/Bill Color Theme'))); ?>

                                                    <?php echo e(Form::text('invoice_color',null,array('class'=>'form-control jscolor'))); ?>

                                                    <?php if ($errors->has('invoice_color')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('invoice_color'); ?>
                                                    <span class="invalid-invoice_color" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php echo e(Form::label('footer_title',__('Invoice/Bill Footer Title'))); ?>

                                                    <?php echo e(Form::text('footer_title',null,array('class'=>'form-control'))); ?>

                                                    <?php if ($errors->has('footer_title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('footer_title'); ?>
                                                    <span class="invalid-footer_title" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <?php echo e(Form::label('footer_notes',__('Invoice/Bill Footer Notes'))); ?>

                                                    <?php echo e(Form::text('footer_notes',null,array('class'=>'form-control'))); ?>

                                                    <?php if ($errors->has('footer_notes')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('footer_notes'); ?>
                                                    <span class="invalid-footer_notes" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))); ?>

                                        </div>
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="company-setting" role="tabpanel" aria-labelledby="contact-tab4">
                                    <div class="email-setting-wrap">
                                        <div class="row">
                                            <?php echo e(Form::model($settings,array('route'=>'company.settings','method'=>'post'))); ?>

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('company_name *',__('Company Name *'))); ?>

                                                        <?php echo e(Form::text('company_name',null,array('class'=>'form-control font-style'))); ?>

                                                        <?php if ($errors->has('company_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('company_name'); ?>
                                                        <span class="invalid-company_name" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('company_address',__('Address'))); ?>

                                                        <?php echo e(Form::text('company_address',null,array('class'=>'form-control font-style'))); ?>

                                                        <?php if ($errors->has('company_address')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('company_address'); ?>
                                                        <span class="invalid-company_address" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('company_city',__('City'))); ?>

                                                        <?php echo e(Form::text('company_city',null,array('class'=>'form-control font-style'))); ?>

                                                        <?php if ($errors->has('company_city')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('company_city'); ?>
                                                        <span class="invalid-company_city" role="alert">
                                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                </span>
                                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('company_state',__('State'))); ?>

                                                        <?php echo e(Form::text('company_state',null,array('class'=>'form-control font-style'))); ?>

                                                        <?php if ($errors->has('company_state')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('company_state'); ?>
                                                        <span class="invalid-company_state" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('company_zipcode',__('Zip/Post Code'))); ?>

                                                        <?php echo e(Form::text('company_zipcode',null,array('class'=>'form-control'))); ?>

                                                        <?php if ($errors->has('company_zipcode')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('company_zipcode'); ?>
                                                        <span class="invalid-company_zipcode" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <?php echo e(Form::label('company_country',__('Country'))); ?>

                                                        <?php echo e(Form::text('company_country',null,array('class'=>'form-control font-style'))); ?>

                                                        <?php if ($errors->has('company_country')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('company_country'); ?>
                                                        <span class="invalid-company_country" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('company_telephone',__('Telephone'))); ?>

                                                        <?php echo e(Form::text('company_telephone',null,array('class'=>'form-control'))); ?>

                                                        <?php if ($errors->has('company_telephone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('company_telephone'); ?>
                                                        <span class="invalid-company_telephone" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('company_email',__('System Email *'))); ?>

                                                        <?php echo e(Form::text('company_email',null,array('class'=>'form-control'))); ?>

                                                        <?php if ($errors->has('company_email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('company_email'); ?>
                                                        <span class="invalid-company_email" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('company_email_from_name',__('Email (From Name) *'))); ?>

                                                        <?php echo e(Form::text('company_email_from_name',null,array('class'=>'form-control font-style'))); ?>

                                                        <?php if ($errors->has('company_email_from_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('company_email_from_name'); ?>
                                                        <span class="invalid-company_email_from_name" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('registration_number','* شماره ثبت شرکت')); ?>

                                                        <?php echo e(Form::text('registration_number',null,array('class'=>'form-control'))); ?>

                                                        <?php if ($errors->has('registration_number')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('registration_number'); ?>
                                                        <span class="invalid-registration_number" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                        </span>
                                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo e(Form::label('vat_number','* کد مالیاتی')); ?>

                                                        <?php echo e(Form::text('vat_number',null,array('class'=>'form-control'))); ?>

                                                        <?php if ($errors->has('vat_number')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('vat_number'); ?>
                                                            <span class="invalid-vat_number" role="alert">
                                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                                            </span>
                                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-right">
                                                <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-primary'))); ?>

                                            </div>
                                            <?php echo e(Form::close()); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="proposal-template-setting" role="tabpanel" aria-labelledby="contact-tab4">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <form id="setting-form" method="post" action="<?php echo e(route('proposal.template.setting')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-group">
                                                        <label for="address"><?php echo e(__('Proposal Template')); ?></label>
                                                        <select class="form-control" name="proposal_template">
                                                            <?php $__currentLoopData = Utility::templateData()['templates']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($key); ?>" <?php echo e((isset($settings['proposal_template']) && $settings['proposal_template'] == $key) ? 'selected' : ''); ?>><?php echo e($template); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo e(__('Color Input')); ?></label>
                                                        <div class="row gutters-xs">
                                                            <?php $__currentLoopData = Utility::templateData()['colors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="col-auto">
                                                                    <label class="colorinput">
                                                                        <input name="proposal_color" type="radio" value="<?php echo e($color); ?>" class="colorinput-input" <?php echo e((isset($settings['proposal_color']) && $settings['proposal_color'] == $color) ? 'checked' : ''); ?>>
                                                                        <span class="colorinput-color" style="background: #<?php echo e($color); ?>"></span>
                                                                    </label>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary">
                                                        <?php echo e(__('Save')); ?>

                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-md-10">
                                                <?php if(isset($settings['proposal_template']) && isset($settings['proposal_color'])): ?>
                                                    <iframe id="proposal_frame" class="w-100" height="100%" frameborder="0" src="<?php echo e(route('proposal.preview',[$settings['proposal_template'],$settings['proposal_color']])); ?>"></iframe>
                                                <?php else: ?>
                                                    <iframe id="proposal_frame" class="w-100" height="100%" frameborder="0" src="<?php echo e(route('proposal.preview',['template1','fffff'])); ?>"></iframe>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="template-setting" role="tabpanel" aria-labelledby="contact-tab4">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <form id="setting-form" method="post" action="<?php echo e(route('template.setting')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-group">
                                                        <label for="address"><?php echo e(__('Invoice Template')); ?></label>
                                                        <select class="form-control" name="invoice_template">
                                                            <?php $__currentLoopData = Utility::templateData()['templates']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($key); ?>" <?php echo e((isset($settings['invoice_template']) && $settings['invoice_template'] == $key) ? 'selected' : ''); ?>><?php echo e($template); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo e(__('Color Input')); ?></label>
                                                        <div class="row gutters-xs">
                                                            <?php $__currentLoopData = Utility::templateData()['colors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="col-auto">
                                                                    <label class="colorinput">
                                                                        <input name="invoice_color" type="radio" value="<?php echo e($color); ?>" class="colorinput-input" <?php echo e((isset($settings['invoice_color']) && $settings['invoice_color'] == $color) ? 'checked' : ''); ?>>
                                                                        <span class="colorinput-color" style="background: #<?php echo e($color); ?>"></span>
                                                                    </label>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary">
                                                        <?php echo e(__('Save')); ?>

                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-md-10">
                                                <?php if(isset($settings['invoice_template']) && isset($settings['invoice_color'])): ?>
                                                    <iframe id="invoice_frame" class="w-100" height="100%" frameborder="0" src="<?php echo e(route('invoice.preview',[$settings['invoice_template'],$settings['invoice_color']])); ?>"></iframe>
                                                <?php else: ?>
                                                    <iframe id="invoice_frame" class="w-100" height="100%" frameborder="0" src="<?php echo e(route('invoice.preview',['template1','fffff'])); ?>"></iframe>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="bill-template-setting" role="tabpanel" aria-labelledby="contact-tab4">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <form id="setting-form" method="post" action="<?php echo e(route('bill.template.setting')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-group">
                                                        <label for="address"><?php echo e(__('Bill Template')); ?></label>
                                                        <select class="form-control" name="bill_template">
                                                            <?php $__currentLoopData = Utility::templateData()['templates']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($key); ?>" <?php echo e((isset($settings['bill_template']) && $settings['bill_template'] == $key) ? 'selected' : ''); ?>><?php echo e($template); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label"><?php echo e(__('Color Input')); ?></label>
                                                        <div class="row gutters-xs">
                                                            <?php $__currentLoopData = Utility::templateData()['colors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="col-auto">
                                                                    <label class="colorinput">
                                                                        <input name="bill_color" type="radio" value="<?php echo e($color); ?>" class="colorinput-input" <?php echo e((isset($settings['bill_color']) && $settings['bill_color'] == $color) ? 'checked' : ''); ?>>
                                                                        <span class="colorinput-color" style="background: #<?php echo e($color); ?>"></span>
                                                                    </label>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary">
                                                        <?php echo e(__('Save')); ?>

                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-md-10">
                                                <?php if(isset($settings['bill_template']) && isset($settings['bill_color'])): ?>
                                                    <iframe id="bill_frame" class="w-100" height="100%" frameborder="0" src="<?php echo e(route('bill.preview',[$settings['bill_template'],$settings['bill_color']])); ?>"></iframe>
                                                <?php else: ?>
                                                    <iframe id="bill_frame" class="w-100" height="100%" frameborder="0" src="<?php echo e(route('bill.preview',['template1','fffff'])); ?>"></iframe>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/accgo/resources/views/settings/company.blade.php ENDPATH**/ ?>