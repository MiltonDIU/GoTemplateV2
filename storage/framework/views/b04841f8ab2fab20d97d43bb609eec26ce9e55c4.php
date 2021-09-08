<ul class="dd">
   <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <li>
            <a class="fly" tabindex="1" href="<?php echo e(URL::to('/shop/subcategory/')); ?>/<?php echo e($parent->subcat_id); ?>/<?php echo e($parent->subcategory_slug); ?>">
               <?php echo e($parent->subcategory_name); ?>

               <?php if($parent->subChildren->isNotEmpty()): ?>
                   <i class="fa fa-angle-right ml-1 md-hide-element"></i>
                   <i class="fa fa-angle-down ml-1 md-show-element"></i>
                <?php endif; ?>
            </a>

            <?php if($parent->subChildren->isNotEmpty()): ?>
               <?php echo $__env->make('sub-menu', [
                   'childs' => $parent->subChildren
               ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
       </li>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH C:\xampp7.3.27.0\htdocs\gotemplate_v2\resources\views/sub-menu.blade.php ENDPATH**/ ?>