<?php 


/* ===================================
Escaperoom Most Popular Product
=====================================*/



class Escaperoom_persons_quantity_widgets extends WP_Widget
	{
	/**
	 * quick_links constructor.
	 */
	public function __construct()
	{
		parent::__construct(false, $name = "Escaperoom Persons Quantity", array("description" => "Escaperoom show Filtter by Persons Quantity"));
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
		 ?>
		
		<div class="person-filter">
		    <p>
		        <label for="quantity">Filter by Persons:</label>
		        <input type="text" id="quantity" style="border:0; color:#f6931f; font-weight:bold;" />
		    </p>

	   		 <div id="person-filter"></div>
   		 </div>



		<?php echo $args['after_widget'];
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
			$title = __( 'Filtter Persons Quantity', 'Escaperoom_persons_quantity_widgets' );
		}

		
?>	
		

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
<?php		

	}
}

add_action('widgets_init', create_function('', 'return register_widget("Escaperoom_persons_quantity_widgets");'));
