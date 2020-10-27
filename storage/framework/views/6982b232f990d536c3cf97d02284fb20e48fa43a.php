

<?php $__env->startSection('title'); ?>
عضوية المميزة
<?php $__env->stopSection(); ?>

<?php $page = app('\App\Page'); ?>
<?php $__env->startSection('content'); ?>
<div class="singleContent container">
<?php echo $page->where('pLink','memberUp')->first()->content; ?>

	<a href="<?php echo e(url('commission?plan=1')); ?>" class="button btn-lg " role="button" style="padding-bottom: 10px;padding-top: 10px;">الاشتراك الآن لمدة 6 شهور</a>
	<a href="<?php echo e(url('commission?plan=2')); ?>" class="button btn-lg " role="button" style="padding-bottom: 10px;padding-top: 10px;">الاشتراك الآن لمدة سنة</a>
	<br><br>
<?php echo $page->where('pLink','memberDown')->first()->content; ?>

</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/moltaqa/public_html/haraj-animals/resources/views/site/pages/member.blade.php ENDPATH**/ ?>