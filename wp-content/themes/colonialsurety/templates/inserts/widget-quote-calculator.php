<form action="" method="POST" class="form" data-quote-calculator novalidate>
  <legend class="form__legend">Please tell us about your contract.</legend>
  <div class="form__fields" role="group">
    <div class="form__field-group field" data-mask="contractAmount">
      <label for="annualContractAmount" class="field__label">Annual Contract Amount</label>
      <div class="field__field">
        <input type="text" inputmode="numeric" pattern="[0-9]*" class="field__input" id="annualContractAmount" value="<?php echo $atts['contract-amount'] ?: '$10,000' ?>" data-contract-amount>
        <input type="hidden" data-percentage value="<?php echo $atts['contract-percentage'] ?: '10' ?>"/>
      </div>
    </div>
    <div class="form__field-group field">
      <label for="contractTerm" class="field__label">Contract Term in Years</label>
      <div class="field__field field__field--select">
        <select class="field__input" id="contractTerm">
          <option value="1">1 year</option>
          <option value="2">2 years</option>
          <option value="3">3 years</option>
          <option value="4">4 years</option>
          <option value="5">5 years</option>
        </select>
      </div>
    </div>
  </div>
  <div class="form__cta">
    <input type="submit" value="Calculate" class="form__cta-button button button--ghost" />
  </div>
</form>