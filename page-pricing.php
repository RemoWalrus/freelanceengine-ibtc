<?php
/**
 * Template Name: Pricing Page
 */

get_header();
global $user_ID;
?>

<!-- List Pricing Plan -->
<?php
global $is_post_free, $pay_to_bid, $show_project_pack, $show_bid_pack;
$is_post_free 	= (int) ae_get_option( 'disable_plan', false );
$pay_to_bid 	= ae_get_option( 'pay_to_bid', false );
$show_bid_pack 	= $show_project_pack = false;
$user_role 		= ae_user_role($user_ID);



if(  is_user_logged_in() ) {

	if( ( in_array( $user_role, array( FREELANCER,'subscriber') ) || current_user_can('manage_options') )  &&  ! $is_post_free ) {
		$show_bid_pack = true;
	} else if(  in_array( $user_role, array( EMPLOYER,'administrator'  ) ) && $pay_to_bid && ! current_user_can('manage_options') ) {
		$show_project_pack = true;
	}

} else { // visitor.
	if( $pay_to_bid ){
		$show_bid_pack = true;
	} else if( ! $is_post_free ){
		$show_project_pack = true;
	}
}

if( $show_project_pack || $show_bid_pack ){ ?>
	<div class="fre-service">
		<div class="container">
			<h2 id="title_service">
				<?php

				if( $show_project_pack ){
					echo get_theme_mod("title_service") ? get_theme_mod("title_service") : __('Select a plan for project and job posting', ET_DOMAIN);

				} else if($show_bid_pack) {
					echo get_theme_mod("title_service_freelancer") ? get_theme_mod("title_service_freelancer") : __('Select a plan to apply to projects', ET_DOMAIN);
				}
				?>
			</h2>
			<?php get_template_part( 'home-list', 'pack' );?>
		</div>
	</div>
<?php } ?>
<!-- List Pricing Plan -->
<?php get_footer(); ?>