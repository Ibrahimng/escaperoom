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

	$aboutus_tabs = get_field('about_us_tab');

?>



	
	<div id="primary" class="container">
		<main id="main" class="site-main" role="main">
			<div class="custom_page_coontetn">

				<ul class="nav nav-pills nav-stacked col-md-2">

			    <?php 

			      if(is_array($aboutus_tabs)){
			      		$counter = 0;
				        foreach($aboutus_tabs as $aboutus_tab) {
				            $counter++;    
       			 ?>
				  <li class="post-<?php the_ID(); ?> <?=($counter == 1) ? 'active' : ''?>"><a href="#post-<?php echo $counter; ?>" data-toggle="pill">
				  	<?php echo $aboutus_tab['about_tab_title']; ?>
				  </a></li>

				<?php  } } ?>
				</ul>
				<div class="tab-content col-md-10">
					<?php
						if(is_array($aboutus_tabs)){
				        $counter = 0;
				        foreach($aboutus_tabs as $aboutus_tab) {
				            $counter++;
				       
			        ?>
				        <div class="tab-pane <?=($counter == 1) ? 'active' : ''?>" id="post-<?php echo $counter; ?>">
				             <?php echo $aboutus_tab['about_content']; ?>
				        </div>
			        <?php  }  } ?>
				</div>

			</div><!-- tab content -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

