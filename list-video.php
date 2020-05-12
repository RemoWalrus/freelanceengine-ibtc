<?php
/**
 * Use for page author.php and page-profile.php
 */
global $wp_query, $ae_post_factory, $post;
$is_edit = false;
if(is_author()){
	$author_id        = get_query_var( 'author' );
}else{
	$author_id        = get_current_user_id();
	$is_edit = true;
}
$filename = get_user_meta($author_id, 'profile_video_file_name', true);
$file_url = get_user_meta($author_id, 'profile_video_file_url', true);
$file_id = get_user_meta($author_id, 'profile_video_file_id', true);

$non_supported_types = explode(',','mov,m4v,m2v,avi,mpg,flv,wmv,mkv,webm,ogv,mxf,asf,vob,mts,qt,mpeg,x-msvideo,3gp');

if($file_url!="" || $is_edit) {
    $file_type = wp_check_filetype($file_url);
    $file_ext = $file_type['ext'];

	?>
    <div class="fre-profile-box ibtc-transparent">
        <div class="profile-freelance-video">
        	<div class="row">
        		<div class="<?php echo $is_edit ? 'col-sm-6' :'' ?> col-xs-12">
            		<h2 class="freelance-video-title"><?php _e( 'Video Introduction', ET_DOMAIN ); ?></h2>
                </div>
                <?php 
                if($is_edit){ ?>
                    <div class="col-sm-6 col-xs-12">
                        <div class="freelance-video-add">
                            <?php
                            if($file_url==""){ ?>
                                <a href="#"  class="fre-normal-btn-o video-add-btn add-video"><?php _e('Add Video',ET_DOMAIN);?></a>
                            <?php
                            }else{ ?>
                                <input type="hidden" id="profile_video_id" value="<?php echo $file_id; ?>" />
                                <a href="#"  class="fre-normal-btn-o video-add-btn add-video"><?php _e('Replace Video',ET_DOMAIN);?></a>
                                <a href="#"  class="fre-normal-btn-o video-remove-btn remove-video"><?php _e('Remove Video',ET_DOMAIN);?></a>
                            <?php
                            } ?>
                        </div>
                    </div>
				<?php } ?>
            </div>
            

			<?php if($file_url==""){ ?>
                <div id="add_video_wrapper">
                    <p class="fre-empty-optional-profile"><?php _e('Add video to your profile. (optional)',ET_DOMAIN) ?></p>
                </div>
                
			<?php }else{ ?>
                <div id="add_video_wrapper">
                    <ul class="freelance-portfolio-list row" style="margin:0 auto;" >
                        <?php
                        if(!in_array($file_ext, $non_supported_types)){ ?>
    					   <li><?php echo do_shortcode('[video src="'.$file_url.'" width="500px" height="300px"]'); ?></li>
                        <?php
                        }else{ 
                            $media_url  = rtt_get_media_url( $file_id );
                            $poster     = rt_media_get_video_thumbnail( $file_id );
                        ?>
                            <li><?php echo do_shortcode( '[video src="'.$media_url.'" width="500px" height="300px" poster="'.$poster.'"]' ); ?></li>
                        <?php
                        } ?>
                    </ul>
                </div>
			<?php } ?>
            <div style="text-align:center; display: none;" id="add_video_loader">
                <div class="loading-overlay" style="opacity: 0.5; background-color: rgb(255, 255, 255);"></div>
                <div class="fre-loading-wrap" style="position: relative;">
                    <div class="fre-loading"></div>
                </div>
            </div>
        </div>
    </div>
<?php }  ?>

