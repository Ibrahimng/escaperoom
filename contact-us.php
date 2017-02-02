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
			            	   $contact_us_heading = cs_get_option( 'contact_us_heading' );
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
			                <!-- <form>
			                <div class="row">
			                    <div class="col-md-6">
			                        <div class="form-group">
			                            <label for="name">
			                                Name</label>
			                            <div class="input-group">
			                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
			                                </span>    
			                            	<input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required="required" />
			                            </div>	
			                        </div>
			                        <div class="form-group">
			                            <label for="email">
			                                Email Address</label>
			                            <div class="input-group">
			                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
			                                </span>
			                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" />
			                            </div>
			                        </div>
			                        <div class="form-group">
			                            <label for="email">
			                                Subject</label>
			                            <div class="input-group">
			                                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span>
			                                </span>
			                                <input type="text" class="form-control" id="subject" placeholder="Enter Subject" required="required" />
			                            </div>
			                        </div>
			                    </div>
			                    <div class="col-md-6">
			                        <div class="form-group">
			                            <label for="name">
			                                Message</label>
			                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
			                                placeholder="Message"></textarea>
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
			                            Send Message</button>
			                    </div>
			                </div>
			                </form> -->


			                <?php echo do_shortcode('[contact-form-7 id="134" title="contact from"]'); ?>

			            </div>
			        </div>
			        <div class="col-md-3">
			        	<?php 
			        		$contact_us_text = cs_get_option( 'contact_us_text' ); 
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
get_sidebar();
get_footer();
