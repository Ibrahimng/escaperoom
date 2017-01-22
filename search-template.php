<?php
/*
Template name: Search Page
*/
get_header(); 
$search = new WP_Advanced_Search('escaperoom_search'); 
?>
	<div class="whitespace"></div>
	<section id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">

        <?php 
         $temp = $wp_query;
         $wp_query = $search->query();
         ?>
         <h4 class="results-count">
           Displaying <?php echo $search->results_range(); ?> 
           of <?php echo $wp_query->found_posts; ?> results
         </h4>

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'escaperoom' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->


			<div class="row">

			<?php
			$counter = 0;
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				++$counter;
					//var_dump($counter);
					if($counter == 3){
						$clearfix = '<div class="clearfix"></div>';
						$counter = 0;
					}
					else{
						$clearfix = '';
					}
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				wc_get_template_part( 'content', 'product' );

				echo $clearfix;
			endwhile; 

			?>
			<div>

			<?php 
			//the_posts_navigation();

		else :

			echo __( 'No products found' );

		endif; 
		$search->pagination();
		$wp_query = $temp;
		wp_reset_query();

         ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
?>