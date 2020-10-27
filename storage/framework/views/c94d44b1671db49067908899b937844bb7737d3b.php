<?php $__env->startSection('title'); ?>
	تعديل العمولة <?php echo e($commission->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('megaMenu'); ?>
		<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
			<ul class="nav navbar-nav">
				<!-- DOC: Remove data-hover="megadropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
	            <li class="classic-menu-dropdown" aria-haspopup="true">
	                <a href="<?php echo e(url('admincp')); ?>"> رئيسية لوحة التحكم
	                    <i class="fa fa-angle-left"></i>
	                </a>
	            </li>
	            <li class="classic-menu-dropdown active">
	                <a>
	                    العمولات <span class="selected">
	                    </span>
	                    <i class="fa fa-angle-left"></i>
	                </a>
	            </li>
				<li class="classic-menu-dropdown active">
					<a href="<?php echo e(url('/admincp/commission/'.$commission->id.'/edit')); ?>">
					تعديل العمولة / <?php echo e($commission->name); ?>

					<span class="selected"></span>
					</a>
				</li>
			</ul>
		</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageHeader'); ?>
			<div class="page-bar hidden-md hidden-lg">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo e(url('/admincp')); ?>">الرئيسية</a>
						<i class="fa fa-angle-left"></i>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo e(url('/admincp/commission')); ?>">العمولات</a>
						<i class="fa fa-angle-left"></i>
					</li>
					<li>
						<i class="fa fa-home"></i>
						<a href="<?php echo e(url('/admincp/commission/'.$commission->id.'/edit')); ?>">تعديل العمولة / <?php echo e($commission->name); ?></a>
						<i class="fa fa-angle-left"></i>
					</li>
				</ul>
			</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content">
  <div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
      <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption col-md-9">
                <span>تعديل العمولة <?php echo e($commission->name); ?></span>
            </div>
        </div>
        <div class="portlet-body form form-horizontal" role="form">
	                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('admincp/commission/'.$commission->id.'/update')); ?>"  enctype="multipart/form-data">



<?php echo e(csrf_field()); ?>

<div class="form-body">
   
   

       
            
            
                    <div class="form-group<?php echo e($errors->has('category_id') ? 'has-error' : ''); ?>">
                        <label class="col-md-2 control-label">اختر القسم الرئيسي</label>
                        <div class="col-md-9">
                           <div class="input-group">
                                <span class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                                </span>
              <select required name="category_id" class="form-control">  
                

<?php
$maincommissions = \App\Cat::where('parent_id',null)->get();

?>



 <?php $__currentLoopData = $maincommissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        


<option <?php echo e($category->id == $commission->category_id ? 'selected' : ''); ?> value="<?php echo e($category->id); ?>"> <?php echo e($category->name); ?> </option>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </select>
            </div>
            <?php if($errors->has('parent_id')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('category_id')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    
    
  

                    <div class="form-group<?php echo e($errors->has('commission') ? 'has-error' : ''); ?>">
        <label class="col-md-2 control-label"> العمولة</label>
        <div class="col-md-9">
           <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-map-marker"></i>
                </span>

                                <textarea required class="form-control" name="commission" rows="4" cols="50"><?php echo e($commission->commission); ?> </textarea>
            </div>
              <?php if($errors->has('name')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('commission')); ?></strong>
                </span>
            <?php endif; ?>
                    </div>
    </div>
       
            
         


    

    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn green"> تنفيذ </button>
            </div>
        </div>
    </div>
</div>









</form>        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/moltaqa/public_html/haraj-animals/resources/views/admin/commission/edit.blade.php ENDPATH**/ ?>