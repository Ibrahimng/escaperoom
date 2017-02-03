<?php
/* Template Name: About Us */
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

get_header(); 

	$about_get_meta = get_post_meta( get_the_ID(), '_aboutus_options', true);

	$about_us_items = $about_get_meta['about_us'];




?>



	
	<div id="primary" class="container">
		<main id="main" class="site-main" role="main">
			<div class="custom_page_coontetn">

				<ul class="nav nav-pills nav-stacked col-md-2">

				
			    <?php 

			      if(is_array($about_us_items)){
			      		$counter = 0;
				        foreach($about_us_items as $about_us_item) {
				            $counter++;    
       			 ?>

				  <li class="post-<?php the_ID(); ?> <?=($counter == 1) ? 'active' : ''?>"><a href="#post-<?php the_ID(); ?>" data-toggle="pill">
				  	<?php echo $about_us_item['about_title']; ?>
				  </a></li>

				<?php  } } ?>
				</ul>


				<div class="tab-content col-md-10">
					<?php
						if(is_array($about_us_items)){
				        $counter = 0;
				        foreach($about_us_items as $about_us_item) {
				            $counter++;
				       
			        ?>
				        <div class="tab-pane <?=($counter == 1) ? 'active' : ''?>" id="post-<?php the_ID(); ?>">
				             <?php echo $about_us_item['about_content']; ?>
				        </div>
			        <?php  }  } ?>
				</div>

			</div><!-- tab content -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

