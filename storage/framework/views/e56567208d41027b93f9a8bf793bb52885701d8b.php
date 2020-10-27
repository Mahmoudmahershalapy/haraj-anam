

<?php $__env->startSection('title'); ?>
تغير الرقم السرى
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="singlePage container">
<span id="output"></span>
<br>
<?php if($allowed == 1): ?>
  <form method="post" id="updateMobileForm" enctype="multipart/form-data" style="border: 1px solid #eee; margin: 0 auto; padding: 10px">
<div class="alert alert-info">ملاحظة : لن يمكنك تغيير رقم الجوال مره أخرى إلا بعد مرور <?php echo e(getSettings('updatemobile')); ?> شهور على آخر تغيير.</div>
    <?php echo e(csrf_field()); ?>

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <input class="form-control" type="text" placeholder="أكتب رقم الجوال الحديث" name="phone" value="">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12 col-md-12">
            <input id="updateMobileSubmit" class="button updateMobileSubmit" type="submit" value="تغيير" style="width: 10%; font-size: 16px;">
        </div>
    </div>
  </form>
<?php else: ?>
<div class="alert alert-info">
لايمكن تغيير رقم الجوال إلا بعد مرور <?php echo e(getSettings('updatemobile')); ?> شهور على آخر تغيير.
</div>
<?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
  $(document).on("click","#updateMobileSubmit",function(e) {
    var done = true;
    if($('input[name=phone]').val() == ""){
      alert('فضلا ' + $('input[name=phone]').attr('placeholder'));
      $('input[name=phone]').focus();
      return done = false;
    }
    if(done == true){
      updateMobileSubmit(e);
    }else{
      return done;
    }
  });

// notifi for mail
function updateMobileSubmit (e) {
    e.preventDefault();
    var url     = '<?php echo e(url("updatemobile")); ?>',
        data    = $('#updateMobileForm').serialize(),
        a=$(this);
    $.post(url,data,function (data) {
        if(data == 'done'){
          $('input[name=phone]').val('');
          $('#output').append('<div class="alert alert-success">تم تحديث رقم الجوال بنجاح</div>');
          $('#updateMobileForm').hide()
          $('#output').append('<div class="alert alert-info">لايمكن تغيير رقم الجوال إلا بعد مرور <?php echo e(getSettings("updatemobile")); ?> شهور على آخر تغيير.</div>');
        }else if(data == 'same'){
          alert('رقم الجوال المكتوب مطابق للموجود حاليا لدينا .. فضلا أكتب رقم جديد');
          $('input[name=phone]').val('');
          $('input[name=phone]').focus();
        }else{
          $('#output').append('<div class="alert alert-danger">حدث خطأ نرجو المحاولة فى وقت لاحق</div>');
        }
    });
};
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/moltaqa/public_html/haraj-animals/resources/views/site/users/updatemobile.blade.php ENDPATH**/ ?>