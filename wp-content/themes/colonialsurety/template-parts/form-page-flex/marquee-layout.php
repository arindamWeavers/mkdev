<div class="marquee">
    <div class="article__wrapper wrapper">
        <div class="getStarted">
        	<h1 class="getStarted__title">
        		<?php the_sub_field('page_title'); ?>
        	</h1>
            <div class="theContent"><?php the_sub_field('content'); ?></div>
			<?php if(get_sub_field('report_claim_forms')) : ?>
                <div class="claimSelectorContainer">
    				<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 'reportaclaimtypeselector', 'title' => false, 'description' => false ) ); ?>
                </div>
			<?php endif; ?>
        </div>
    </div>
</div>

<div class="claim-form-modal">
    <?php if('SERVER_NAME' == 'colonialsurety.com.l04.project-qa.com'){ ?>
        <!-- LO4-->
        <div class="form-wrap bond" id="form_bond" role="dialog" aria-modal="true" aria-hidden="true" aria-label="Submit your bond claim.">
        <div tabindex="0" data-focus-trap></div>
            <span class="modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" role="button" aria-label="Close bond claim form" tabindex="0">
                    <g fill="#102938" fill-rule="evenodd" transform="translate(-1 -1)">
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(-45 10.5 10.5)"/>
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(45 10.5 10.5)"/>
                    </g>
                </svg>
            </span>
            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 'bondclaim', 'title' => true, 'description' => true ) ); ?>
            <span class="frm_cancel" role="button" tabindex="0">Cancel</span>
        <div tabindex="0" data-focus-trap></div>
        </div>
        <div class="form-wrap cyber" id="form_cyber" role="dialog" aria-modal="true" aria-hidden="true" aria-label="Submit your cyber claim.">
        <div tabindex="0" data-focus-trap></div>
        <span class="modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" role="button" aria-label="Close cyber claim form" tabindex="0">
                    <g fill="#102938" fill-rule="evenodd" transform="translate(-1 -1)">
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(-45 10.5 10.5)"/>
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(45 10.5 10.5)"/>
                    </g>
                </svg>
            </span>
            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 'cyberclaim', 'title' => true, 'description' => true ) ); ?>
            <span class="frm_cancel" role="button" tabindex="0">Cancel</span>
        <div tabindex="0" data-focus-trap></div>
        </div>
        <div class="form-wrap insurance" id="form_insurance" role="dialog" aria-modal="true" aria-hidden="true" aria-label="Submit your insurance claim.">
        <div tabindex="0" data-focus-trap></div>
        <span class="modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" role="button" aria-label="Close insurance claim form" tabindex="0">
                    <g fill="#102938" fill-rule="evenodd" transform="translate(-1 -1)">
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(-45 10.5 10.5)"/>
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(45 10.5 10.5)"/>
                    </g>
                </svg>
            </span>
            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 'insuranceclaim', 'title' => true, 'description' => true ) ); ?>
            <span class="frm_cancel" role="button" tabindex="0">Cancel</span>
        <div tabindex="0" data-focus-trap></div>
        </div>
    <?php } else if('SERVER_NAME' == 'qa-colonial-surety.pantheonsite.io'){ ?>
        <!-- PANTHEON-->
        <div class="form-wrap bond" id="form_bond" role="dialog" aria-modal="true" aria-hidden="true" aria-label="Submit your bond claim.">
        <div tabindex="0" data-focus-trap></div>
            <span class="modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" role="button" aria-label="Close bond claim form" tab-index="0">
                    <g fill="#102938" fill-rule="evenodd" transform="translate(-1 -1)">
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(-45 10.5 10.5)"/>
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(45 10.5 10.5)"/>
                    </g>
                </svg>
            </span>
            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 'bondclaim', 'title' => true, 'description' => true ) ); ?>
            <span class="frm_cancel" role="button" tabindex="0">Cancel</span>
        <div tabindex="0" data-focus-trap></div>
        </div>
        <div class="form-wrap cyber" id="form_cyber" role="dialog" aria-modal="true" aria-hidden="true" aria-label="Submit your cyber claim.">
        <div tabindex="0" data-focus-trap></div>
        <span class="modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" role="button" aria-label="Close cyber claim form" tab-index="0">
                    <g fill="#102938" fill-rule="evenodd" transform="translate(-1 -1)">
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(-45 10.5 10.5)"/>
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(45 10.5 10.5)"/>
                    </g>
                </svg>
            </span>
            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 'cyberclaim', 'title' => true, 'description' => true ) ); ?>
            <span class="frm_cancel" role="button" tabindex="0">Cancel</span>
        <div tabindex="0" data-focus-trap></div>
        </div>
        <div class="form-wrap insurance" id="form_insurance" role="dialog" aria-modal="true" aria-hidden="true" aria-label="Submit your insurance claim.">
        <div tabindex="0" data-focus-trap></div>
        <span class="modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" role="button" aria-label="Close insurance claim form" tab-index="0">
                    <g fill="#102938" fill-rule="evenodd" transform="translate(-1 -1)">
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(-45 10.5 10.5)"/>
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(45 10.5 10.5)"/>
                    </g>
                </svg>
            </span>
            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 'insuranceclaim', 'title' => true, 'description' => true ) ); ?>
            <span class="frm_cancel" role="button" tabindex="0">Cancel</span>
        <div tabindex="0" data-focus-trap></div>
        </div>
    <?php } else { ?>
        <!--    LOCAL-->
        <div class="form-wrap bond" id="form_bond" role="dialog" aria-modal="true" aria-hidden="true" aria-label="Submit your bond claim.">
        <div tabindex="0" data-focus-trap></div>
            <span class="modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" role="button" aria-label="Close bond claim form" tab-index="0">
                    <g fill="#102938" fill-rule="evenodd" transform="translate(-1 -1)">
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(-45 10.5 10.5)"/>
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(45 10.5 10.5)"/>
                    </g>
                </svg>
            </span>
            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 'bondclaim', 'title' => true, 'description' => true ) ); ?>
            <span class="frm_cancel" role="button" tabindex="0">Cancel</span>
        <div tabindex="0" data-focus-trap></div>
        </div>
        <div class="form-wrap insurance" id="form_insurance" role="dialog" aria-modal="true" aria-hidden="true" aria-label="Submit your insurance claim.">
        <div tabindex="0" data-focus-trap></div>
        <span class="modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" role="button" aria-label="Close insurance claim form" tab-index="0">
                    <g fill="#102938" fill-rule="evenodd" transform="translate(-1 -1)">
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(-45 10.5 10.5)"/>
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(45 10.5 10.5)"/>
                    </g>
                </svg>
            </span>
            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 'insuranceclaim', 'title' => true, 'description' => true ) ); ?>
            <span class="frm_cancel" role="button" aria-label="Close insurance claim form">Cancel</span>
        <div tabindex="0" data-focus-trap></div>
        </div>
        <div class="form-wrap cyber" id="form_cyber" role="dialog" aria-modal="true" aria-hidden="true" aria-label="Submit your cyber claim.">
        <div tabindex="0" data-focus-trap></div>
        <span class="modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" role="button" aria-label="Close cyber claim form" tab-index="0">
                    <g fill="#102938" fill-rule="evenodd" transform="translate(-1 -1)">
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(-45 10.5 10.5)"/>
                        <rect width="25" height="3" x="-2" y="9" rx="1.5" transform="rotate(45 10.5 10.5)"/>
                    </g>
                </svg>
            </span>
            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 'cyberclaim', 'title' => true, 'description' => true ) ); ?>
            <span class="frm_cancel" role="button" tabindex="0">Cancel</span>
        <div tabindex="0" data-focus-trap></div>
        </div>
    <?php } ?>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($){
        var reportAClaimForm = $('#form_reportaclaimtypeselector');
        var suretyField = 'field_surety';
        var fidelityField = 'field_fidelity';
        var insuranceField = 'field_insurance';
        var formValue;
        var formSelected;

        //when one of the dropdown options have been changed to a value that's not blank
        $(reportAClaimForm).find('select').on('change', function() {
            if($(this).val().length > 0) {
                $(reportAClaimForm).find('select').not($(this)).val('');
                formValue = $(this).val();
                formSelected = $(this).attr('id');
            }
            //open the modal and show the correct form
            if (formSelected == suretyField || formSelected == fidelityField) {

                //open Bond claim
                $('.claim-form-modal .form-wrap.bond').show();

                //add the value to hidden field in claim
                $('#field_bondclaimtype').val(formValue);

                //make sure the other forms are hidden
                $('.claim-form-modal .form-wrap.cyber').hide();
                $('.claim-form-modal .form-wrap.insurance').hide();

                //prevent double scrollbars on the body
                $('.page-template-report-claim-page').css('overflow', 'hidden');
                
            } else if (formSelected == insuranceField) {
                
                if (formValue == 'Cyber Liability Insurance' || formValue == 'Cyber Insurance') {
                    //open Cyber claim
                    $('.claim-form-modal .form-wrap.cyber').show();

                    //add the value to hidden field in claim
                    $('#field_cyberclaimtype').val(formValue);

                    //make sure the other forms are hidden
                    $('.claim-form-modal .form-wrap.bond').hide();
                    $('.claim-form-modal .form-wrap.insurance').hide();
                } else {
                    //open Insurance claim
                    $('.claim-form-modal .form-wrap.insurance').show();

                    //add the value to hidden field in claim
                    $('#field_insuranceclaimtype').val(formValue);

                    //make sure the other forms are hidden
                    $('.claim-form-modal .form-wrap.bond').hide();
                    $('.claim-form-modal .form-wrap.cyber').hide();
                }

                //prevent double scrollbars on the body
                $('.page-template-report-claim-page').css('overflow', 'hidden');

            } else {
                $('.claim-form-modal').hide();
                $('.content-area').css('position', 'relative');
                $('#page').css('position', 'static');
                $('.page-template-report-claim-page').css('overflow', 'visible');
            }
            //open modal
            $('.claim-form-modal').show();
            $('.content-area').css('position', 'static');
            $('#page').css('position', 'relative');
            $('.page-template-report-claim-page').css('overflow', 'hidden');
            // $('.page-template-report-claim-page').css('overflow', 'hidden');
            // $('.frm_submit').append("<a class='cancelLink' href='#'>Cancel</a>");
        });

        //close the modal on click of the modal close button
        $('.claim-form-modal .modal-close').on('click', function() {
            $('.claim-form-modal').toggle();
            $('.content-area').css('position', 'relative');
            $('#page').css('position', 'static');
            $('.page-template-report-claim-page').css('overflow', 'visible');
            resetDropdowns();
            location.reload(true);
        });

        //move the frm_cancel link into the frm_submit wrap
        $('.claim-form-modal .form-wrap').each(function() {
            var cancelButton = $(this).find('.frm_cancel');
            $(this).find('.frm_submit').append(cancelButton);
        });

        //close form on click of Cancel button
        $('.claim-form-modal .form-wrap .frm_cancel').on('click', function() {
            $('.claim-form-modal').toggle();
            $('.content-area').css('position', 'relative');
            $('#page').css('position', 'static');
            $('.page-template-report-claim-page').css('overflow', 'visible');
            resetDropdowns();
            location.reload(true);
        });
        

        function resetDropdowns(){
            $(reportAClaimForm).find('select').each(function(){
                $(this).prop('selectedIndex', 0).selectric('refresh');
                $(this).closest('.selectric-wrapper').addClass('RptClaimSelect');
            });
        }


            $( '.countMe textarea' ).each(function(){
                var countdownBx = "<span aria-live='polite' class='countdown'></span>";
                $(this).attr('maxlength','2500');
                $(this).after(countdownBx);
                $( this ).keyup( function (e) {
                    var maxChar = 2500;
                    var characters = this.value;
                    var numcharacters = characters.length;

                    if(numcharacters >= maxChar
                        && e.keyCode !== 46
                        && e.keyCode !== 8 )
                {
                        e.preventDefault();
                        $(this).closest('.countMe').find('.countdown').html('<span aria-live="polite">0 Characters remaining</span>');
                    }
                    else{
                        if(numcharacters >= (maxChar - 100)) {
                            $(this).closest('.countMe').find('.countdown').css('display','block').addClass('counting').attr('aria-live','polite').html((maxChar - numcharacters) + ' Characters remaining');
                        }
                    }

                });
            });
    });
</script>