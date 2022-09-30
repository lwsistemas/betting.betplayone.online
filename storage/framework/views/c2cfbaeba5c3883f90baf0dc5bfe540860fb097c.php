<?php $__env->startSection('title', trans($title)); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="card col-md-3 ms-3">
            <div class="payment-info text-center">
                <ul class="list-group">
                    <li class="list-group-item font-weight-bold bg-transparent">
                        <img
                            src="<?php echo e(getFile(config('location.withdraw.path').optional($withdraw->method)->image)); ?>"
                            class="card-img-top w-50" alt="<?php echo e(optional($withdraw->method)->name); ?>">
                    </li>
                    <li class="list-group-item bg-transparent"><?php echo app('translator')->get('Request Amount'); ?> :
                        <span
                            class="float-right text-success"><?php echo e(@$basic->currency_symbol); ?><?php echo e(getAmount($withdraw->amount)); ?> </span>
                    </li>
                    <li class="list-group-item bg-transparent"><?php echo app('translator')->get('Charge Amount'); ?> :
                        <span
                            class="float-right text-danger"><?php echo e(@$basic->currency_symbol); ?><?php echo e(getAmount($withdraw->charge)); ?> </span>
                    </li>
                    <li class="list-group-item bg-transparent"><?php echo app('translator')->get('Total Payable'); ?> :
                        <span
                            class="float-right text-danger"><?php echo e(@$basic->currency_symbol); ?><?php echo e(getAmount($withdraw->net_amount)); ?> </span>
                    </li>
                    <li class="list-group-item bg-transparent"><?php echo app('translator')->get('Available Balance'); ?> :
                        <span
                            class="float-right text-success"><?php echo e(@$basic->currency_symbol); ?><?php echo e($remaining); ?> </span>
                    </li>
                </ul>
            </div>

        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header custom-header text-center">
                    <h5 class="card-title"><?php echo app('translator')->get('Additional Information To Withdraw Confirm'); ?></h5>
                </div>
                <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data" class="form-row text-left preview-form">
                        <?php echo csrf_field(); ?>
                        <?php if(optional($withdraw->method)->input_form): ?>
                            <?php $__currentLoopData = $withdraw->method->input_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($v->type == "text"): ?>
                                    <div class="col-md-12">
                                        <label><strong><?php echo e(trans($v->field_level)); ?> <?php if($v->validation == 'required'): ?>
                                                    <span class="text-danger">*</span>
                                                <?php endif; ?></strong></label>
                                        <div class="form-group input-box  mt-2">
                                            <input type="text" name="<?php echo e($k); ?>"
                                                   class="form-control"
                                                   <?php if($v->validation == "required"): ?> required <?php endif; ?>>
                                            <?php if($errors->has($k)): ?>
                                                <span
                                                    class="text-danger"><?php echo e(trans($errors->first($k))); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php elseif($v->type == "textarea"): ?>
                                    <div class="col-md-12">
                                        <label><strong><?php echo e(trans($v->field_level)); ?> <?php if($v->validation == 'required'): ?>
                                                    <span class="text-danger">*</span>
                                                <?php endif; ?>
                                            </strong></label>
                                        <div class="form-group input-box">
                                            <textarea name="<?php echo e($k); ?>" class="form-control" rows="3"
                                                      <?php if($v->validation == "required"): ?> required <?php endif; ?>></textarea>
                                            <?php if($errors->has($k)): ?>
                                                <span class="text-danger"><?php echo e(trans($errors->first($k))); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php elseif($v->type == "file"): ?>

                                    <div class="col-md-12">
                                        <label><strong><?php echo e(trans($v->field_level)); ?> <?php if($v->validation == 'required'): ?>
                                                    <span class="text-danger">*</span>
                                                <?php endif; ?>
                                            </strong></label>

                                        <div class="form-group mt-2">
                                            <div class="fileinput fileinput-new " data-provides="fileinput">
                                                <div class="fileinput-new thumbnail withdraw-thumbnail"
                                                     data-trigger="fileinput">
                                                    <img class="wh-200-150"
                                                         src="<?php echo e(getFile(config('location.default'))); ?>"
                                                         alt="...">
                                                </div>
                                                <div
                                                    class="fileinput-preview fileinput-exists thumbnail wh-200-150"></div>

                                                <div class="img-input-div">
                                                                <span class="btn btn-info btn-file">
                                                                    <span
                                                                        class="fileinput-new "> <?php echo app('translator')->get('Select'); ?> <?php echo e($v->field_level); ?></span>
                                                                    <span
                                                                        class="fileinput-exists"> <?php echo app('translator')->get('Change'); ?></span>
                                                                    <input type="file" name="<?php echo e($k); ?>" accept="image/*"
                                                                           <?php if($v->validation == "required"): ?> required <?php endif; ?>>
                                                                </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput"> <?php echo app('translator')->get('Remove'); ?></a>
                                                </div>

                                            </div>
                                            <?php if($errors->has($k)): ?>
                                                <br>
                                                <span
                                                    class="text-danger"><?php echo e(__($errors->first($k))); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <div class="col-md-12 mt-4">
                            <div class=" form-group">
                                <button type="submit" class="btn-custom">
                                    <span><?php echo app('translator')->get('Confirm Now'); ?></span>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset($themeTrue.'css/bootstrap-fileinput.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('extra-js'); ?>
    <script src="<?php echo e(asset($themeTrue.'js/bootstrap-fileinput.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>


<?php echo $__env->make($theme.'layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\betting.betplayone.online\resources\views/themes/betting/user/payout/preview.blade.php ENDPATH**/ ?>