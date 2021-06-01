<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Invoice Detail')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '#shipping', function () {
            var url = $(this).data('url');
            var is_display = $("#shipping").is(":checked");
            $.ajax({
                url: url,
                type: 'get',
                data: {
                    'is_display': is_display,
                },
                success: function (data) {
                    // console.log(data);
                }
            });
        })
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1><?php echo e(__('Invoice')); ?></h1>
            <div class="section-header-breadcrumb">
                <?php if(\Auth::guard('customer')->check()): ?>
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('customer.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><a href="<?php echo e(route('customer.invoice')); ?>"><?php echo e(__('Invoice')); ?></a></div>
                <?php else: ?>
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><a href="<?php echo e(route('invoice.index')); ?>"><?php echo e(__('Invoice')); ?></a></div>
                <?php endif; ?>
                <div class="breadcrumb-item"><?php echo e(\Auth::user()->invoiceNumberFormat($invoice->invoice_id)); ?></div>
            </div>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send invoice')): ?>
            <?php if($invoice->status!=4): ?>
                <div class="row">
                    <div class="col-12">
                        <div class="activities">
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job text-primary"><h6><?php echo e(__('Create Invoice')); ?></h6>
                                        </span>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit invoice')): ?>
                                            <a href="<?php echo e(route('invoice.edit',$invoice->id)); ?>" class="btn btn-primary btn-action mr-1 float-right">
                                                <?php echo e(__('Edit')); ?>

                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <p><?php echo e(__('Status')); ?> : <a href="#"><?php echo e(__('Created on ')); ?> <?php echo e(\Auth::user()->dateFormat($invoice->issue_date)); ?> </a></p>
                                </div>
                            </div>
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job text-primary"><h6><?php echo e(__('Send Invoice')); ?></h6></span>
                                        <?php if($invoice->status!=0): ?>
                                            <p><?php echo e(__('Status')); ?> : <a href="#"><?php echo e(__('Sent on')); ?> <?php echo e(\Auth::user()->dateFormat($invoice->send_date)); ?>  </a></p>
                                        <?php else: ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send invoice')): ?>
                                                <a href="<?php echo e(route('invoice.sent',$invoice->id)); ?>" class="btn btn-primary btn-action mr-1 float-right">
                                                    <?php echo e(__('Mark Sent')); ?>

                                                </a>
                                            <?php endif; ?>
                                            <p><?php echo e(__('Status')); ?> : <a href="#"><?php echo e(__('Not Sent')); ?> </a></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    <i class="far fa-money-bill-alt"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job text-primary"><h6><?php echo e(__('Get Paid')); ?></h6></span>
                                    </div>
                                    <?php if($invoice->status!=0): ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create payment invoice')): ?>
                                            <a href="#!" data-url="<?php echo e(route('invoice.payment',$invoice->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Add Payment')); ?>" class="btn btn-primary btn-action mr-1 float-right">
                                                <?php echo e(__('Add Payment')); ?>

                                            </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <p><?php echo e(__('Status')); ?> : <a href="#"><?php echo e(__('Awaiting payment')); ?> </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <?php if(\Auth::user()->type=='company'): ?>
                        <?php if($invoice->status!=0): ?>
                            <div class="row mb-10">
                                <div class="col-lg-12">
                                    <div class="text-right">
                                        <?php if(!empty($invoicePayment)): ?>
                                            <a href="#" data-url="<?php echo e(route('invoice.credit.note',$invoice->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Add Credit Note')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Credit Note')); ?>" class="btn btn-primary btn-action mr-1 float-right">
                                                <?php echo e(__('Add Credit Note')); ?>

                                            </a>
                                        <?php endif; ?>
                                        <?php if($invoice->status!=4): ?>
                                            <a href="<?php echo e(route('invoice.payment.reminder',$invoice->id)); ?>" class="btn btn-primary btn-action mr-1 float-right">
                                                <?php echo e(__('Payment Reminder')); ?>

                                            </a>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('invoice.sent',$invoice->id)); ?>" class="btn btn-primary btn-action mr-1 float-right">
                                            <?php echo e(__('Resend Invoice')); ?>

                                        </a>
                                        <a href="<?php echo e(route('invoice.pdf', Crypt::encrypt($invoice->id))); ?>" target="_blank" class="btn btn-primary btn-action mr-1 float-right">
                                            <?php echo e(__('Print')); ?>

                                        </a>
                                    </div>
                                    <div class="form-group ">
                                        <div class="custom-control custom-checkbox shipping">
                                            <input class="custom-control-input" type="checkbox" name="shipping" id="shipping" value="<?php echo e($invoice->shipping_display); ?>" <?php echo e(($invoice->shipping_display==1)?'checked':''); ?>   data-url="<?php echo e(route('invoice.shipping.print',$invoice->id)); ?>">
                                            <label class="custom-control-label" for="shipping"><?php echo e(__('Print shipping address in invoice ?')); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="row mb-10">
                            <div class="col-lg-12">
                                <div class="text-right">
                                    <a href="#" data-url="<?php echo e(route('customer.invoice.send',$invoice->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Send Invoice')); ?>" class="btn btn-primary btn-action mr-1 float-right">
                                        <?php echo e(__('Send Mail')); ?>

                                    </a>
                                    <a href="<?php echo e(route('invoice.pdf', Crypt::encrypt($invoice->id))); ?>" target="_blank" class="btn btn-primary btn-action mr-1 float-right">
                                        <?php echo e(__('Print')); ?>

                                    </a>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2><?php echo e(__('Invoice')); ?></h2>
                                <div class="invoice-number"><?php echo e(AUth::user()->invoiceNumberFormat($invoice->invoice_id)); ?></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address class="font-style">
                                        <strong><?php echo e(__('Billed To')); ?>:</strong><br>
                                        <?php echo e(!empty($customer->billing_name)?$customer->billing_name:''); ?><br>
                                        <?php echo e(!empty($customer->billing_phone)?$customer->billing_phone:''); ?><br>
                                        <?php echo e(!empty($customer->billing_address)?$customer->billing_address:''); ?><br>
                                        <?php echo e(!empty($customer->billing_zip)?$customer->billing_zip:''); ?><br>
                                        <?php echo e(!empty($customer->billing_city)?$customer->billing_city:'' .', '); ?> <?php echo e(!empty($customer->billing_state)?$customer->billing_state:'',', '); ?> <?php echo e(!empty($customer->billing_country)?$customer->billing_country:''); ?>

                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong><?php echo e(__('Shipped To')); ?>:</strong><br>
                                        <?php echo e(!empty($customer->shipping_name)?$customer->shipping_name:''); ?><br>
                                        <?php echo e(!empty($customer->shipping_phone)?$customer->shipping_phone:''); ?><br>
                                        <?php echo e(!empty($customer->shipping_address)?$customer->shipping_address:''); ?><br>
                                        <?php echo e(!empty($customer->shipping_zip)?$customer->shipping_zip:''); ?><br>
                                        <?php echo e(!empty($customer->shipping_city)?$customer->shipping_city:'' . ', '); ?> <?php echo e(!empty($customer->shipping_state)?$customer->shipping_state:'' .', '); ?>,<?php echo e(!empty($customer->shipping_country)?$customer->shipping_country:''); ?>

                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <address>
                                        <strong><?php echo e(__('Status')); ?>:</strong><br>
                                        <?php if($invoice->status == 0): ?>
                                            <span class="badge badge-primary"><?php echo e(__(\App\Invoice::$statues[$invoice->status])); ?></span>
                                        <?php elseif($invoice->status == 1): ?>
                                            <span class="badge badge-warning"><?php echo e(__(\App\Invoice::$statues[$invoice->status])); ?></span>
                                        <?php elseif($invoice->status == 2): ?>
                                            <span class="badge badge-danger"><?php echo e(__(\App\Invoice::$statues[$invoice->status])); ?></span>
                                        <?php elseif($invoice->status == 3): ?>
                                            <span class="badge badge-info"><?php echo e(__(\App\Invoice::$statues[$invoice->status])); ?></span>
                                        <?php elseif($invoice->status == 4): ?>
                                            <span class="badge badge-success"><?php echo e(__(\App\Invoice::$statues[$invoice->status])); ?></span>
                                        <?php endif; ?>
                                    </address>
                                </div>
                                <div class="col-md-4 text-md-center">
                                    <address>
                                        <strong><?php echo e(__('Issue Date')); ?> :</strong><br>
                                        <?php echo e(\Auth::user()->dateFormat($invoice->issue_date)); ?><br><br>
                                    </address>
                                </div>
                                <div class="col-md-4 text-md-right">
                                    <address>
                                        <strong><?php echo e(__('Due Date')); ?> :</strong><br>
                                        <?php echo e(\Auth::user()->dateFormat($invoice->due_date)); ?><br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title"><?php echo e(__('Product Summary')); ?></div>
                            <p class="section-lead"><?php echo e(__('All items here cannot be deleted.')); ?></p>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40">#</th>
                                        <th><?php echo e(__('Product')); ?></th>
                                        <th class="text-center"><?php echo e(__('Quantity')); ?></th>
                                        <th class="text-center"><?php echo e(__('Tax')); ?> (%)</th>
                                        <?php if($invoice->discount_apply==1): ?>
                                            <th class="text-center"><?php echo e(__('Discount')); ?></th>
                                        <?php endif; ?>
                                        <th class="text-right"><?php echo e(__('Price')); ?></th>
                                    </tr>
                                    <?php $__currentLoopData = $iteams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$iteam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e(!empty($iteam->product())?$iteam->product()->name:''); ?></td>
                                            <td class="text-center"><?php echo e($iteam->quantity); ?></td>
                                            <td class="text-center"><?php echo e($iteam->tax); ?></td>
                                            <?php if($invoice->discount_apply==1): ?>
                                                <td class="text-center"><?php echo e(\Auth::user()->priceFormat($iteam->discount)); ?></td>
                                            <?php endif; ?>
                                            <td class="text-right"><?php echo e(\Auth::user()->priceFormat($iteam->price)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-3">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name"><?php echo e(__('Tax')); ?></div>
                                        <div class="invoice-detail-value"><?php echo e(\Auth::user()->priceFormat($invoice->getTotalTax())); ?></div>
                                    </div>
                                </div>
                                <?php if($invoice->discount_apply==1): ?>
                                    <div class="col-lg-3 text-center">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name"><?php echo e(__('Discount')); ?></div>
                                            <div class="invoice-detail-value"><?php echo e(\Auth::user()->priceFormat($invoice->getTotalDiscount())); ?></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-3 text-center">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name"><?php echo e(__('Sub Total')); ?></div>
                                        <div class="invoice-detail-value"><?php echo e(\Auth::user()->priceFormat($invoice->getSubTotal())); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-3 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name"><?php echo e(__('Total')); ?></div>
                                        <div class="invoice-detail-value invoice-detail-value-lg"><?php echo e(\Auth::user()->priceFormat($invoice->getTotal())); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">

                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name"><?php echo e(__('Paid')); ?></div>
                                        <div class="invoice-detail-value"><?php echo e(\Auth::user()->priceFormat(($invoice->getTotal()-$invoice->getDue())-($invoice->invoiceTotalCreditNote()))); ?></div>
                                    </div>

                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name"><?php echo e(__('Credit Note')); ?></div>
                                        <div class="invoice-detail-value"><?php echo e(\Auth::user()->priceFormat(($invoice->invoiceTotalCreditNote()))); ?></div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name"><?php echo e(__('Due')); ?></div>
                                        <div class="invoice-detail-value"><?php echo e(\Auth::user()->priceFormat($invoice->getDue())); ?></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title"><?php echo e(__('Payment Summary')); ?></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th class="text-center"><?php echo e(__('Amount')); ?></th>
                                        <th class="text-center"><?php echo e(__('Account')); ?></th>
                                        <th class="text-center"><?php echo e(__('Payment')); ?></th>
                                        <th class="text-center"><?php echo e(__('Reference')); ?></th>
                                        <th class="text-center"><?php echo e(__('Description')); ?></th>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete payment invoice')): ?>
                                            <th class="text-right"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                    <?php $__currentLoopData = $invoice->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(\Auth::user()->dateFormat($payment->date)); ?></td>
                                            <td class="text-center"><?php echo e(\Auth::user()->priceFormat($payment->amount)); ?></td>
                                            <td class="text-center"><?php echo e(!empty($payment->bankAccount)?$payment->bankAccount->bank_name.' '.$payment->bankAccount->holder_name:''); ?></td>
                                            <td class="text-center"><?php echo e(!empty($payment->paymentMethod)?$payment->paymentMethod->name:''); ?></td>
                                            <td class="text-center"><?php echo e($payment->reference); ?></td>
                                            <td class="text-center"><?php echo e($payment->description); ?></td>
                                            <td class="text-right">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete invoice product')): ?>
                                                    <a href="#!" class="btn btn-danger btn-action" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($payment->id); ?>').submit();">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <?php echo Form::open(['method' => 'post', 'route' => ['invoice.payment.destroy',$invoice->id,$payment->id],'id'=>'delete-form-'.$payment->id]); ?>

                                                    <?php echo Form::close(); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title"><?php echo e(__('Credit Note Summary')); ?></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th class="text-center"><?php echo e(__('Amount')); ?></th>
                                        <th class="text-center"><?php echo e(__('Description')); ?></th>
                                        <?php if(Gate::check('edit credit note') || Gate::check('delete credit note')): ?>
                                            <th class="text-right"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                    <?php $__currentLoopData = $invoice->creditNote; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$creditNote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(\Auth::user()->dateFormat($creditNote->date)); ?></td>
                                            <td class="text-center"><?php echo e(\Auth::user()->priceFormat($creditNote->amount)); ?></td>
                                            <td class="text-center"><?php echo e($creditNote->description); ?></td>
                                            <td class="text-right">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit credit note')): ?>
                                                    <a data-url="<?php echo e(route('invoice.edit.credit.note',[$creditNote->invoice,$creditNote->id])); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Add Credit Note')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Credit Note')); ?>" href="#" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete credit note')): ?>
                                                    <a href="#!" class="btn btn-danger btn-action " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($creditNote->id); ?>').submit();">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => array('invoice.delete.credit.note', $creditNote->invoice,$creditNote->id),'id'=>'delete-form-'.$creditNote->id]); ?>

                                                    <?php echo Form::close(); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/accgo/resources/views/invoice/view.blade.php ENDPATH**/ ?>