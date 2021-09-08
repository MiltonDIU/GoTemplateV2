<!-- Received array of $list and $headline -->
<section class="hero-area bgimage hero-area--h200">
  <div class="bg_image_holder">
    <img src="<?php echo e(url('/')); ?>/public/assets/images/double-bubble-outline.png" alt="<?php echo e($allsettings->site_title); ?>">
  </div>
  <div class="bg-overlay--breadcrumb"></div>

  <div class="hero-content content_above contact-hero" style="text-align: unset;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb">
            <ul>
              <li>
                  <a href="<?php echo e(URL::to('/')); ?>"><?php echo e(Helper::translation(2862,$translate)); ?></a>
              </li>

              <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($item['path'])): ?>
                  <li>

                      <?php echo e(gettype($item['text']) == "integer" ? Helper::translation($item['text'], $translate) : $item['text']); ?>


                  </li>
                <?php else: ?>
                  <li>
                    <?php echo e(gettype($item['text']) == "integer" ? Helper::translation($item['text'], $translate) : $item['text']); ?>

                  </li>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
          <h1 class="page-title text-white">
            <?php echo e(gettype($headline) == "integer" ? Helper::translation($headline, $translate) : $headline); ?>

          </h1>
        </div>
      </div>
    </div>
  </div>
</section>
<?php /**PATH C:\xampp7.3.27.0\htdocs\gotemplate_v2\resources\views///components/hero.blade.php ENDPATH**/ ?>