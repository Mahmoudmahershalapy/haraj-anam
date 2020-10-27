

<?php $__env->startSection('title'); ?>
    تغير المدينه
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12 ">
            <br /> <br /> <br />
        </div>

<form action="<?php echo e(url('changeCity')); ?>" method="post">
    <div class="col-md-6 col-md-pull-3">
        <h4 style="text-align: center">اختر الدولة</h4>
        <select class="form-control area-change" name="country" data-level="country">
            <option value="" >اختر دولتك </option>
            <?php
                $user_country = Auth::user()->country;
                $user_country = ($user_country !="" && !is_null($user_country ))? $user_country: false;
                $user_city = Auth::user()->city;
                $user_city = ($user_country && $user_city !="" && !is_null($user_city ))? $user_city: false;
            ?>
            <?php $__currentLoopData = \App\Area::where('parent_id','=',0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($area->id); ?>" <?php if($user_country && ($user_country == $area->id)): ?> selected <?php endif; ?>><?php echo e($area->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <br />
        <h4 style="text-align: center">اختر المدينة</h4>
        <select class="form-control area-change" name="city" data-level="city">
            <option value="" >اختر مدينتك </option>
            <?php if( $user_city ): ?>
                <?php $__currentLoopData = \App\Area::where('parent_id','=',$user_country)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($area->id); ?>" <?php if($user_city == $area->id): ?> selected <?php endif; ?>><?php echo e($area->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
        <input type="submit" class="btn btn-primary" value="تغير">
    </div>
</form>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<script>
jQuery(document).ready(function ($) {

    $(document).on('change', ".area-change",function ()
    {
        if( $(this).data('level') == 'country' ) {
            var id			= $(this).val(),
                nextLevel	= ".area-change[data-level=city]",
                nextMsg		= 'اختر مدينتك';
            $.ajax({
                method: "GET",
                type: "json",
                url: "<?php echo e(route('get-child')); ?>",
                data: {id: id},
                success: function (response) {
                    //console.log(response);
                    if (response.status) {
                        $(nextLevel).empty().show().append('<option value="">' + nextMsg + '</option>');

                        $.each(response.result, function (key, value) {
                            $(nextLevel).append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                    else {
                        console.log(response);
                    }
                }
            });
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/moltaqa/public_html/haraj-animals/resources/views/site/users/changecity.blade.php ENDPATH**/ ?>