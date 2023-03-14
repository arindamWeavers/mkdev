<div class="modal modal--floating" id="JobApplicationSubmitted" role="dialog" aria-labelledby="JobApplicationSubmittedHeader" aria-modal="true" aria-hidden="true">
  <div class="modal__body" data-modal-content>
    <button class="close" data-close="modal"><span class="sr-only">Close Modal</span></button>
    <div class="message message--free message--feedback">
      <div class="message__content">
        <div class="message__title">Thanks for applying!</div>
        <p class="message__copy">We’ll be in touch if your qualifications are a fit for <?php echo is_single() ? 'this position' : 'Colonial Surety'; ?>.</p>
        <p><button class="button" data-close="modal">Back to <?php echo is_single() ? 'Job Posting' : 'Careers'; ?></button></p>
      </div>
    </div>
  </div>
</div>