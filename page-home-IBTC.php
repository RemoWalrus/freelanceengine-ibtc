<?php
/**
 * Template Name: Homepage IBTC
 */

get_header();
global $user_ID;
?>
<!-- Block Banner -->
<?php if(!is_user_logged_in()){ ?>
	<?php if(!fre_check_register()){ ?>
	<div class="fre-background" id="background_banner" style="background-image: url('<?php echo get_theme_mod("background_banner") ? get_theme_mod("background_banner") : get_template_directory_uri()."/img/fre-bg.png";?>');">

		<div class="fre-bg-content general">

			<div class="container">
				<h1 id="title_banner"><?php echo get_theme_mod("title_banner") ? get_theme_mod("title_banner") : __("Find perfect freelancers for your projects or Look for freelance jobs online?", ET_DOMAIN);?></h1>
				   
					<img class="logo" src="<?php echo get_site_url(); ?>/wp-content/themes/freelanceengine-ibtc/assets/images/inbetweelogo_logo.svg">
			
					<a class="fre-btn primary-bg-color" href="<?php echo get_post_type_archive_link( PROFILE ); ?>"><?php _e('Find Artist', ET_DOMAIN);?></a>
					<a class="fre-btn primary-bg-color" href="<?php echo get_post_type_archive_link( PROJECT ); ?>"><?php _e('Find Jobs', ET_DOMAIN);?></a>
			</div>
		</div>
	</div>
	<?php }else{ ?>
	<div class="fre-background vid" id="background_banner">
		<video autoplay muted loop id="myVideo">
  <source src="<?php echo get_site_url(); ?>/wp-content/themes/freelanceengine-ibtc/assets/video/IBTC-intro-new.mp4" type="video/mp4">
</video>
		
		<div class="fre-bg-content general">
			<div class="container">
				<h1 id="title_banner"><?php echo get_theme_mod("title_banner") ? get_theme_mod("title_banner") : __("Find perfect freelancers for your projects or Look for freelance jobs online?", ET_DOMAIN);?></h1>
					<img class="logo" src="<?php echo get_site_url(); ?>/wp-content/themes/freelanceengine-ibtc/assets/images/inbetweelogo_logo.svg">
					<a class="fre-btn primary-bg-color" data-hover="Find Freelancers" href="<?php echo get_site_url(); ?>/employers"><?php _e('<span>Employer</span>', ET_DOMAIN);?></a>
					<a class="fre-btn primary-bg-color" data-hover="Find Employers" href="<?php echo et_get_page_link('register', array("role"=>'freelancer')); ?>"><?php _e('<span>Artistic Professional</span>', ET_DOMAIN);?></a>
			</div>
		</div>
	</div>
	<?php } ?>
<?php }else{ ?>
	<?php if(ae_user_role($user_ID) == FREELANCER){ ?>
	<div class="fre-background" id="background_banner" style="background-image: url('<?php echo get_site_url(); ?>/wp-content/themes/freelanceengine-ibtc/assets/images/BGlogin1.jpg');">
		<div class="fre-bg-content general">
			<div class="container">
				<h1 id="title_banner"><?php echo get_theme_mod("title_banner") ? get_theme_mod("title_banner") : __("Find perfect freelancers for your projects or Look for freelance jobs online?", ET_DOMAIN);?></h1>
					<img class="logo" src="<?php echo get_site_url(); ?>/wp-content/themes/freelanceengine-ibtc/assets/images/inbetweelogo_logo.svg">
					
					<a class="fre-btn primary-bg-color" href="<?php echo et_get_page_link('profile'); ?>"><?php _e('<span>Update Profile</span>', ET_DOMAIN);?></a>
					<a class="fre-btn primary-bg-color" href="<?php echo get_site_url(); ?>/community/artists-lounge/');"><?php _e('<span>Connect</span>', ET_DOMAIN);?></a>
			</div>
		</div>
	</div>
	<?php }else{ ?>
	<div class="fre-background" id="background_banner" style="background-image: url('<?php echo get_site_url(); ?>/wp-content/themes/freelanceengine-ibtc/assets/images/BGlogin2.jpg');">
		<div class="fre-bg-content general">
			<div class="container">
				<h1 id="title_banner"><?php echo get_theme_mod("title_banner") ? get_theme_mod("title_banner") : __("Find perfect freelancers for your projects or Look for freelance jobs online?", ET_DOMAIN);?></h1>
					<img class="logo"src="<?php echo get_site_url(); ?>/wp-content/themes/freelanceengine-ibtc/assets/images/inbetweelogo_logo.svg">
					<a class="fre-btn primary-bg-color" href="<?php echo et_get_page_link('submit-project'); ?>"><?php _e('<span>Post a Job</span>', ET_DOMAIN);?></a>
					<a class="fre-btn primary-bg-color" href="<?php echo get_post_type_archive_link( PROFILE ); ?>"><?php _e('<span>Find Artists</span>', ET_DOMAIN);?></a>
			</div>
		</div>
	</div>
	<?php } ?>
<?php } ?>
<!-- Block Banner -->
<!-- Block How Work -->
<?php if(is_user_logged_in()){ ?>
<!-- comment -->
<?php }else{ ?>
<div class="fre-how-work">
	<div class="container">
		<h2 id="title_work"><?php echo get_theme_mod("title_work") ? get_theme_mod("title_work") : __('How FreelanceEngine works?', ET_DOMAIN);?></h2>
        <p id="desc_work_4"><?php echo get_theme_mod("desc_work_1") ? get_theme_mod("desc_work_4") : __('Be part of our growing community of Beauty Professionals and Employers', ET_DOMAIN);?></p>
		<div class="row">
			<div class="col-lg-4 col-sm-4">
				<div class="fre-work-block">
					<span>
						<img src="<?php echo get_theme_mod('img_work_1') ? get_theme_mod('img_work_1') : get_template_directory_uri().'/img/1.png';?>" id="img_work_1" alt="">
					</span>
					<p id="desc_work_1"><?php echo get_theme_mod("desc_work_1") ? get_theme_mod("desc_work_1") : __('Post projects to tell us what you need done', ET_DOMAIN);?></p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4">
				<div class="fre-work-block">
					<span>
						<img src="<?php echo get_theme_mod('img_work_2') ? get_theme_mod('img_work_2') : get_template_directory_uri().'/img/2.png';?>" id="img_work_2" alt="">
					</span>
					<p id="desc_work_2"><?php echo get_theme_mod("desc_work_2") ? get_theme_mod("desc_work_2") : __('Browse profiles, reviews, then hire your most favorite and start project', ET_DOMAIN);?></p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4">
				<div class="fre-work-block">
					<span>
						<img src="<?php echo get_theme_mod('img_work_3') ? get_theme_mod('img_work_3') : get_template_directory_uri().'/img/3.png';?>" id="img_work_3" alt="">
					</span>
					<p id="desc_work_3"><?php echo get_theme_mod("desc_work_3") ? get_theme_mod("desc_work_3") : __('Use FreelanceEngine platform to chat and share files', ET_DOMAIN);?></p>
				</div>
			</div>
<!-- 4th place-->
		</div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
            <a class="fre-btn primary-bg-color" href="<?php echo get_site_url(); ?>/pricing"><?php _e('Learn More', ET_DOMAIN);?></a>
            </div>
        </div>
	</div>
</div>
<?php } ?>
<!-- Block How Work -->
<!-- Block Advertising -->

