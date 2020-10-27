<?php echo e(csrf_field()); ?>

<div class="form-body">
 
 
                     <div class="form-group<?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <label class="col-md-2 control-label">إسم القسم الرئيسى  </label>
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
        
        


<option value="<?php echo e($category->id); ?>"> <?php echo e($category->name); ?> </option>


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
    


 
 
   <div class="form-group">
        <label class="col-md-2 control-label"> العمولة</label>
        <div class="col-md-9">
           <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-map-marker"></i>
                </span>

                                <textarea required class="form-control" name="commission" rows="4" cols="50"></textarea>
            </div>
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
<?php /**PATH /home/moltaqa/public_html/haraj-animals/resources/views/admin/commission/form.blade.php ENDPATH**/ ?>