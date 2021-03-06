

<?php $__env->startSection('title'); ?>
	إضافة إعلان جديد
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <?php echo HTML::style('public/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'); ?>

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
        <li class="classic-menu-dropdown">
          <a href="<?php echo e(url('admincp/posts')); ?>">
          الإعلانات <span class="selected">
          </span>
          <i class="fa fa-angle-left"></i>
          </a>
        </li>
		<li class="classic-menu-dropdown active">
			<a>
			إضافة إعلان جديد
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
						<a href="<?php echo e(url('admincp/posts')); ?>">الإعلانات</a>
						<i class="fa fa-angle-left"></i>
					</li>
				</ul>
			</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
  		<div class="tabbable-line">
        	<div class="portlet box blue">
          		<div class="portlet-title">
            		<div class="caption col-md-9">
            			إضافة إعلان جديد
            		</div>
          		</div>
          		<div class="portlet-body">
                    <?php if(session()->has('succss')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
          			<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('admincp/posts')); ?>" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>            			
                  <?php echo $__env->make('admin.posts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  </form>
          		</div>
        	</div>
		</div>
  	</div>
</div>
<!-- END PAGE CONTENT-->

<?php $__env->stopSection(); ?>




<!-- footer -->
<?php $__env->startSection('footer'); ?>
  <?php echo HTML::script('public/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'); ?>

<script type="text/javascript">


function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});












$(document).ready(function(){

<?php if($errors->has('brand') || $errors->has('model')): ?>
  $('#carDiv').show();
<?php endif; ?>
});
//================= Category ====================
$('#select12').prop('disabled', true);

$(document).on("change","#select11",function() {

  if ($(this).data('options') == undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
    $(this).data('options', $('#select12 option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[value1=' + id + ']');
  $('#select12').html(' ');
  $('#select12').append('<option disabled selected value="#">أختر القسم</option>');
  $('#select12').append(options);

  if(id != "#") {
    $('#select12').prop('disabled', false);
  }
  if($('#select11').val() != 1){
  	    $('#carDiv').hide();
  }
});

$(document).on("change","#select12",function() {

  if ($(this).data('options') == undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
    $(this).data('options', $('#select13 option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[value2=' + id + ']');
  $('#select13').html(' ');
  $('#select13').append('<option disabled selected value="#">أختر ماركة السياره</option>');
  $('#select13').append(options);

  if($('#select11').val() == 1) {
    $('#carDiv').show();
  }
});

//============== Area ==================================
$('#select22').prop('disabled', true);

$(document).on("change","#select21",function() {

  if ($(this).data('options') == undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
    $(this).data('options', $('#select22 option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[value1=' + id + ']');
  $('#select22').html(' ');
  $('#select22').append('<option disabled selected value="#">أختر المنطقه</option>');
  $('#select22').append(options);

  if(id != "#") {
    $('#select22').prop('disabled', false);
  }
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/moltaqa/public_html/haraj-animals/resources/views/admin/posts/add.blade.php ENDPATH**/ ?>