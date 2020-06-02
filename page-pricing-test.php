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
				Select a plan to apply to projects			</h2>
			<div class="fre-service-content">
                <p>Our platform solely caters to an Artist’s creative appetite to find jobs, connect, and be inspired.</p>
                
	<div class="row">
		<div class="col-md-1 hidden-sm"></div>
		<div class="col-md-10">
			<div class="row fre-service-package-list">
					    		<div class="col-md-3 col-sm-6">
									<div class="fre-service-pricing">
										<div class="service-price">
											<h2>FREE</h2> 										</div>
										<div class="service-info">
											<h3>Basic Account</h3>
											<p></p><p>Try us out for free and see what we’re about</p>
<p></p>
										</div>
																				<a class="fre-service-btn primary-color-hover" href=""<?php echo et_get_page_link('register', array("role"=>'freelancer')); ?>">Sign Up</a>
									</div>
								</div>
                	            <div class="fre-service-pricing">
										<div class="service-price">
											<h2><sup>$</sup>35.00</h2> 										</div>
										<div class="service-info">
											<h3>Monthy</h3>
											<p></p><p>Pay as you go Month to Month</p>
<p></p>
										</div>
																				<a class="fre-service-btn primary-color-hover" href="https://inbetweenthechair.com/stage/upgrade-account/?pack_id=640">Purchase</a>
								</div>
								</div>
                                <div class="col-md-3 col-sm-6">
									<div class="fre-service-pricing">
										<div class="service-price">
											<h2><sup>$</sup>150.00</h2> 										</div>
										<div class="service-info">
											<h3>6 Month</h3>
											<p></p><p>$25 a month subscription paid in one payment of $150 every 6 months</p>
<p></p>
										</div>
																				<a class="fre-service-btn primary-color-hover" href="https://inbetweenthechair.com/stage/upgrade-account/?pack_id=641">Purchase</a>
									</div>
								</div>
                                 <div class="col-md-3 col-sm-6">
									<div class="fre-service-pricing">
										<div class="service-price">
											<h2><sup>$</sup>180.00</h2> 										</div>
										<div class="service-info">
											<h3>Yearly</h3>
											<p></p><p>$15 a month for a year with a subscription paid in 1 payment of $180 every year</p>
<p></p>
										</div>
																				<a class="fre-service-btn primary-color-hover" href="https://inbetweenthechair.com/stage/upgrade-account/?pack_id=642">Purchase</a>
									</div>
								</div> 			</div>
		</div>
		<div class="col-md-1 hidden-sm"></div>
	</div>
</div>		</div>
	</div>
<?php } ?>
<!-- List Pricing Plan -->
<?php get_footer(); ?>