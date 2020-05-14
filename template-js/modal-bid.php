<?php wp_reset_query();
global $user_ID, $post;
$payer_of_commission = ae_get_option( 'payer_of_commission' );
$commission_type     = ae_get_option( 'commission_type' );
$currency            = ae_get_option( 'currency', array( 'align' => 'left', 'code' => 'USD', 'icon' => '$' ) );
$commission          = ae_get_option( 'commission', 0 );

?>
<!-- MODAL BIG -->
<div class="modal fade" id="modal_bid">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                </button>
                <h4 class="modal-title"><?php _e( 'Bid this project', ET_DOMAIN ); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="bid_form" class="bid-form fre-modal-form">
                    <?php 
                    /* 
                    <div class="fre-input-field">
                        <label class="fre-field-title" for="bid_budget"><?php _e( 'Your Bid', ET_DOMAIN ); ?></label>
                        <div class="fre-project-budget">
                            <input type="number" name="bid_budget" id="bid_budget" class="form-control number numberVal" min="0"/>
                            <span><?php echo fre_currency_sign( false ); ?></span>
                            <?php do_action('multi_currencies_note');?>

                        </div>
						<?php if ( ae_get_option( 'use_escrow' ) ) {
							if ( $payer_of_commission == 'worker' ) {
								if ( $commission_type == 'percent' ) {
									$commission_fee = $commission . '%';
								} else {
									$commission_fee = $currency['icon'] . $commission;
								}
								printf( __( "<p class='bid-commission-fee'>Commission fee: <b>%s</b></p>", ET_DOMAIN ), $commission_fee );
							}
						} ?>
                    </div> */ ?>
                    <div class="fre-input-field">
                        <label class="fre-field-title" for="bid_budget"><?php _e( 'Preferred Method of Contact.', ET_DOMAIN ); ?></label>
                        <select name="preferred_contact_method">
                            <option value="<?php _e('Email', ET_DOMAIN); ?>"><?php _e('Email', ET_DOMAIN); ?></option>
                            <option value="<?php _e('Phone', ET_DOMAIN); ?>"><?php _e('Phone', ET_DOMAIN); ?></option>
                            <option value="<?php _e('Private Message', ET_DOMAIN); ?>"><?php _e('Private Message', ET_DOMAIN); ?></option>
                        </select>
                    </div>
                    <?php /*
                    <div class="fre-input-field no-margin-bottom">
                        <label class="fre-field-title"  for="post_content"><?php _e( 'Add Notes', ET_DOMAIN ); ?></label>
                        <textarea id="bid_content" name="bid_content"></textarea>
                    </div> */ ?>
                    <input type="hidden" name="post_parent" value="<?php the_ID(); ?>"/>
                    <input type="hidden" name="method" value="create"/>
                    <input type="hidden" name="action" value="ae-sync-bid"/>

					<?php do_action( 'after_bid_form' ); ?>
                    <div class="fre-form-btn">
                        <button type="submit" class="fre-normal-btn btn-submit">
							<?php _e( 'Submit', ET_DOMAIN ) ?>
                        </button>
                        <span class="fre-form-close" data-dismiss="modal"><?php _e('Cancel',ET_DOMAIN);?></span>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->