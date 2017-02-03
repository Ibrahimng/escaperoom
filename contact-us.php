<?php
/* Template Name: Contact Us */
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package escaperoom
 */

get_header(); ?>
	
	<div id="primary" class="container">
		<main id="main" class="site-main" role="main">
			<div class="contact_us contact_us-sm">
			    <div class="container">
			        <div class="row">
			            <div class="col-sm-12 col-lg-12">
			            	<?php 
			            	   $contact_us_heading = get_field( 'contact_us_title' );
			            	   if($contact_us_heading) {
			            	   	echo $contact_us_heading;
			            	   }
			            	   else {
			            	   		echo '<h1>Contact us <small>Feel free to contact us</small></h1>';
			            	   }
			            	?>   	
			            </div>
			        </div>
			    </div>
			</div>
			<div class="container">
			    <div class="row">
			        <div class="col-md-9">
			            <div class="well well-sm">

			                <?php echo do_shortcode('[contact-form-7 id="134" title="contact from"]'); ?>

			            </div>
			        </div>
			        <div class="col-md-3">
			        	<?php 
			        		$contact_us_text = get_field( 'contact_us_address' ); 
			        		if($contact_us_text){
			        			echo $contact_us_text;
			        		}
			        	?>
			            
			        </div>
			    </div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
