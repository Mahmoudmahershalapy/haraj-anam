<?php $__env->startSection('title'); ?>
    التحكم بالعمولات
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
            <li class="classic-menu-dropdown">
                <a data-target="#addCat" data-toggle="modal">إضافة عمولة جديد
                    <i class="fa fa-angle-down"></i>
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
                <a href="#">العمولات</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a data-target="#addCat" data-toggle="modal">إضافة عمولة جديد</a>
                <i class="fa fa-angle-down"></i>
            </li>
        </ul>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.commission.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption col-md-9">
                            <span><i class="icon-map"></i> عرض العمولات</span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                            <tr>
                                <th>
                                    م
                                </th>
                                <th>
                                    قسم العمولة
                                </th>
                                <th>
العمولة
                                </th>
                                <th>
                                    الأدوات
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $commissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             
                             

                                    <tr>
                                        <td><?php echo e($num++); ?></td>
                                        <td><?php echo e($commission->cat ? $commission->cat->name : 'بدون قسم'); ?></td>
                                        <td><?php echo e($commission->commission); ?></td>
                                        <td>
                                            <a href="<?php echo e(url('/admincp/commission/'.$commission->id.'/edit')); ?>" class="btn btn-success"><i class="fa fa-edit"></i> تعديل </a>
                                        </td>
                                                <td>
                                                <a href="<?php echo e(url('/admincp/commission/'.$commission->id.'/delete')); ?>" class="btn btn-danger"><i class="fa fa-edit"></i> حذف </a>
                                            </td>
                                    </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->

<?php $__env->stopSection(); ?>

<!-- footer -->
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/moltaqa/public_html/haraj-animals/resources/views/admin/commission/index.blade.php ENDPATH**/ ?>