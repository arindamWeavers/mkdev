<form action="" method="POST" class="form form--inline" data-quote-contact-form novalidate>
  <legend class="form__legend sr-only">Contact Information</legend>
  <div class="form__subtext">All fields required</div>
  <div class="form__fields" rle="group">
    <div class="form__field-group field" data-validate="name">
      <label for="contactName" class="field__label">Name</label>
      <div class="field__field">
        <input type="text" name="contactName" class="field__input" id="contactName" required>
      </div>
    </div>
    <div class="form__field-group field" data-validate="email">
      <label for="contactEmail" class="field__label">Email Address</label>
      <div class="field__field">
        <input type="email" name="contactEmail" class="field__input" id="contactEmail" required>
      </div>
    </div>
    <div class="form__field-group field" data-validate="phoneNumber" data-mask="phone">
      <label for="contactPhone" class="field__label">Phone Number</label>
      <div class="field__field">
        <input type="text" name="contactPhone" class="field__input" id="contactPhone" inputmode="numeric" pattern="[0-9]*" required>
      </div>
    </div>
    <div class="form__field-group field field--attention" data-validation="attention">
      <label for="contactAddress" class="field__label">Address</label>
      <div class="field__field">
        <input type="text" name="address" class="field__input" id="contactAddress" required>
      </div>
    </div>
    <div class="form__cta">
      <input type="hidden" name="_wpcf7" value="<?php echo $formID; ?>">
      <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f<?php echo $formID; ?>-o2">
      <!-- <input type="hidden" name="_wpnonce" value="<?php echo $nonce; ?>"> -->
      <input type="hidden" name="annualContractAmount" value="" data-copy="#annualContractAmount">
      <input type="hidden" name="annualContractTerm" value="" data-copy="#contractTerm">
      <input type="hidden" name="annualPremium" value="" data-copy="#annualPremium">
      <input type="submit" value="Send" class="form__cta-button form__cta-button--inline button button--ghost" />
    </div>
  </div>
</form>