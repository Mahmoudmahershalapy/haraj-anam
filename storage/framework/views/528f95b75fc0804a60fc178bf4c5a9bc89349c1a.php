<?php $__env->startSection('content'); ?>
<div class="singlePage container rest-password">
    <h3>إسترجاع الرقم السرى</h3>
    <span id="output"></span>
    <br> <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
    <form method="post" method="POST" action="<?php echo e(route('password.request')); ?>" style="border: 1px solid #eee; margin: 0 auto; padding: 10px">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="token" value="<?php echo e($token); ?>">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <input id="email" class="form-control" type="hidden" placeholder="أكتب بريدك الإلكترونى" name="email" value="<?php echo e($email); ?>" required autofocus>
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <input id="password" type="password" class="form-control" name="password" placeholder="الرقم السرى الجديد" value="" required>
                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="تأكيد الرقم السرى" value="" required>
                <?php if($errors->has('password_confirmation')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <input id="chgpwdSubmit" class="button chgpwdSubmit" type="submit" value="تغيير" style="min-width: 150px; font-size: 16px;">
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/moltaqa/public_html/haraj-animals/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>