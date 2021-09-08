<script>
  window.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOM fully loaded and parsed');

    $(".video-modal").click(e => {
      e.preventDefault();
      e.stopPropagation();

      const videoUrl = $(e.target).closest('span').attr('data-video-url') || false;
      const videoFile = $(e.target).closest('span').attr('data-video-file') || false;
      const videoPreviewType = $(e.target).closest('span').attr('data-preview-type') || false;
      const itemPreview = $(e.target).closest('span').attr('data-item-preview') || false;

      let finalElm = ``;

      if (videoPreviewType && videoPreviewType != '') {
        if (videoPreviewType == 'youtube') {
          if (videoUrl && videoUrl != '') {
            const videoId = videoUrl.split('?v=')[1];
            const srcUrl = `https://www.youtube.com/embed/${videoId}?rel=0&version=3&loop=1&playlist=${videoId}`;

            finalElm = `
                                <iframe 
                                    width="100%" 
                                    height="230" 
                                    src="${srcUrl}" 
                                    frameborder="0" 
                                    allow="autoplay" 
                                    scrolling="no"
                                ></iframe>
                            `;
          } else {
            const srcUrl = `<?php echo e(url('/')); ?>/resources/views/assets/no-video.png`;
            finalElm = `<img src="${srcUrl}" alt="Item Name">`;
          }
        } else if (videoPreviewType == 'mp4') {
          if (videoFile && videoFile != '') {

            if (<?php echo $allsettings->site_s3_storage ?> == 1) {
              <?php $videoFile = "<script>document.write(videoFile)</script>" ?>
              <?php $videofileurl = Storage::disk('s3')->url($videoFile) ?>

              finalElm = `
                                    <video width="100%" height="230" controls loop>
                                        <source src="<?php echo $videofileurl ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                `;
            } else {
              const srcUrl = `<?php echo e(url('/')); ?>/public/storage/items/${videoFile}`;
              finalElm = `
                                    <video width="100%" height="230" controls loop>
                                        <source src="${srcUrl}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                `;
            }
          } else {
            const srcUrl = `<?php echo e(url('/')); ?>/resources/views/assets/no-video.png`;
            finalElm = `<img src="${srcUrl}" alt="Item Name">`;
          }
        }
      } else {
        if (itemPreview != '') {
          const srcUrl = `<?php echo e(url('/')); ?>/public/storage/items/${itemPreview}`;
          finalElm = `<img src="${srcUrl}" alt="Item Name">`;
        } else {
          const srcUrl = `<?php echo e(url('/')); ?>/public/img/no-image.png`;
          finalElm = `<img src="${srcUrl}" alt="Item Name">`;
        }
      }

      const removeModalBody = $('#videoModal .modal-body').empty().promise();


      removeModalBody.then(() => {
        $('#videoModal .modal-body').append(`
                        ${finalElm}
                    `);

        $('#videoModal').modal('show');
      })

    });
  });
</script>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title mb-0" id="videoModalLabel">Product Preview</h5>
      </div>

      <div class="modal-body d-flex flex-center">
      </div>

      <div class="modal-footer">
        <button type="button" class="btn theme-button px-4 py-2" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\xampp7.3.27.0\htdocs\gotemplate_v2\resources\views/video_modal.blade.php ENDPATH**/ ?>