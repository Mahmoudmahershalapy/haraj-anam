


<?php $__env->startSection('title'); ?>
تغير مسمى العضويه
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="singlePage container">
  <h3>تغيير مسمى العضوية</h3>
<span id="output"></span>
<br>
    <?php
        $user = auth()->user();
        $now = date('Y-m-d');
        $after_month = strtotime("+1 months", strtotime($now));
    
    ?>
    <?php if($after_month < $now ||$user->updated_at > $after_month): ?>
  <form method="post" id="updateNameForm" enctype="multipart/form-data" style="border: 1px solid #eee; margin: 0 auto; padding: 10px">
    <?php echo e(csrf_field()); ?>

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <input class="form-control" type="text" placeholder="أكتب إسم العضويه الجديد" name="name" value="">
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
<br> لايمكن تغير مسمي العضويه الا بعد شهر من اخر تعديل له  </div>

</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<script type="text/javascript">
  $(document).on("click","#updateMobileSubmit",function(e) {
    var done = true;
    if($('input[name=name]').val() == ""){
      alert('فضلا ' + $('input[name=name]').attr('placeholder'));
      $('input[name=name]').focus();
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
    var url     = '<?php echo e(url("updatename")); ?>',
        data    = $('#updateNameForm').serialize(),
        a=$(this);
    $.post(url,data,function (data) {
        if(data == 'done'){
          $('input[name=name]').val('');
          $('#updateNameForm').hide()
          $('#output').append('<div class="alert alert-info">تم تغير اسم العضويه بنجاح.</div>');
        }else if(data == 'same'){
          alert('إسم العضويه المكتوب مطابق للموجود حاليا .. فضلا أكتب إسم جديد');
          $('input[name=name]').val('');
          $('input[name=name]').focus();
        }else{
          $('#output').append('<div class="alert alert-danger">حدث خطأ نرجو المحاولة فى وقت لاحق</div>');
        }
    });
};
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/moltaqa/public_html/haraj-animals/resources/views/site/users/updatename.blade.php ENDPATH**/ ?>