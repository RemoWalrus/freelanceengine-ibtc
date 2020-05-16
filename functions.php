<?php
#remover the WP info
remove_action('wp_head', 'wp_generator');

function lp_freelanceengine_enqueue_styles() {
	if ( is_page_template( 'page-profile.php' ) || is_author() || et_load_mobile() ) {
		wp_enqueue_media();

		wp_deregister_script( 'front' );
		wp_enqueue_script( 'front', get_stylesheet_directory_uri() . '/assets/js/front.js', array(
			'jquery',
			'underscore',
			'backbone',
			'appengine',
			'fre-lib'
		), ET_VERSION, true );
		
		// add translatable texts
		wp_localize_script( 'front', 'fre_fronts', array(
			'portfolio_img'             => __( 'Please select an image!', ET_DOMAIN ),
			'deleted_file_successfully' => __( 'Files are deleted successfully', ET_DOMAIN ),
			'failed_deleted_file'       => __( 'Failed to delete file', ET_DOMAIN ),
			'cannot_deleted_file'       => __( 'You cannot deleted the file since partner locked this section. Please refresh the page.', ET_DOMAIN )
		) );


		wp_deregister_script( 'profile' );
		wp_enqueue_script( 'profile-extended', get_stylesheet_directory_uri() . '/assets/js/profile.js', array(
				'jquery',
				'underscore',
				'backbone',
				'appengine',
				'front'
			), ET_VERSION, true );

	}
	if ( is_singular( 'project' ) ) {
		wp_deregister_script( 'single-project' );
		wp_enqueue_script( 'single-project-extended', get_stylesheet_directory_uri() . '/assets/js/single-project.js', array(
				'jquery',
				'underscore',
				'backbone',
				'appengine',
				'front'
			), ET_VERSION, true );

		wp_localize_script( 'single-project-extended', 'single_text', array(
				'agree'     => __( 'Agree', ET_DOMAIN ),
				'accepted'  => __( 'Accepted', ET_DOMAIN ),
				'skip'      => __( 'Skip', ET_DOMAIN ),
				'working'   => __( 'Working', ET_DOMAIN ),
				'complete'  => __( 'Complete', ET_DOMAIN ),
				'completed' => __( 'Completed', ET_DOMAIN ),
			) );
	}

	if(is_page_template('page-submit-project.php')){
		wp_deregister_script( 'front' );
		wp_enqueue_script( 'front', get_stylesheet_directory_uri() . '/assets/js/front.js', array(
			'jquery',
			'underscore',
			'backbone',
			'appengine',
			'fre-lib'
		), ET_VERSION, true );
	}

}
add_action ( 'wp_enqueue_scripts', 'lp_freelanceengine_enqueue_styles');

add_filter('fre_bid_required_field', 'lp_fre_bid_required_fields');
function lp_fre_bid_required_fields($fields){
	unset($fields[0]); // unset bid_budget
	unset($fields[1]); // unset bid_time
	return $fields;
}

add_filter('fre_project_required_fields', 'lp_fre_project_required_fields');
function lp_fre_project_required_fields($fields){
	unset($fields[0]);

	return $fields;
}

add_filter('fre_project_validate_data', 'lp_fre_project_validate_data');
function lp_fre_project_validate_data($data){
	if($data['et_budget']!=""){
		if ( !is_numeric($data['et_budget']) ) {
			return new WP_Error( 'budget_invalid', __( "Your budget has to be numeric only!", ET_DOMAIN ) );
		}
	}
	return $data;
}

add_action( 'pre_get_posts', 'users_own_attachments');
if(!function_exists('users_own_attachments')){
	function users_own_attachments( $wp_query_obj ){
		global $current_user, $pagenow;
		if(!is_super_admin()){
			if ( $pagenow == 'upload.php' || ( $pagenow == 'admin-ajax.php' && !empty( $_POST[ 'action' ] ) && $_POST[ 'action' ] == 'query-attachments' ) ) {
				$wp_query_obj->set( 'author', $current_user->ID );
			}
		}
	}
}

