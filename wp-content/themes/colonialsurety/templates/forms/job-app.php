<form action="" method="POST" class="form" data-job-app-form novalidate enctype="multipart/form-data">
  <legend class="form__legend sr-only"><?php echo is_single() ? get_the_title() : 'Submit Resume'; ?> Application</legend>
  <div class="form__fields">
    <div class="form__field-group field" data-validate="firstName">
      <label for="firstName" class="field__label">First Name</label>
      <div class="field__field">
        <input type="text" name="firstName" class="field__input" id="firstName" maxlength="35" required>
      </div>
    </div>
    <div class="form__field-group field" data-validate="lastName">
      <label for="lastName" class="field__label">Last Name</label>
      <div class="field__field">
        <input type="text" name="lastName" class="field__input" id="lastName" maxlength="75" required>
      </div>
    </div>
  </div>
  <div class="form__fields">
    <div class="form__field-group form__field-group--half field" data-validate="email">
      <label for="email" class="field__label">Email</label>
      <div class="field__field">
        <input type="email" name="email" class="field__input" id="email" maxlength="254" required>
      </div>
    </div>
  </div>
  <div class="form__fields">
    <div class="form__field-group field" data-validate="city">
      <label for="city" class="field__label">City</label>
      <div class="field__field">
        <input type="city" name="city" class="field__input" id="city" maxlength="75" required>
      </div>
    </div>
    <div class="form__field-group field" data-validate="state">
      <label for="state" class="field__label">State</label>
      <div class="field__field field__field--select">
        <select class="field__input" name="state" id="state" required>
          <option value=""></option>
          <option value="AL">Alabama (AL)</option>
          <option value="AK">Alaska (AK)</option>
          <option value="AZ">Arizona (AZ)</option>
          <option value="AR">Arkansas (AR)</option>
          <option value="CA">California (CA)</option>
          <option value="CZ">Canal Zone (CZ)</option>
          <option value="CO">Colorado (CO)</option>
          <option value="CT">Connecticut (CT)</option>
          <option value="DE">Delaware (DE)</option>
          <option value="DC">District of Columbia (DC)</option>
          <option value="FL">Florida (FL)</option>
          <option value="GA">Georgia (GA)</option>
          <option value="GU">Guam (GU)</option>
          <option value="HI">Hawaii (HI)</option>
          <option value="ID">Idaho (ID)</option>
          <option value="IL">Illinois (IL)</option>
          <option value="IN">Indiana (IN)</option>
          <option value="IA">Iowa (IA)</option>
          <option value="KS">Kansas (KS)</option>
          <option value="KY">Kentucky (KY)</option>
          <option value="LA">Louisiana (LA)</option>
          <option value="ME">Maine (ME)</option>
          <option value="MD">Maryland (MD)</option>
          <option value="MA">Massachusetts (MA)</option>
          <option value="MI">Michigan (MI)</option>
          <option value="MN">Minnesota (MN)</option>
          <option value="MS">Mississippi (MS)</option>
          <option value="MO">Missouri (MO)</option>
          <option value="MT">Montana (MT)</option>
          <option value="NE">Nebraska (NE)</option>
          <option value="NV">Nevada (NV)</option>
          <option value="NH">New Hampshire (NH)</option>
          <option value="NJ">New Jersey (NJ)</option>
          <option value="NM">New Mexico (NM)</option>
          <option value="NY">New York (NY)</option>
          <option value="NC">North Carolina (NC)</option>
          <option value="ND">North Dakota (ND)</option>
          <option value="OH">Ohio (OH)</option>
          <option value="OK">Oklahoma (OK)</option>
          <option value="OR">Oregon (OR)</option>
          <option value="PA">Pennsylvania (PA)</option>
          <option value="PR">Puerto Rico (PR)</option>
          <option value="RI">Rhode Island (RI)</option>
          <option value="SC">South Carolina (SC)</option>
          <option value="SD">South Dakota (SD)</option>
          <option value="TN">Tennessee (TN)</option>
          <option value="TX">Texas (TX)</option>
          <option value="UT">Utah (UT)</option>
          <option value="VT">Vermont (VT)</option>
          <option value="VI">Virgin Islands (VI)</option>
          <option value="VA">Virginia (VA)</option>
          <option value="WA">Washington (WA)</option>
          <option value="WV">West Virginia (WV)</option>
          <option value="WI">Wisconsin (WI)</option>
          <option value="WY">Wyoming (WY)</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form__fields">
    <div class="form__field-group field" data-validate="resume">
      <label for="resume" class="field__label">Upload Resume</label>
      <div class="field__field field__field--file">
        <input type="file" name="resume" class="field__input" id="resume" required>
        <div class="field__file-label"><div class="field__file-label-txt">Choose File</div></div>
      </div>
      <p class="field__subtext">Accepted file types are pdf, doc, docx, rtf. Maximum size is 1MB.</p>
    </div>
    <div class="form__field-group field" data-validate="coverLetter">
      <label for="coverLetter" class="field__label">Upload Cover Letter (Optional)</label>
      <div class="field__field field__field--file">
        <input type="file" name="coverLetter" class="field__input" id="coverLetter">
        <div class="field__file-label"><div class="field__file-label-txt">Choose File</div></div>
      </div>
    </div>
  </div>
  <div class="form__fields">
    <div class="form__field-group field" data-validate="message">
      <label for="message" class="field__label">Message (Optional)</label>
      <div class="field__field field__field--textarea">
        <textarea type="text" name="message" class="field__input" id="message" maxlength="2500"></textarea>
      </div>
    </div>
  </div>
  <div class="form__cta">
    <input type="hidden" name="_wpcf7" value="<?php echo $formID; ?>">
    <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f<?php echo $formID; ?>-o2">
    <!-- <input type="hidden" name="_wpnonce" value="<?php echo $nonce; ?>"> -->
    <input type="hidden" name="jobTitle" value="<?php echo esc_attr(is_single() ? get_the_title() : 'Resume'); ?>">
    <button type="submit" class="form__cta-button button">Submit Application</button>
    <a href="#" class="form__cta-link link" data-close="modal">Cancel</a>
  </div>
</form>