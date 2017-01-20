<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package escaperoom
 */

get_header(); ?>

	<div id="primary" class="container">
		<main id="main" class="site-main" role="main">
            <div class="row">
                <div class="col-xs-12">
                    <div class="error-content section-title text-center">
						<h1>
							<span class="four">4</span>
							<span class="zero">0</span>
							<span class="four">4</span>
						</h1>
                        <h2><span>oops !</span> page not found</h2>
                        <p>The page you are looking for was moved, removed,<br> 
						renamed or might never existed.</p>
                        <a href="<?php bloginfo('url'); ?>" class="back-home">back to homepage</a>
                    </div>    
                </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
