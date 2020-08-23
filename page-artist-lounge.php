<?php
/**
 * Template Name: Artist Lounge
 *
 * This is the template that displays all pages with using visual composer to edit it
 *
 * @package WordPress
 * @subpackage FreelanceEngine
 * @since FreelanceEngine 1.0
 */

get_header();

if(have_posts()) { the_post();
	//the_title();
 ?>
 <div class="fre-page-wrapper">
    <div class="fre-page-section">
        <div class="container">
        <?php the_content(); ?>
        </div>
    </div>
</div>
<?php
}
get_footer();
