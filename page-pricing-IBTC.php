<?php
/**
 * Template Name: Pricing IBTC
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

	if( ( in_array( $user_role, array( FREELANCER,'subscriber') ) || current_user_can('manage_options') )  &&  ! $is_post_free ) { ?>
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
                                      
											<p class="freelance-yourplan">Your Plan</p>
                                        <div class="service-list">
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
                                        <div class="service-list">
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
                                        <div class="service-list">
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
                                        <div class="service-list">
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


<?php
	} else if(  in_array( $user_role, array( EMPLOYER,'administrator'  ) ) && $pay_to_bid && ! current_user_can('manage_options') ) {
		$show_project_pack = true;
	}

} else { // visitor.
	if( $pay_to_bid ){ ?>
<div class="fre-page-wrapper">
<div class="fre-page-title">
 <ul class="fre-tabs nav-tabs-my-work">
                        <li class="active"><a data-toggle="tab"
                             href="#artist-pricing-tab"><span><?php _e( 'Artists', ET_DOMAIN ); ?></span></a>
                        </li>
                        <li class="next"><a data-toggle="tab"
                            href="#employer-pricing-tab"><span><?php _e( 'Employers', ET_DOMAIN ); ?></span></a>
                        </li>
                   </ul>
   </div> 
    
<div class="fre-tab-content fre-service logout">
 <div id="artist-pricing-tab" class="freelancer-current-project-tab fre-panel-tab active">     
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
											<h3>Artist Basic </h3>
											<p></p><p>Try us out for free and see what we’re about</p>
                                         <br>
                                            
<p></p>
                                            
										</div>
                                      
											<a class="fre-btn primary-bg-color" data-hover="Sign Up" href="<?php echo et_get_page_link('register', array("role"=>'freelancer')); ?>"><?php _e('<span>Sign Up</span>', ET_DOMAIN);?></a>
                                        <div class="service-list">
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
												<a class="fre-btn primary-bg-color" data-hover="Sign Up" href="<?php echo et_get_page_link('register', array("role"=>'freelancer')); ?>"><?php _e('<span>Sign Up</span>', ET_DOMAIN);?></a>
                                        <div class="service-list">
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
												<a class="fre-btn primary-bg-color" data-hover="Sign Up" href="<?php echo et_get_page_link('register', array("role"=>'freelancer')); ?>"><?php _e('<span>Sign Up</span>', ET_DOMAIN);?></a>
                                        <div class="service-list">
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
												
                                           <a class="fre-btn primary-bg-color" data-hover="Sign Up" href="<?php echo et_get_page_link('register', array("role"=>'freelancer')); ?>"><?php _e('<span>Sign Up</span>', ET_DOMAIN);?></a>
                                        <div class="service-list">
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

<!-- employer Pricing -->
 <div id="employer-pricing-tab" class="freelancer-current-project-tab fre-panel-tab">       
  <div class="container">
			<h2 id="title_service">
				Select an Employer Plan</h2>
			<div class="fre-service-content">
                <p style="text-align: center; font-size: 1.3em;">Our platform solely caters to an Artist’s creative appetite to find jobs, connect, and be inspired.</p>
                
	<div class="row">
		<div class="col-md-1 hidden-sm"></div>
		<div class="col-md-10">
			<div class="row fre-service-package-list">
					    		<div class="col-md-4 col-sm-6">
									<div class="fre-service-pricing">
										<div class="service-price">
											<h2>FREE</h2> 	
                                        </div>
										<div class="service-info">
											<h3>Employer Basic </h3>
											<p></p><p>Try us out for free and see what we’re about</p>
                                         <br>
                                            
<p></p>
                                            
										</div>
                                      
											<a class="fre-btn primary-bg-color" data-hover="Sign Up" href="<?php echo et_get_page_link('register', array("role"=>'employer')); ?>"><?php _e('<span>Sign Up</span>', ET_DOMAIN);?></a>
                                        <div class="service-list">
                                        <ul>
                                                <li>No Commitments</li>
                                                <li>Create a profile for your business</li>
                                                <li>Browse competitive beauty jobs</li>
                                                <li>Unlimited access to browse our Artists’ profiles</li>
                                         </ul> 
                                        </div>
										
                                      
									</div>
								</div>
                                <div class="col-md-4 col-sm-6">
                	            <div class="fre-service-pricing">
										<div class="service-price">
											<h2><sup>$</sup>30<sub style="font-size:.3em; ">/post</sub></h2> 										</div>
										<div class="service-info">
											<h3>Employer Premium</h3>
											<p></p><p>Pay as you go Month to Month</p>
<p></p>
										</div>
												<a class="fre-btn primary-bg-color" data-hover="Sign Up" href="<?php echo et_get_page_link('register', array("role"=>'employer')); ?>"><?php _e('<span>Sign Up</span>', ET_DOMAIN);?></a>
                                    
                                    
                                        <div class="service-list">
                                        <ul>
                                            <li>Create a profile for your business</li>
                                            <li>Unlimited access to browse our Artists’ profiles</li>
                                            <li>Post jobs for $30 per unique listing</li>
                                            <li>Post 1 job active for 30 days</li>
                                            <li>Renew your existing job listing for $30 if you  need more time to find an Artist</li>
                                         </ul> 
                                        </div>
								</div>
								</div>
                                <div class="col-md-4 col-sm-6">
									<div class="fre-service-pricing">
										<div class="service-price">
											<h2><sup>$</sup>400<sub style="font-size:.3em; ">/year</sub></h2> 										</div>
										<div class="service-info">
											<h3>Employer Unlimited</h3>
											<p></p><p>Annual subscription paid in one payment of $400 every year</p>
<p></p>
										</div>
												<a class="fre-btn primary-bg-color" data-hover="Sign Up" href="<?php echo et_get_page_link('register', array("role"=>'employer')); ?>"><?php _e('<span>Sign Up</span>', ET_DOMAIN);?></a>
                                        <div class="service-list">
                                        <ul>
                                            <li>Create a profile for your business</li>
                                            <li>Unlimited access to browse our Artists’ profiles</li>
                                            <li>Post unlimited jobs, each one stays active for 30 days - no monthly caps!</li>
                                            <li>Apply to unlimited beauty jobs</li>
                                            <li>Renew your existing job listing for free if you need more time to find an Artist</li>
                                         </ul> 
                                        </div>
									</div>
								</div>
                  </div>
		  </div>
		<div class="col-md-1 hidden-sm"></div>
	</div>

    </div>		
  </div>
</div>        
</div>
</div>

<?php	} else if( ! $is_post_free ){
		$show_project_pack = true;
	}
}

if( $show_project_pack || $show_bid_pack ){ ?>
		
<div class="fre-service">
  <div class="container">
			<h2 id="title_service">
				Select an Employer Plan</h2>
			<div class="fre-service-content">
                <p style="text-align: center; font-size: 1.3em;">Our platform solely caters to an Artist’s creative appetite to find jobs, connect, and be inspired.</p>
                
	<div class="row">
		<div class="col-md-1 hidden-sm"></div>
		<div class="col-md-10">
			<div class="row fre-service-package-list">
					    		<div class="col-md-4 col-sm-6">
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
                                      
											<p class="freelance-yourplan">Your Plan</p>
                                        <div class="service-list">
                                        <ul>
                                                <li>No Commitments</li>
                                                <li>Create a profile for your business</li>
                                                <li>Browse competitive beauty jobs</li>
                                                <li>Unlimited access to browse our Artists’ profiles</li>
                                         </ul> 
                                        </div>
										
                                      
									</div>
								</div>
                                <div class="col-md-4 col-sm-6">
                	            <div class="fre-service-pricing">
										<div class="service-price">
											<h2><sup>$</sup>30<sub style="font-size:.3em; ">/post</sub></h2> 										</div>
										<div class="service-info">
											<h3>Employer Basic</h3>
											<p></p><p>Pay as you go Month to Month</p>
<p></p>
										</div>
												<a class="fre-btn primary-bg-color" href="<?php echo get_site_url(); ?>/submit-project/">Upgrade</a>
                                    
                                    
                                        <div class="service-list">
                                        <ul>
                                            <li>Create a profile for your business</li>
                                            <li>Unlimited access to browse our Artists’ profiles</li>
                                            <li>Post jobs for $30 per unique listings</li>
                                            <li>Post 1 job active for 30 days</li>
                                            <li>Renew your existing job listing for $30 if you  need more time to find an Artist</li>
                                         </ul> 
                                        </div>
								</div>
								</div>
                                <div class="col-md-4 col-sm-6">
									<div class="fre-service-pricing">
										<div class="service-price">
											<h2><sup>$</sup>400<sub style="font-size:.3em; ">/year</sub></h2> 										</div>
										<div class="service-info">
											<h3>Employer Unlimited</h3>
											<p></p><p>Annual subscription paid in one payment of $400 every year</p>
<p></p>
										</div>
												<a class="fre-btn primary-bg-color" href="<?php echo get_site_url(); ?>/submit-project/">Upgrade</a>
                                        <div class="service-list">
                                        <ul>
                                            <li>Create a profile for your business</li>
                                            <li>Unlimited access to browse our Artists’ profiles</li>
                                            <li>Post unlimited jobs, each one stays active for 30 days - no monthly caps!</li>
                                            <li>Apply to unlimited beauty jobs</li>
                                            <li>Renew your existing job listing for free if you need more time to find an Artis</li>
                                         </ul> 
                                        </div>
									</div>
								</div>
                  </div>
		  </div>
		<div class="col-md-1 hidden-sm"></div>
	</div>

    </div>		
  </div>
</div>

<?php } ?>
<!-- List Pricing Plan -->
<?php get_footer(); ?>