add_action('wp_ajax_lp_upload_video','lp_upload_video_func');
add_action('wp_ajax_nopriv_lp_upload_video','lp_upload_video_func');
function lp_upload_video_func(){

	$user_id = get_current_user_id();
	$filename = $_POST['filename'];
	$file_url = $_POST['file_url'];
	$file_id = $_POST['file_id'];
	$old_file_id = get_user_meta($user_id, 'profile_video_file_id', true);

	if($old_file_id==$file_id){
		$response = array(
			'status' => 'samefile',
			'success' => false,
			'msg'     => __( "This video is already set to your profile.", ET_DOMAIN )
		);
		wp_send_json( $response );
		die;
	}
	update_user_meta($user_id, 'profile_video_file_name', $filename);
	update_user_meta($user_id, 'profile_video_file_url', $file_url);
	update_user_meta($user_id, 'profile_video_file_id', $file_id);

	$response = array(
		'status' => 'success',
		'success' => true,
		'msg'     => __( "Your video added to your profile.", ET_DOMAIN )
	);

	wp_send_json( $response );
	die;
}
add_action('wp_ajax_lp_remove_video','lp_remove_video_func');
add_action('wp_ajax_nopriv_lp_remove_video','lp_remove_video_func');
function lp_remove_video_func(){

	$user_id = get_current_user_id();

	update_user_meta($user_id, 'profile_video_file_name', '');
	update_user_meta($user_id, 'profile_video_file_url', '');
	update_user_meta($user_id, 'profile_video_file_id', '');

	$response = array(
		'status' => 'success',
		'success' => true,
		'msg'     => __( "Video is removed from profile.", ET_DOMAIN )
	);
	wp_send_json( $response );
	die;
}


function lp_add_theme_caps(){
	$freelancer = get_role( 'freelancer' );
	$freelancer->add_cap( 'upload_files' ); 
	$freelancer->add_cap( 'manage_options' ); 
}
add_action( 'admin_init', 'lp_add_theme_caps');



function lp_block_wp_admin() {
	if ( is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
		wp_safe_redirect( home_url() );
		exit;
	}
}
add_action( 'admin_init', 'lp_block_wp_admin' );

require_once( get_stylesheet_directory() .'/includes/widgets.php');


function set_secure_signon_cookie($secure_cookie, $credentials){
	return true;	
}
add_filter( 'secure_signon_cookie', 'set_secure_signon_cookie', 10, 2 );

/*if(isset($_REQUEST['mail_test'])){
	add_action('init', 'lp_mail_header');
	add_action('init', 'lp_mail_footer');
}*/

add_filter( 'ae_get_mail_header', 'lp_mail_header');
function lp_mail_header() {
	$customize = et_get_customization();
	$logo_url = get_stylesheet_directory_uri()."/assets/images/logo.png";
	$mail_header = '<html>
                    <head>
                    </head>
                    <body style="font-family: serif;font-size: 0.9em;margin: 0; padding: 0; color: #222222;">
                    <div style="margin: 0px auto; width:600px; border: 1px solid ' . $customize['background'] . '">
                        <table width="100%" cellspacing="0" cellpadding="0">
                        <tr style="background:#635f7e;"><td height="35px;">&nbsp;</td></tr>

                        <tr style="background: #ffffff; height: 63px; vertical-align: middle; font-family: Arial;">
                            <td style="padding: 30px 5px 10px 20px; border-bottom:1px solid #635f7e;" align="center">
                                <img style="max-height: 100px" src="' . $logo_url . '" alt="' . get_option( 'blogname' ) . '"><br />
                                <span style="color: #000000;">' . get_option( 'blogdescription' ) . '</span>
                            </td>
                        </tr>
                        <tr><td style="height: 5px; background-color: ' . $customize['background'] . ';"></td></tr>
                        <tr>
                            <td style="background: #ffffff; color: #222222; line-height: 18px; padding: 10px 40px;"><p>&nbsp;</p>';
        return $mail_header;
}

