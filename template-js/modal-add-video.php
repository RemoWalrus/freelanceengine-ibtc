<?php
	global $user_ID;
	$profile_id = get_user_meta($user_ID, 'user_profile_id', true);
?>
<div class="modal fade" id="modal_add_video">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<i class="fa fa-times"></i>
				</button>
				<h4 class="modal-title"><?php _e("Add New Video", ET_DOMAIN) ?></h4>
			</div>
			<div class="modal-body">
				<form role="form" id="create_video" class="fre-modal-form auth-form create_video">

					<div class="fre-input-field box_upload_img">
                        <div id="portfolio_img_thumbnail" style="display: none"></div>
                        <ul class="portfolio-thumbs-list row image ctn_portfolio_img">

						</ul>

                        <div id="portfolio_video_container">
                            <span class="et_ajaxnonce hidden" data-id="<?php echo wp_create_nonce( 'portfolio_img_et_uploader' ); ?>"></span>
                            <!--<label class="fre-upload-file" for="portfolio_img_browse_button">
                			<input type="file" name="post_thumbnail" id="portfolio_img_browse_button" value="<?php /*_e('Browse', ET_DOMAIN); */?>" />
                			<?php /*_e('Upload Files', ET_DOMAIN) */?>
                		    </label>-->
                            <a class="fre-upload-file" href="#" id="portfolio_img_browse_button" style="display: block;">
		                        <?php _e( 'Upload Files', ET_DOMAIN ) ?>
                            </a>
                        </div>
                		<p class="fre-allow-upload"><?php _e('(Maximum upload file size is limited to 10MB, allowed file types in the png, jpg, and gif.)', ET_DOMAIN) ?></p>
					</div>
                	<div class="fre-form-btn">
                		<button type="submit" class="fre-normal-btn fre-submit-video">
							<?php _e('Save', ET_DOMAIN) ?>
						</button>
						<span class="fre-form-close" data-dismiss="modal"><?php _e('Cancel', ET_DOMAIN) ?></span>
                	</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->