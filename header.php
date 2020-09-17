<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage FreelanceEngine
 * @since FreelanceEngine 1.0
 */
global $current_user;
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<?php global $user_ID; ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1 ,user-scalable=no">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php ae_favicon(); ?>
	<?php
	wp_head();
	if ( function_exists( 'et_render_less_style' ) ) {
		//et_render_less_style(); 
	}
	
	?>
	<!-- adobe font installed -->
	<link rel="stylesheet" href="https://use.typekit.net/qsp1dmh.css">
</head>

<body <?php body_class(); ?>>

<!-- <div class="fre-wrapper"> -->
<header class="fre-header-wrapper">
    <div class="fre-header-wrap" id="main_header">
        <div class="container">
            <div class="fre-site-logo">
                <a href="<?php echo home_url(); ?>">
					<?php fre_logo( 'site_logo' ) ?>
                </a>
                <div class="fre-hamburger">
					<?php if ( is_user_logged_in() ) { ?>
                        <a class="fre-notification notification-tablet" href="">
                            <i class="fa fa-bell-o" aria-hidden="true"></i>
							<?php
							if ( function_exists( 'fre_user_have_notify' ) ) {
								$notify_number = fre_user_have_notify();
								if ( $notify_number ) {
									echo '<span class="dot-noti"></span>';
								}
							}
							?>
                        </a>
					<?php } ?>
                    <span class="hamburger-menu">
                            <div class="hamburger hamburger--elastic" tabindex="0" aria-label="Menu" role="button"
                                 aria-controls="navigation">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                    </span>
                </div>
            </div>
			<?php if ( is_user_logged_in() ) { ?>
                <div class="fre-account-tablet">
                    <div class="fre-account-info">
						<?php echo get_avatar( $user_ID ); ?>
                        <span><?php echo $current_user->display_name; ?></span>
                    </div>
                </div>
			<?php } ?>
                        <div class="fre-menu-top">
                <ul class="fre-menu-main">
                    <!-- Menu freelancer -->
					<?php if ( ! is_user_logged_in() ) { ?>
                        <li class="fre-menu-freelancer dropdown">
                            <a><?php _e( 'ARTISTS', ET_DOMAIN ); ?><i class="fa fa-caret-down"
                                                                          aria-hidden="true"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo get_post_type_archive_link( PROJECT ); ?>"><?php _e( 'Find Jobs', ET_DOMAIN ); ?></a>
                                </li>
								<?php if ( fre_check_register() ) { ?>
                                    <li>
                                        <a href="<?php echo et_get_page_link( 'register' ) . '?role=freelancer'; ?>"><?php _e( 'Create Profile', ET_DOMAIN ); ?></a>
                                    </li>
								<?php } ?>
                            </ul>
                        </li>
                        <li class="fre-menu-employer dropdown">
                            <a><?php _e( 'EMPLOYERS', ET_DOMAIN ); ?><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo et_get_page_link( 'login' ) . '?ae_redirect_url=' . urlencode( et_get_page_link( 'submit-project' ) ); ?>"><?php _e( 'Post a Job', ET_DOMAIN ); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo get_post_type_archive_link( PROFILE ); ?>"><?php _e( 'Find Artists', ET_DOMAIN ); ?></a>
                                </li>
                            </ul>
                        </li>
					<?php } else { ?>

						<?php if ( ae_user_role( $user_ID ) == FREELANCER ) { ?>
                            <li class="fre-menu-freelancer dropdown-empty">
                                <a href="<?php echo et_get_page_link( "my-project" ); ?>"><?php _e( 'MY APPLICATIONS', ET_DOMAIN ); ?></a>
                            </li>
                            <li class="fre-menu-employer dropdown-empty">
                                <a href="<?php echo get_post_type_archive_link( PROJECT ); ?>"><?php _e( 'JOBS', ET_DOMAIN ); ?></a>
                            </li>
						<?php } else { ?>
                            <li class="fre-menu-employer dropdown">
                                <a><?php _e( 'MY JOB POSTINGS', ET_DOMAIN ); ?><i class="fa fa-caret-down"
                                                                             aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo et_get_page_link( "my-project" ); ?>"><?php _e( 'All Jobs Posted', ET_DOMAIN ); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo et_get_page_link( 'submit-project' ); ?>"><?php _e( 'Post a Job', ET_DOMAIN ); ?></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="fre-menu-employer dropdown-empty">
                                <a href="<?php echo get_post_type_archive_link( PROFILE ); ?>"><?php _e( 'ARTISTS', ET_DOMAIN ); ?></a>
                            </li>
						<?php } ?>
					<?php } ?>
               
                </ul>
            </div>
            <?php if ( is_user_logged_in() ) { ?>
                <div class="fre-account-info-tablet">
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo et_get_page_link( "profile" ) ?>"><?php _e( 'MY PROFILE', ET_DOMAIN ); ?></a>
                        </li>
						<?php do_action( 'fre_header_before_notify' ); ?>
                        <li><a href="<?php echo wp_logout_url(); ?>"><?php _e( 'LOGOUT', ET_DOMAIN ); ?></a></li>
                    </ul>
                </div>
			<?php } 
            if ( ! is_user_logged_in() ) { ?>
                <div class="fre-account-wrap">
                    <div class="fre-login-wrap">
                        <ul class="fre-login">
                            <li>
                                <a href="<?php echo et_get_page_link( "login" ) ?>"><?php _e( 'LOGIN', ET_DOMAIN ); ?></a>
                            </li>
							<?php if ( fre_check_register() ) { ?>
                                <li>
                                    <a href="<?php echo et_get_page_link( "register" ) ?>"><?php _e( 'SIGN UP', ET_DOMAIN ); ?></a>
                                </li>
							<?php } ?>
                        </ul>
                    </div>
                </div>
			<?php } else { ?>
                <div class="fre-account-wrap dropdown">
                    <a class="fre-notification dropdown-toggle" data-toggle="dropdown" href="">
                        <i class="fa fa-bell-o" aria-hidden="true"></i>
						<?php
						if ( function_exists( 'fre_user_have_notify' ) ) {
							$notify_number = fre_user_have_notify();
							if ( $notify_number ) {
								echo '<span class="dot-noti"></span>';
							}
						}
						?>
                    </a>
					<?php fre_user_notification( $user_ID, 1, 5 ); ?>
                    <div class="fre-account dropdown">
                        <div class="fre-account-info dropdown-toggle" data-toggle="dropdown">
							<?php echo get_avatar( $user_ID ); ?>
                            <span><?php echo $current_user->display_name; ?></span>
                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </div>
                        <ul class="dropdown-menu desktop">
                            <li>
                                <a href="<?php echo et_get_page_link( "profile" ) ?>"><?php _e( 'MY PROFILE', ET_DOMAIN ); ?></a>
                            </li>
							<?php do_action( 'fre_header_before_notify' ); ?>
                            <li><a href="<?php echo wp_logout_url(); ?>"><?php _e( 'LOGOUT', ET_DOMAIN ); ?></a></li>
                        </ul>
                    </div>
                </div>
			<?php } ?>
        </div>
    </div>
</header>
<!-- MENU DOOR / END -->

<?php
global $user_ID;
if ( $user_ID ) {
	echo '<script type="data/json"  id="user_id">' . json_encode( array(
			'id' => $user_ID,
			'ID' => $user_ID
		) ) . '</script>';
}