<div class="fre-our-stories stories2" >
	<div class="container">
        <?php the_content(); ?>
    </div>
</div>

<!-- Block Advertising -->
<!-- List Profiles  and Projects-->
<?php if(is_user_logged_in()){ ?>
	<?php if(ae_user_role($user_ID) == FREELANCER){ ?>

	<div class="fre-perfect-freelancer">
		<div class="container">
			<h2 id="title_freelance"><?php echo get_theme_mod("title_freelance") ? get_theme_mod("title_freelance") : __('Find perfect artists for your projects', ET_DOMAIN);?></h2>
			<?php get_template_part( 'home-list', 'profiles' );?>
			<div class="fre-perfect-freelancer-more">
			<a class="fre-btn primary-bg-color" href="<?php echo get_post_type_archive_link( PROFILE ); ?>"><?php _e('See all Artists', ET_DOMAIN);?></a>
			</div>
		</div>
	</div>
	<?php }else{ ?>
	<div class="fre-perfect-freelancer">
		<div class="container">
			<h2 id="title_freelance"><?php echo get_theme_mod("title_freelance") ? get_theme_mod("title_freelance") : __('Find perfect artists for your projects', ET_DOMAIN);?></h2>
			<?php get_template_part( 'home-list', 'profiles' );?>
			<div class="fre-perfect-freelancer-more">
			<a class="fre-btn primary-bg-color" href="<?php echo get_post_type_archive_link( PROFILE ); ?>"><?php _e('See all Artists', ET_DOMAIN);?></a>
			</div>
		</div>
	</div>
	<?php } ?>
<?php }else{ ?>
	<div class="fre-perfect-freelancer">
		<div class="container">
			<h2 id="title_freelance"><?php echo get_theme_mod("title_freelance") ? get_theme_mod("title_freelance") : __('Find perfect artists for your projects', ET_DOMAIN);?></h2>
			<?php get_template_part( 'home-list', 'profiles' );?>
			<div class="fre-perfect-freelancer-more">
			<a class="fre-btn primary-bg-color" href="<?php echo get_post_type_archive_link( PROFILE ); ?>"><?php _e('See all Artists', ET_DOMAIN);?></a>
			</div>
		</div>
	</div>


<?php } ?>

<!-- List Profiles and Projects -->
<!-- List Testimonials -->
<?php if(!is_user_logged_in()){ ?>
<div class="fre-our-stories stories2" >
	<div class="container">
		<h2 id="title_story"><?php echo get_theme_mod("title_story") ? get_theme_mod("title_story") : __('Hear what our customers have to say', ET_DOMAIN);?></h2>
		<?php get_template_part( 'home-list', 'testimonial' );?>
	</div>
</div>
<?php } ?>
<!-- List Testimonials -->

<!-- List Get Started -->
<div class="fre-get-started">
	<div class="container">
		<?php if(!is_user_logged_in()){ ?>
            <div class="get-started-content">
				<h2 id="title_start"><?php echo get_theme_mod("title_start") ? get_theme_mod("title_start") : __('Need work done? Join FreelanceEngine community!', ET_DOMAIN);?></h2>
				<?php if(fre_check_register()){ ?>
				<a class="fre-btn primary-bg-color" href="<?php echo et_get_page_link('register', array("role"=>'freelancer')); ?>"><?php _e('Get Started', ET_DOMAIN)?></a>
				<?php } ?>
            </div>
        <?php } ?>
	</div>
</div>
<!-- List Get Started -->
<!-- Community -->
<?php if(ae_user_role($user_ID) == FREELANCER){ ?>
<div class="fre-our-stories">
	<div class="container">
		<div class="get-started-content">
 
					<h2 id="title_start">Do you want to interact with other Artists? Check out our Community</h2>
					<a class="fre-btn fre-btn primary-bg-color" href="<?php echo get_site_url(); ?>/community/artists-lounge/"><?php _e(' Join Artist Lounge!', ET_DOMAIN)?></a>
			
		</div>
	</div>
</div>
<?php }else{ ?>

<?php } ?>
<?php get_footer(); ?>