<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(URL::to('/')); ?>/user/<?php echo e($user->username); ?></loc>
            <lastmod><?php echo e($user->created_at); ?></lastmod>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset><?php /**PATH /home/gotemplate/public_html/resources/views/sitemap/users.blade.php ENDPATH**/ ?>