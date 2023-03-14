<div class="modal" id="JobApplication" role="dialog" aria-labelledby="JobApplicationHeader" aria-modal="true" aria-hidden="true">
  <div class="modal__body" data-modal-content>
    <button class="close" data-close="modal"><span class="sr-only">Close Modal</span></button>
    <div id="JobApplicationHeader" class="modal__title"><?php echo is_single() ? get_the_title() : 'Submit Resume' ?></div>
    <?php echo get_form('job-app',350); ?>
  </div>
</div>