add_filter( 'ae_get_mail_footer', 'lp_mail_footer' );
function lp_mail_footer(){
	$copyright = apply_filters( 'get_copyright', ae_get_option( 'copyright' ) );
	$mail_footer = '<p>&nbsp;</p></td>
                    </tr>
                    <tr style="font-family: Arial;">
                        <td style="background: #635f7e; padding: 10px 20px; color: #ffffff;" align="center" height="50px" valign="middle">
                            ' . $copyright . '
                        </td>
                    </tr>
                    </table>
                </div>
                </body>
                </html>';

    return $mail_footer;
}

function filter_site_upload_size_limit( $size ) {
    if(!is_super_admin()){
	    $size = 100 * 1024 * 1024;
	    return $size;
	}
}
add_filter( 'upload_size_limit', 'filter_site_upload_size_limit', 20 );

add_action('wp_ajax_ae-fetch-info-portfolio-custom','lp_fetch_info_portfolio');
add_action('wp_ajax_nopriv_ae-fetch-info-portfolio-custom','lp_fetch_info_portfolio');

function lp_fetch_info_portfolio(){
	$request  = $_REQUEST;
	$response = array(
		'success' => false,
	);
	if ( ! empty( $request['portfolio_id'] ) ) {
		$portfolio = get_post( $request['portfolio_id'] );
		if ( ! empty( $portfolio ) ) {
			$AE_PostAction = AE_Posts::get_instance();
			$AE_PostAction->__construct( PORTFOLIO, array( 'skill' ) );
			$portfolio_info = $AE_PostAction->convert( $portfolio, 'thumbnail' );

			/* Custom code */
			$portfolio_list_images = array();
			if(!empty($portfolio_info->list_image_portfolio)){
				foreach ($portfolio_info->list_image_portfolio as $portfolio_img) {
					$likes = get_post_meta($portfolio_img['id'], 'liked_by', true);
					$likes_arr = array();
					if($likes!=""){
						$likes_arr = explode(',', $likes);
					}

					$current_like = false;
					
					if(in_array(get_current_user_id(), $likes_arr)){
						$current_like = true;
					}
					
					$portfolio_img['likes'] = count($likes_arr);
					$portfolio_img['current_like'] = $current_like;

					$portfolio_list_images[] = $portfolio_img;
				}
			}
			$portfolio_info->list_image_portfolio = $portfolio_list_images;
			/* Custom code Ends */

			$response       = array(
				'success' => true,
				'data'    => $portfolio_info,
			);
		}
	}
	wp_send_json( $response );
}	

add_action('wp_ajax_lp_like_portfolio','lp_like_portfolio');
add_action('wp_ajax_nopriv_lp_like_portfolio','lp_like_portfolio');
function lp_like_portfolio(){
	$request  = $_REQUEST;
	$likes = get_post_meta($request['portfolio_id'], 'liked_by', true);
	$likes_arr = explode(',', $likes);
	$html = "";
	if(in_array(get_current_user_id(), $likes_arr)){
		if (($key = array_search(get_current_user_id(), $likes_arr)) !== false) {
		    unset($likes_arr[$key]);
		    $update_likes = implode(",",  $likes_arr);
		    update_post_meta($request['portfolio_id'], 'liked_by', $update_likes);
		}
		if(count($likes_arr)==1)
			$html .= "<i class='fa fa-heart-o' aria-hidden='true'></i> <span>".count($likes_arr)." Like</span>";
		else
			$html .= "<i class='fa fa-heart-o' aria-hidden='true'></i> <span>".count($likes_arr)." Likes</span>";

	}else{
		if($likes!="")
			$likes .= ','.get_current_user_id();
		else
			$likes .= get_current_user_id();
		update_post_meta($request['portfolio_id'], 'liked_by', $likes);
		$total_likes_arr = explode(",", $likes);
		$total_likes = count($likes);
		if($total_likes==1)
			$html .= "<i class='fa fa-heart' aria-hidden='true'></i> <span>".$total_likes." Like</span>";
		else
			$html .= "<i class='fa fa-heart' aria-hidden='true'></i> <span>".$total_likes." Likes</span>";
	}
	$response = array(
		'success' => true,
		'data'    => $html,
	);
	wp_send_json( $response );

}
