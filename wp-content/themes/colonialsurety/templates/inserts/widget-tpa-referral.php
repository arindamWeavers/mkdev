<div class="ref-link-generator article__full-width-item">
  <div class="ref-link-generator__controls">
    <fieldset class="ref-link-generator__fieldset">
      <legend class="sr-only">Preview sizes</legend>
      <div class="ref-link-generator__panel-label">Select Size:</div>
      <div class="radio-group">
        <div class="radio-group__radio radio">
          <input type="radio" name="referral_style" class="radio__input" id="referralSizeBox" value="box" checked/>
          <label for="referralSizeBox" class="radio__label">300x250</label>
          <a href="#" class="ref-link-generator__preview-link">Preview</a>
        </div>
        <div class="radio-group__radio radio">
          <input type="radio" name="referral_style" class="radio__input" id="referralSizeColumn" value="column"/>
          <label for="referralSizeColumn" class="radio__label">120x600</label>
          <a href="#" class="ref-link-generator__preview-link">Preview</a>
        </div>
        <div class="radio-group__radio radio">
          <input type="radio" name="referral_style" class="radio__input" id="referralSizeText" value="text"/>
          <label for="referralSizeText" class="radio__label">Text Only</label>
          <a href="#" class="ref-link-generator__preview-link">Preview</a>
        </div>
      </div>
      <label for="referralCode" class="ref-link-generator__input-label">Enter Referral Code</label>
      <input type="text" name="referral_code" class="ref-link-generator__code-input" value="" data-default="AA9999" id="referralCode" maxlength="6" />
      <button class="button ref-link-generator__update">Update</button>
    </fieldset>
  </div>
  <div class="ref-link-generator__preview">
    <p><button class="close ref-link-generator__close-preview"><span class="sr-only">Close preview window</span></button></p>
    <div class="ref-link-generator__panel-label">Preview</div>
    <div class="ref-link-generator__preview-wrapper">
      <div class="ref-link-generator__preview-content"></div>
    </div>
  </div>
  <div class="ref-link-generator__code-panel">
    <p><button class="ref-link-generator__panel-label" data-rollup=".ref-link-generator__code" aria-controls="referralCodeToCopy" id="codePanelLabel">Code</button></p>
    <div class="ref-link-generator__code" id="referralCodeToCopy" aria-describedby="codePanelLabel">
      <div class="ref-link-generator__code-to-copy" data-dest-referral></div>
      <div data-src-referral="box" aria-hidden="true" class="sr-only">
        <a href="https://www.colonialsurety.com/fidelity-bonds/erisa-bonds/?utm_medium=referral&amp;utm_source=tpas&amp;utm_campaign=erisa&amp;utm_content=square&amp;ref={REFCODE}" target="_blank"><img alt="Colonial Bonds &amp; Insurance" src="https://www.colonialsurety.com/wp-content/uploads/2019/05/colonialsurety-square.png" height="300px" width="250px"></a>
      </div>
      <div data-src-referral="column" aria-hidden="true" class="sr-only">
          <a href="https://www.colonialsurety.com/fidelity-bonds/erisa-bonds/?utm_medium=referral&amp;utm_source=tpas&amp;utm_campaign=erisa&amp;utm_content=rectangle&amp;ref={REFCODE}" target="_blank"><img alt="Colonial Bonds &amp; Insurance" src="https://www.colonialsurety.com/wp-content/uploads/2019/05/colonialsurety-rectangle.png" height="600px" width="120px"></a>
      </div>
      <div data-src-referral="text" aria-hidden="true" class="sr-only">
        Colonial Surety is our preferred bonding partner. Quote, purchase, and print your ERISA bond instantly online. <a href="https://www.colonialsurety.com/fidelity-bonds/erisa-bonds/?utm_medium=referral&amp;utm_source=tpas&amp;utm_campaign=erisa&amp;utm_content=link&amp;ref={REFCODE}" target="_blank">Learn More.</a>
      </div>
    </div>
    <button class="button button--ghost ref-link-generator__copy-code" data-copy-clipboard="[data-dest-referral]">
      <span class="button__initial">Copy to Clipboard</span>
      <span class="button__done"></span>
      <span class="sr-only" aria-live="polite" data-copy-clipboard-msg></span>
    </button>
  </div>
</div>