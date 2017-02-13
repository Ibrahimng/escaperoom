<?php 


/* ===================================
Escaperoom Most Popular Product
=====================================*/


/*
 * Set post views count using post meta
 */

function get_view_count_fun( $post_id ) {
	$count_key = 'wcmvp_product_view_count';
	$count     = get_post_meta( $post_id, $count_key, true );
	if ( empty( $count ) ) {
		delete_post_meta( $post_id, $count_key );
		add_post_meta( $post_id, $count_key, '0' );
		$count = '0';
	}

	return $count;
}

function get_view_count_html_fun( $product_id = 0 ) {
	if ( empty( $product_id ) ) {
		return '';
	}
	$view_count      = get_view_count_fun( $product_id );
	$view_count_html = '<span class="product-views">' . $view_count . ' ' . __( 'Views', 'woo-most-viewed-products' ) . '  </span>';

	return apply_filters( 'wcmvp_view_count_html', $view_count_html, $product_id, $view_count );
}


class Escaperoom_mostpropullar_widgets extends WP_Widget
	{
	/**
	 * quick_links constructor.
	 */
	public function __construct()
	{
		parent::__construct(false, $name = "Escaperoom Popular View", array("description" => "Escaperoom show all Popular View"));
	}

	/**
	 * @see WP_Widget::widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget($args, $instance)
	{

		// render widget in frontend
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		if ( ! empty( $instance['show_number'] ) )
			$show_number = $instance['show_number'];
		
		
		 ?>
	

<?php 



		$count_key                = 'wcmvp_product_view_count';
		$query_args               = array(
			'posts_per_page' => $show_number,
			'no_found_rows'  => 1,
			'post_status'    => 'publish',
			'post_type'      => 'product',
			'orderby'        => 'meta_value_num',
			'order'          => 'DESC',
			'meta_key'       => $count_key,
		);
		$query_args['meta_query'] = array(
			array(
				'key'     => $count_key,
				'value'   => '0',
				'type'    => 'numeric',
				'compare' => '>',
			),
		);
		$r                        = new WP_Query( $query_args );
		if ( $r->have_posts() ) {
			
			echo '<ul class="product_list_widget">';
			while ( $r->have_posts() ) {
				$r->the_post();
				global $product;
				?>
				<li>
					<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>"
					   title="<?php echo esc_attr( $product->get_title() ); ?>">
						<?php echo $product->get_image(); ?>
						<span class="product-title"><?php echo $product->get_title(); ?></span>
					</a>
					<?php echo get_view_count_html_fun( $product->id ); ?>
					<?php echo $product->get_price_html(); ?>
				</li>
				<?php
			}
			echo '</ul>';
			
		} else {
			echo '<ul class="product_list_widget">';
			echo '<li>' . __( 'No products have been viewed yet !!', 'woo-most-viewed-products' ) . '</li>';
			echo '</ul>';
		}
		wp_reset_postdata();


		

		echo $args['after_widget'];
	}


	/**
	 * @see WP_Widget::update
	 *
	 * @param array $newInstance
	 * @param array $oldInstance
	 *
	 * @return array
	 */
	public function update($newInstance, $oldInstance)
	{
		$instance = $oldInstance;
		$instance['title'] = ( ! empty( $newInstance['title'] ) ) ? strip_tags( $newInstance['title'] ) : '';
		$instance['show_number'] = ( ! empty( $newInstance['show_number'] ) ) ? strip_tags( $newInstance['show_number'] ) : '';
		return $instance;
	}
	
	/**
	 * @see WP_Widget::form
	 *
	 * @param array $instance
	 */
	public function form($instance)
	{
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else {
			$title = __( 'Filtter Popular View', 'Escaperoom_mostpropullar_widgets' );
		}

		if ( isset( $instance[ 'show_number' ] ) ) {
			$show_number = $instance[ 'show_number' ];
		}
		else {
			$show_number = __( '5', 'Escaperoom_mostpropullar_widgets' );
		}
		
		
?>	
		

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('show_number'); ?>"><?php _e( 'Show Number:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'show_number' ); ?>" name="<?php echo $this->get_field_name( 'show_number' ); ?>" type="number" value="<?php echo esc_attr( $show_number ); ?>" />
		</p>
<?php		

	}
}

add_action('widgets_init', create_function('', 'return register_widget("Escaperoom_mostpropullar_widgets");'));
