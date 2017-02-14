<?php 


/* ===================================
Escaperoom Store Social Media
=====================================*/

class Escaperoom_store_socialmedia_widgets extends WP_Widget
	{
	/**
	 * quick_links constructor.
	 */
	public function __construct()
	{
		parent::__construct(false, $name = "Escaperoom Store Social Media", array("description" => "Escaperoom show all Store Social Media"));
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
		//echo $args['before_title'] . $title . $args['after_title'];
		
		?>
		<?php 
		global $product, $post, $author, $store_info;

		$author = get_user_by('id', $post->post_author);
		$store_info = dokan_get_store_info( $author->ID );
		
		$dokanurl = dokan_get_store_url( $author->ID );
		$storename =  $store_info['store_name'];


		echo '<div class="store_social_media">
					<div id="share_buttons">
					    <ul class="list-inline">
					    	<li>
					    		<!-- Facebook -->
							    <a href="http://www.facebook.com/sharer.php?u='. $dokanurl.'&amp;text='. $storename.'" target="_blank">
							        <span class="fa fa-facebook"></span>Share
							    </a>
					    	</li>
					    	<li>
					    		<!-- Twitter -->
							    <a href="https://twitter.com/share?url='. $dokanurl.'&amp;text='. $storename.'" target="_blank">
							        <span class="fa fa-twitter"></span>Twitter
							    </a>
					    	</li>
					    	<li>
					    		<!-- Email -->
								<a href="mailto:?Subject='. $storename.'&amp;Body='. $storename.'&amp; '. $dokanurl.'">
							        <span class="fa fa-envelope-o"></span>Email
							    </a>
					    	</li>
					    </ul>
					</div>
				</div>';
	//	return $html;
		?>

		<?php 

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
			$title = __( 'Store Social Media', 'Escaperoom_store_socialmedia_widgets' );
		}
		
		
?>	
		

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
<?php		

	}
}

add_action('widgets_init', create_function('', 'return register_widget("Escaperoom_store_socialmedia_widgets");'));
