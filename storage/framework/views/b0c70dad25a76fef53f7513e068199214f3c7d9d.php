

<?php $__env->startSection('header'); ?>


<?php $__env->startSection('content'); ?>
<div class="singlePage">
    <h4>رسالة خاصة</h4>
    <br>
    <a href="javascript: history.go(-1)">رجوع</a>
    <br>
    <div class="adsx">
    <?php if(count($messages)): ?>
    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($msg->user_id != Auth::user()->id): ?>
    <div class="msgConv">
        <div class="msgHeader">
            <b>رد <?php echo e($num); ?> : رسالة خاصة إلى <?php echo e($msg->UserTo->name); ?></b>
            <br> المرسل:
            <a href="<?php echo e(url('users/'.$msg->UserTo->id)); ?>" class="username"> <i class="fa fa-user"></i> <?php echo e($msg->User->name); ?></a>
            <br> قبل : <?php echo e(timeToStr(strtotime($msg->created_at))); ?>

        </div>
        <div class="msgBody">
            <?php echo e($msg->body); ?>

            <div style="clear:both;"></div>
            <span style="float: left;"></span>
            <div style="clear:both;"></div>
        </div>
    </div>

    <?php else: ?>

    <div class="msgConv to_pm">
        <div class="msgHeader">
            <b>رد <?php echo e($num); ?> : رسالة خاصة إلى <?php echo e($msg->UserTo->name); ?></b>
            <br> المرسل:
            <a href="<?php echo e(url('users/'.$msg->User->id)); ?>" class="username"> <i class="fa fa-user"></i> <?php echo e($msg->User->name); ?></a>
            <br> قبل: <?php echo e(timeToStr(strtotime($msg->created_at))); ?>

            <span style="float: left;"> 
                </span>
        </div>
        <div class="msgBody">
            <?php echo e($msg->body); ?>

            <div style="clear:both;"></div>
            <span style="float: left;">
                <span class="<?php echo e($msg->status == 0 ? 'blue' : ''); ?>"> <i class="fa fa-check"></i><i class="fa fa-check"></i></span>
            </span>
            <div style="clear:both;"></div>
        </div>
    </div>
    <?php endif; ?>
    <?php $num++; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
        <div class="alert"> لا توجد رسائل </div>
    <?php endif; ?>

    <div class="alert alert-warning">
        لاتنسى البحث في <a href="<?php echo e(url('checkacc')); ?>">القائمة السوداء</a> قبل أي عملية تحويل بنكي.
    </div>
    <br>
    <br>
    <div class="well">
        <form action="" method="post" id="postform" name="postform">
            <?php echo e(csrf_field()); ?>

            <textarea name="body" id="msgBody" placeholder="أكتب ردك هنا" class="form-control" rows="7"></textarea>
            <input type="hidden" name="user_to" value="<?php echo e($id); ?>">
            <br>
            <input class="btn btn-primary" id="sendMsg" name="submit" value="إرســـال" type="submit">
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>
<!--<script src="https://js.pusher.com/4.1/pusher.min.js"></script>-->

<script type="text/javascript">
// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('34b9ea6826c359c41c3f', {
    cluster: 'eu',
    encrypted: true
});

var channel = pusher.subscribe('Messages');
channel.bind('msgSend<?php echo e($id); ?>msgReceive<?php echo e(Auth::user()->id); ?>', function(data) {
    $('.adsx').append(data.html);
    $("html,body").animate({scrollTop: $('.adsx')[0].scrollHeight}, 0);
});


$('#msgBody').keydown(function (e){
    if(e.keyCode==13 && !e.shiftKey){
        $('#sendMsg').click();
    }
});

// follow Post
$(document).on('click','#sendMsg', function (e) {
    e.preventDefault();
    var url     = '<?php echo e(url("sendMsg/".$id)); ?>',
    data    = $('#postform').serialize();
    if($('#msgBody').val() == ""){
        alert('فضلا قم بكتابة نص');
        $(this).focus();
        return false;
    }
    $.post(url,data,function (data) {
        if(data != ''){
            $('.adsx').append(data.html);
            $('#msgBody').val('');
            $("html,body").animate({scrollTop: $('.adsx')[0].scrollHeight}, 0);
        }else{
            toastr.options.timeOut = '6000';
            toastr.options.positionClass = 'toast-bottom-left';
            Command: toastr["error"]("حدث خطأ يرجة المحاوله فى وقت لاحق");
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/moltaqa/public_html/haraj-animals/resources/views/site/messages/conv.blade.php ENDPATH**/ ?>