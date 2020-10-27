<?php $__env->startSection('header'); ?>
<style>
	span {
		position: relative;
		bottom: 8px;
		right: 49px;
		font-size: 16px;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="add-1 container">
	<br>
	<div class="singleContent">
		<?php if(session()->has('success')): ?>
			<div class="alert alert-success">
				<?php echo e(session('success')); ?>

			</div>
		<?php endif; ?>
		<h3> »  إضافة إعلان جديد</h3>
		<br>
		<form action="add" method="get">
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="1" checked><a href="<?php echo e(url('add?sec=1')); ?>">عرض سيارة للبيع </a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="1" ><a href="<?php echo e(url('add?sec=1')); ?>">عرض سيارة للايجار </a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="1"> <a href="<?php echo e(url('add?sec=1')); ?>"> عرض شاحنة أو معدات  للبيع</a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="1"> <a href="<?php echo e(url('add?sec=1')); ?>"> عرض شاحنة أو معدات  للايجار</a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="1"> <a href="<?php echo e(url('add?sec=1')); ?>">عرض دباب للبيع</a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="1"> <a href="<?php echo e(url('add?sec=1')); ?>">عرض خدمات سيارات أو قطع غيار جديد أو إكسسوارات سيارات للبيع</a>-->
			<!--</label>-->
	<?php $__currentLoopData = \App\Cat::WhereNull('parent_id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


			<label class="radio">
				<input type="radio" name="sec" value="1"> <a href="<?php echo e(url('add?sec=1&cat='.$cat->id)); ?>"><?php echo e($cat->name); ?></a>
			</label>


			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
			
	  <!--      <label class="radio">-->
			<!--	<input type="radio" name="sec" value="2"> <a href="<?php echo e(url('add?sec=2&cat=2')); ?>">عرض عقار للبيع</a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="2"> <a href="<?php echo e(url('add?sec=2&cat=2')); ?>">عرض عقار للإيجار</a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="3"> <a href="<?php echo e(url('add?sec=4&cat=3')); ?>">عرض خدمات الاجهزة </a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=4')); ?>">عرض خدمات المواشي والحيوانات </a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=544')); ?>">عرض خدمات مكاتب المحاماة ومكاتب التعقيب </a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=553')); ?>">عرض خدمات المشاريع والمقاولات  </a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=540')); ?>">عرض خدمات الاثاث </a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=551')); ?>">المنتوجات الزراعيه العضويه </a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=549')); ?>">عرض خدمات المنتوجات الزراعيه</a><span>...(اخي الكريم لايسمح بعرض اي منتج غير عضوي هنا من غشنا فليس منا) </span>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=552')); ?>">عرض خدمات المستلزمات الشخصيه </a> <span class="red">...(مستلزمات رجاليه - مستلزمات نسائيه ) </span>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=546')); ?>">عرض خدمات الحج والعمرة </a> <span class="red">...(فنادق-حملات -باصات-مطاعم-وجبات-خدمات توصيل -مستلزمات اخري للحج والعمرة ) </span>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=557')); ?>">عرض خدمات الوظائف </a> <span class="red">...(عرض وظائف شاغرة - طلب وظيفه ) </span>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=558')); ?>">عرض خدمات نقل العفش والنظافه </a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=560')); ?>">عرض خدمات التمويل </a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=561')); ?>">عرض خدمات الديكورات </a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=562')); ?>">عرض خدمات الرحلات البريه والبحريه والالعاب الترفيهيه </a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=559')); ?>">عرض خدمات التشاليح </a><span> .... بيع سيارات مصدومه-عطلانه-قطع غيار مستعمل</span>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4&cat=606')); ?>">عرض خدمات السكراب </a><span> ....حديدثقيل وخفيف - نحاس - الالمونيوم- البطاريات- البلاستيك - الورق </span>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="3"> <a href="<?php echo e(url('add?sec=3')); ?>">عرض سلعه للبيع - سلعه غير مصنفه أعلاه</a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="3"> <a href="<?php echo e(url('add?sec=3')); ?>">عرض سلعه للايجار - سلعه غير مصنفه أعلاه</a>-->
			<!--</label>-->
			<!--<label class="radio">-->
			<!--	<input type="radio" name="sec" value="4"> <a href="<?php echo e(url('add?sec=4')); ?>">طلب سلعه</a>-->
			<!--</label>-->
			<button type="submit" class="button btn-lg btn-success">إستمرار »</button>
		</form>
		<br>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/moltaqa/public_html/haraj-animals/resources/views/site/posts/add/add.blade.php ENDPATH**/ ?>