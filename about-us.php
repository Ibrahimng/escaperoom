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

get_header(); ?>
	
	<div id="primary" class="container">
		<main id="main" class="site-main" role="main">
			<div class="custom_page_coontetn">

				<ul class="nav nav-pills nav-stacked col-md-2">

				 <?php 
				 	$loop = new WP_Query( array( 'post_type' => 'esr_custom_pages', 'posts_per_page' => -1 ) ); ?>
			        <?php 
			        $counter = 0;
			        while ( $loop->have_posts() ) : $loop->the_post(); 
			            $counter++;
       			 ?>

				  <li class="post-<?php the_ID(); ?> <?=($counter == 1) ? 'active' : ''?>"><a href="#post-<?php the_ID(); ?>" data-toggle="pill"><?php the_title();?></a></li>
				<?php endwhile; wp_reset_query(); ?>
				</ul>
				<div class="tab-content col-md-10">
					<?php
				        $counter = 0;
				        $loop = new WP_Query( array( 'post_type' => 'esr_custom_pages', 'posts_per_page' => -1 ) );
				        while ( $loop->have_posts() ) : $loop->the_post(); 
				            $counter++;
			        ?>
				        <div class="tab-pane <?=($counter == 1) ? 'active' : ''?>" id="post-<?php the_ID(); ?>">
				             <?php the_content();?>
				        </div>
			        <?php endwhile; ?>
				</div>

			</div><!-- tab content -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

