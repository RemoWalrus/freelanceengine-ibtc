<?php
/**
 * Template Name: Pricing ARTIST
 */

get_header();
global $user_ID;
?>

<!-- List Pricing Plan -->

<div class="fre-service">
  <div class="container">
			<h2 id="title_service">
				Select an Artist Plan</h2>
			<div class="fre-service-content">
                <p style="text-align: center; font-size: 1.3em;">Our platform solely caters to an Artist’s creative appetite to find jobs, connect, and be inspired.</p>
                
	<div class="row">
		<div class="col-md-1 hidden-sm"></div>
		<div class="col-md-12">
			<div class="row fre-service-package-list">
					    		<div class="col-md-3 col-sm-6">
									<div class="fre-service-pricing">
										<div class="service-price">
											<h2>FREE</h2> 	
                                        </div>
										<div class="service-info">
											<h3>Basic </h3>
											<p></p><p>Try us out for free and see what we’re about</p>
                                         <br>
                                            
<p></p>
                                            
										</div>
												<a class="fre-btn primary-bg-color" data-hover="Sign Up" href="<?php echo et_get_page_link('register', array("role"=>'freelancer')); ?>"><?php _e('<span>Sign Up</span>', ET_DOMAIN);?></a>
                                        <div class="service-info">
                                        <ul>
                                                <li>No Commitments</li>
                                                <li>Create a profile and portfolio</li>
                                                <li>Browse competitive beauty jobs</li>
                                                <li>Connect and learn with your peers in the Artists’ Lounge </li>
                                         </ul> 
                                        </div>
										
                                      
									</div>
								</div>
                                <div class="col-md-3 col-sm-6">
                	            <div class="fre-service-pricing">
										<div class="service-price">
											<h2><sup>$</sup>35<sub style="font-size:.3em; ">/month</sub></h2> 										</div>
										<div class="service-info">
											<h3>Artist Light</h3>
											<p></p><p>Pay as you go Month to Month</p>
<p></p>
										</div>
												<a class="fre-btn primary-bg-color" href="<?php echo get_site_url(); ?>/upgrade-account/">Upgrade</a>
                                        <div class="service-info">
                                        <ul>
                                            <li>Month-to-month subscription</li>
                                            <li>Create a profile and portfolio</li>
                                            <li>Browse competitive beauty jobs</li>
                                            <li>Apply to unlimited beauty jobs</li>
                                            <li>Connect and learn with your peers in the Artists’ Lounge </li>
                                         </ul> 
                                        </div>
								</div>
								</div>
                                <div class="col-md-3 col-sm-6">
									<div class="fre-service-pricing">
										<div class="service-price">
											<h2><sup>$</sup>25<sub style="font-size:.3em; ">/month</sub></h2> 										</div>
										<div class="service-info">
											<h3>Artist Standard</h3>
											<p></p><p>28% Savings Six month subscription paid in one payment of $150 every 6 months</p>
<p></p>
										</div>
												<a class="fre-btn primary-bg-color" href="<?php echo get_site_url(); ?>/upgrade-account/">Upgrade</a>
                                        <div class="service-info">
                                        <ul>
                                            <li>6 month subscription</li>
                                            <li>Create a profile and portfolio</li>
                                            <li>Browse competitive beauty jobs</li>
                                            <li>Apply to unlimited beauty jobs</li>
                                            <li>Connect and learn with your peers in the Artists’ Lounge </li>
                                         </ul> 
                                        </div>
									</div>
								</div>
                                 <div class="col-md-3 col-sm-6">
									<div class="fre-service-pricing">
										<div class="service-price">
											<h2><sup>$</sup>15<sub style="font-size:.3em; ">/month</sub></h2> 										</div>
										<div class="service-info">
											<h3>Artist Premium</h3>
											<p></p><p>57% Savings Annual subscription paid in one payment of $180 every year</p>
<p></p>
										</div>
												
                                            <a class="fre-btn primary-bg-color" href="h<?php echo get_site_url(); ?>/upgrade-account/">Upgrade</a>
                                        <div class="service-info">
                                         <ul>
                                            <li>1 year subscription</li>
                                            <li>Create a profile and portfolio</li>
                                            <li>Browse competitive beauty jobs</li>
                                            <li>Apply to unlimited beauty jobs</li>
                                            <li>Connect and learn with your peers in the Artists’ Lounge </li>
                                         </ul> 
                                        </div>
									</div>
								</div> 			</div>
		</div>
		<div class="col-md-1 hidden-sm"></div>
	</div>

    </div>		
  </div>
</div>

<!-- List Pricing Plan -->
<?php get_footer(); ?>