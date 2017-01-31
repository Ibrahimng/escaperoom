<?php
global $post;

$from_shortcode = false;

if ( isset( $post->ID ) && $post->ID && $post->post_type == 'product' ) {
    $post_id      = $post->ID;
    $post_title   = $post->post_title;
    $post_content = $post->post_content;
    $post_excerpt = $post->post_excerpt;
    $post_status  = $post->post_status;
} else {
    $post_id        = NULL;
    $post_title     = '';
    $post_content   = '';
    $post_excerpt   = '';
    $post_status    = 'pending';
    $from_shortcode = true;
}

if ( isset( $_GET['product_id'] ) ) {
    $post_id        = intval( $_GET['product_id'] );
    $post           = get_post( $post_id );
    $post_title     = $post->post_title;
    $post_content   = $post->post_content;
    $post_excerpt   = $post->post_excerpt;
    $post_status    = $post->post_status;
    $product        = get_product( $post_id );
    $from_shortcode = true;
}


$_regular_price         = get_post_meta( $post_id, '_regular_price', true );
$_sale_price            = get_post_meta( $post_id, '_sale_price', true );
$is_discount            = !empty( $_sale_price ) ? true : false;
$_sale_price_dates_from = get_post_meta( $post_id, '_sale_price_dates_from', true );
$_sale_price_dates_to   = get_post_meta( $post_id, '_sale_price_dates_to', true );

$_sale_price_dates_from = !empty( $_sale_price_dates_from ) ? date_i18n( 'Y-m-d', $_sale_price_dates_from ) : '';
$_sale_price_dates_to   = !empty( $_sale_price_dates_to ) ? date_i18n( 'Y-m-d', $_sale_price_dates_to ) : '';
$show_schedule          = false;

if ( !empty( $_sale_price_dates_from ) && !empty( $_sale_price_dates_to ) ) {
    $show_schedule = true;
}

$_featured       = get_post_meta( $post_id, '_featured', true );
// $_weight            = get_post_meta( $post_id, '_weight', true );
// $_length            = get_post_meta( $post_id, '_length', true );
// $_width             = get_post_meta( $post_id, '_width', true );
// $_height            = get_post_meta( $post_id, '_height', true );
$_downloadable   = get_post_meta( $post_id, '_downloadable', true );
$_stock          = get_post_meta( $post_id, '_stock', true );
$_stock_status   = get_post_meta( $post_id, '_stock_status', true );
$_visibility     = get_post_meta( $post_id, '_visibility', true );
$_enable_reviews = $post->comment_status;

$has_persons  = get_post_meta( $post_id, '_wc_booking_has_persons', true );
$has_resource = get_post_meta( $post_id, '_wc_booking_has_resources', true );

/* custom fields azizultex */
$location_lat          = get_post_meta( $post_id, 'location_lat', true );
$location_long         = get_post_meta( $post_id, 'location_long', true );
$number_of_person        = get_post_meta( $post_id, 'number_of_person', true );


?>

<header class="dokan-dashboard-header dokan-clearfix">
    <h1 class="entry-title">
        <?php if ( !$post_id ): ?>
            <?php _e( 'Add ', 'dokan-wc-booking' ); ?>
        <?php else: ?>
            <?php _e( $title , 'dokan-wc-booking' ); ?>
            <span class="dokan-label <?php echo dokan_get_post_status_label_class( $post->post_status ); ?> dokan-product-status-label">
                <?php echo dokan_get_post_status( $post->post_status ); ?>
            </span>

            <?php if ( $post->post_status == 'publish' ) { ?>
                <span class="dokan-right">
                    <a class="view-product dokan-btn dokan-btn-sm" href="<?php echo get_permalink( $post->ID ); ?>" target="_blank"><?php _e( 'View Product', 'dokan-wc-booking' ); ?></a>
                </span>
            <?php } ?>

            <?php if ( $_visibility == 'hidden' ) { ?>
                <span class="dokan-right dokan-label dokan-label-default dokan-product-hidden-label"><i class="fa fa-eye-slash"></i> <?php _e( 'Hidden', 'dokan-wc-booking' ); ?></span>
            <?php } ?>

        <?php endif ?>
    </h1>
</header><!-- .entry-header -->

<div class="product-edit-new-container">
    <?php if ( Dokan_Template_Products::$errors ) { ?>
        <div class="dokan-alert dokan-alert-danger">
            <a class="dokan-close" data-dismiss="alert">&times;</a>

            <?php foreach ( Dokan_Template_Products::$errors as $error ) { ?>

                <strong><?php _e( 'Error!', 'dokan-wc-booking' ); ?></strong> <?php echo $error ?>.<br>

            <?php } ?>
        </div>
    <?php } ?>

    <?php if ( isset( $_GET['message'] ) && $_GET['message'] == 'success' ) { ?>
        <div class="dokan-message">
            <button type="button" class="dokan-close" data-dismiss="alert">&times;</button>
            <strong><?php _e( 'Success!', 'dokan-wc-booking' ); ?></strong> <?php _e( 'The product has been saved successfully.', 'dokan-wc-booking' ); ?>

            <?php if ( $post->post_status == 'publish' ) { ?>
                <a href="<?php echo get_permalink( $post_id ); ?>" target="_blank"><?php _e( 'View Product &rarr;', 'dokan-wc-booking' ); ?></a>
            <?php } ?>
        </div>
    <?php } ?>

    <?php
    $can_sell = apply_filters( 'dokan_can_post', true );

    if ( $can_sell ) {

        if ( dokan_is_seller_enabled( get_current_user_id() ) ) {
            ?>

            <form class="dokan-product-edit-form" role="form" method="post">

                <?php
                if ( $post_id ):
                    do_action( 'dokan_product_data_panel_tabs' );
                endif;

                do_action( 'dokan_product_edit_before_main' );
                ?>

                <div class="dokan-form-top-area">

                    <div class="content-half-part">

                        <div class="dokan-form-group">
                            <input type="hidden" name="dokan_product_id" value="<?php echo $post_id; ?>">

                            <label for="post_title" class="form-label"><?php _e( 'Title', 'dokan-wc-booking' ); ?></label>
                            <div class="dokan-product-title-alert dokan-hide dokan-alert dokan-alert-danger">
                                <?php _e( 'Please choose a Name !!!', 'dokan-wc-booking' ); ?>
                            </div>
                            <?php dokan_post_input_box( $post_id, 'post_title', array( 'placeholder' => __( 'Product name..', 'dokan' ), 'value' => $post_title ) ); ?>
                        </div>

                        <div class="dokan-form-group">

                                <label for="product_category" class="form-label"><?php _e( 'Location', 'dokan-wc-booking' ); ?></label>
                                <div class="dokan-product-cat-alert dokan-hide dokan-alert dokan-alert-danger">
                                    <?php _e( 'Please choose a location !!!', 'dokan-wc-booking' ); ?>
                                </div>
                                <?php
                                $esr_locations = -1;
                                $term        = array();
                                $term        = wp_get_post_terms( $post_id, 'esr_locations', array( 'fields' => 'ids' ) );

                                if ( $term ) {
                                    $esr_locations = reset( $term );
                                }

                                $esr_locations_args = array(
                                    'show_option_none' => __( '- Select a location -', 'dokan' ),
                                    'hierarchical'     => 1,
                                    'hide_empty'       => 0,
                                    'name'             => 'esr_locations',
                                    'id'               => 'esr_locations',
                                    'taxonomy'         => 'esr_locations',
                                    'title_li'         => '',
                                    'class'            => 'dokan-select2 product_cat dokan-form-control chosen',
                                    'exclude'          => '',
                                    'selected'         => $esr_locations,
                                );

                                wp_dropdown_categories( apply_filters( 'dokan_product_category_dropdown_args', $esr_locations_args ) );
                                ?>
                            </div>



                        <div class="dokan-form-group">
                            <!-- latitude -->
                            <div class="half">
                                <label for="location_lat" class="form-label"><?php _e( 'Latitude', 'dokan-wc-booking' ); ?></label>
                                <div class="dokan-product-title-alert dokan-hide dokan-alert dokan-alert-danger">
                                    <?php _e( 'Latitude & Longititude required !!!', 'dokan-wc-booking' ); ?>
                                </div>
                                <?php dokan_post_input_box( $post_id, 'location_lat', array( 'placeholder' => __( 'Latitude', 'dokan' ), 'value' => $location_lat ) ); ?>
                            </div>   

                            <!-- longititude -->                         
                            <div class="half">
                                <label for="location_long" class="form-label"><?php _e( 'Longititude', 'dokan-wc-booking' ); ?></label>
                                <div class="dokan-product-title-alert dokan-hide dokan-alert dokan-alert-danger">
                                    <?php _e( 'Latitude & Longititude required !!!', 'dokan-wc-booking' ); ?>
                                </div>
                                <?php dokan_post_input_box( $post_id, 'location_long', array( 'placeholder' => __( 'Longititude', 'dokan' ), 'value' => $location_long ) ); ?>
                            </div>
                        </div>


                        <?php if ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ): ?>
                            <div class="dokan-form-group">

                                <label for="product_cat" class="form-label"><?php _e( 'Category', 'dokan-wc-booking' ); ?></label>
                                <div class="dokan-product-cat-alert dokan-hide dokan-alert dokan-alert-danger">
                                    <?php _e( 'Please choose a category !!!', 'dokan-wc-booking' ); ?>
                                </div>
                                <?php
                                $product_cat = -1;
                                $term        = array();
                                $term        = wp_get_post_terms( $post_id, 'product_cat', array( 'fields' => 'ids' ) );

                                if ( $term ) {
                                    $product_cat = reset( $term );
                                }

                                $category_args = array(
                                    'show_option_none' => __( '- Select a category -', 'dokan' ),
                                    'hierarchical'     => 1,
                                    'hide_empty'       => 0,
                                    'name'             => 'product_cat',
                                    'id'               => 'product_cat',
                                    'taxonomy'         => 'product_cat',
                                    'title_li'         => '',
                                    'class'            => 'dokan-select2 product_cat dokan-form-control chosen',
                                    'exclude'          => '',
                                    'selected'         => $product_cat,
                                );

                                wp_dropdown_categories( apply_filters( 'dokan_product_cat_dropdown_args', $category_args ) );
                                ?>
                            </div>
                        <?php elseif ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'multiple' ): ?>
                            <div class="dokan-form-group dokan-list-category-box">
                                <h5><?php _e( 'Choose a category', 'dokan-wc-booking' ); ?></h5>
                                <ul class="dokan-checkbox-cat">
                                    <?php
                                    $term = array();
                                    $term = wp_get_post_terms( $post_id, 'product_cat', array( 'fields' => 'ids' ) );

                                    include_once DOKAN_LIB_DIR . '/class.category-walker.php';
                                    wp_list_categories( array(
                                        'walker'       => new DokanCategoryWalker(),
                                        'title_li'     => '',
                                        'id'           => 'product_cat',
                                        'hide_empty'   => 0,
                                        'taxonomy'     => 'product_cat',
                                        'hierarchical' => 1,
                                        'selected'     => $term
                                    ) );
                                    ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="dokan-form-group">
                            <label for="product_tag" class="form-label"><?php _e( 'Tags', 'dokan-wc-booking' ); ?></label>
                            <?php
                            require_once DOKAN_LIB_DIR . '/class.taxonomy-walker.php';
                            $term           = wp_get_post_terms( $post_id, 'product_tag', array( 'fields' => 'ids' ) );
                            $selected       = ( $term ) ? $term : array();
                            $drop_down_tags = wp_dropdown_categories( array(
                                'show_option_none' => __( '', 'dokan' ),
                                'hierarchical'     => 1,
                                'hide_empty'       => 0,
                                'name'             => 'product_tag[]',
                                'id'               => 'product_tag',
                                'taxonomy'         => 'product_tag',
                                'title_li'         => '',
                                'class'            => ' dokan-select2 product_tags dokan-form-control chosen',
                                'exclude'          => '',
                                'selected'         => $selected,
                                'echo'             => 0,
                                'walker'           => new DokanTaxonomyWalker()
                            ) );

                            echo str_replace( '<select', '<select data-placeholder="' . __( 'Select product tags', 'dokan' ) . '" multiple="multiple" ', $drop_down_tags );
                            ?>
                        </div>

                        <div class="dokan-form-group">
                            <!-- Product videos -->
                            <label for="product_video" class="form-label"><?php _e( 'Add Product Video', 'dokan-wc-booking' ); ?></label>
                            <span class="dokan-tooltips-help tips" title="" data-original-title="<?php _e( 'You can add any video embed URL like Vimeo: <pre>https://player.vimeo.com/video/{videoid}</pre>, Youtube: <code>https://www.youtube.com/embed/{videoid}</code>', 'dokan-wc-booking' ) ?>">
                                <i class="fa fa-question-circle"></i>
                            </span>
                            <div class="dokan-product-title-alert dokan-hide dokan-alert dokan-alert-danger">
                                <?php _e( 'Product video required !', 'dokan-wc-booking' ); ?>
                            </div>
                            <?php dokan_post_input_box( $post_id, 'product_video', array( 'placeholder' => __( 'i.e. https://player.vimeo.com/video/197922418', 'dokan' ), 'value' => $product_video ) ); ?>
                        </div>

                    </div><!-- .content-half-part -->

                    <div class="content-half-part featured-image">

                        <div class="dokan-new-product-featured-img dokan-feat-image-upload">
                            <?php
                            $wrap_class        = ' dokan-hide';
                            $instruction_class = '';
                            $feat_image_id     = 0;

                            if ( has_post_thumbnail( $post_id ) ) {
                                $wrap_class        = '';
                                $instruction_class = ' dokan-hide';
                                $feat_image_id     = get_post_thumbnail_id( $post_id );
                            }
                            ?>

                            <div class="instruction-inside<?php echo $instruction_class; ?>">
                                <input type="hidden" name="feat_image_id" class="dokan-feat-image-id" value="<?php echo $feat_image_id; ?>">

                                <i class="fa fa-cloud-upload"></i>
                                <a href="#" class="dokan-feat-image-btn btn btn-sm"><?php _e( 'Upload a product cover image', 'dokan-wc-booking' ); ?></a>
                            </div>

                            <div class="image-wrap<?php echo $wrap_class; ?>">
                                <a class="close dokan-remove-feat-image">&times;</a>
                                <?php if ( $feat_image_id ) { ?>
                                    <?php echo get_the_post_thumbnail( $post_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array( 'height' => '', 'width' => '' ) ); ?>
                                <?php } else { ?>
                                    <img height="" width="" src="" alt="">
                                <?php } ?>
                            </div>
                        </div><!-- .dokan-feat-image-upload -->

                        <div class="dokan-product-gallery">
                            <div class="dokan-side-body" id="dokan-product-images">
                                <div id="product_images_container">
                                    <ul class="product_images dokan-clearfix">
                                        <?php
                                        $product_images = get_post_meta( $post_id, '_product_image_gallery', true );
                                        $gallery        = explode( ',', $product_images );

                                        if ( $gallery ) {
                                            foreach ( $gallery as $image_id ) {
                                                if ( empty( $image_id ) ) {
                                                    continue;
                                                }

                                                $attachment_image = wp_get_attachment_image_src( $image_id, 'thumbnail' );
                                                ?>
                                                <li class="image" data-attachment_id="<?php echo $image_id; ?>">
                                                    <img src="<?php echo $attachment_image[0]; ?>" alt="">
                                                    <a href="#" class="action-delete" title="<?php esc_attr_e( 'Delete image', 'dokan-wc-booking' ); ?>">&times;</a>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>

                                    <input type="hidden" id="product_image_gallery" name="product_image_gallery" value="<?php echo esc_attr( $product_images ); ?>">
                                </div>

                                <a href="#" class="add-product-images dokan-btn dokan-btn-sm dokan-btn-success"><?php _e( '+ Add more images', 'dokan-wc-booking' ); ?></a>
                            </div>
                        </div> <!-- .product-gallery -->
                    </div><!-- .content-half-part -->
                </div><!-- .dokan-form-top-area -->
                <div class="booking_fields">
                    <?php
                    $duration_type = get_post_meta( $post_id, '_wc_booking_duration_type', true );
                    $duration      = max( absint( get_post_meta( $post_id, '_wc_booking_duration', true ) ), 1 );
                    $duration_unit = get_post_meta( $post_id, '_wc_booking_duration_unit', true );

                    //availability 
                    $wc_booking_qty        = max( absint( get_post_meta( $post_id, '_wc_booking_qty', true ) ), 1 );
                    $booking_min_date_unit = get_post_meta( $post_id, '_wc_booking_min_date_unit', true );
                    $booking_max_date_unit = get_post_meta( $post_id, '_wc_booking_max_date_unit', true );


                    $booking_buffer_period = absint( get_post_meta( $post_id, '_wc_booking_buffer_period', true ) );

                    $booking_default_date_availability = get_post_meta( $post_id, '_wc_booking_default_date_availability', true );

                    $booking_confirmation = get_post_meta( $post_id, '_wc_booking_requires_confirmation', true );
                    $booking_cancellation = get_post_meta( $post_id, '_wc_booking_user_can_cancel', true );

                    //costs
                    //resources
                    $booking_resource_label      = get_post_meta( $post_id, '_wc_booking_resouce_label', true );
                    $booking_resource_assignment = get_post_meta( $post_id, '_wc_booking_resources_assignment', true );

                    $calendar_display_mode=get_post_meta($post_id,'_wc_booking_calendar_display_mode',true);

                    ?>

                    <div class="">
                        <label for="_wc_booking_duration_type" class="form-label"><?php _e( 'Booking duration', 'dokan-wc-booking' ); ?></label>
                        <div class="dokan-input-group">
                            <select name="_wc_booking_duration_type" id="_wc_booking_duration_type" class="dokan-form-control" style="width: auto; margin-right: 7px;">
                                <option value="fixed" <?php selected( $duration_type, 'fixed' ); ?>><?php _e( 'Fixed blocks of', 'dokan-wc-booking' ); ?></option>
                                <option value="customer" <?php selected( $duration_type, 'customer' ); ?>><?php _e( 'Customer defined blocks of', 'dokan-wc-booking' ); ?></option>
                            </select>
                            <input type="number" class="dokan-form-control" name="_wc_booking_duration" id="_wc_booking_duration" value="<?php echo $duration; ?>" step="1" min="1" style="margin-right: 7px; width: 4em;">
                            <select name="_wc_booking_duration_unit" id="_wc_booking_duration_unit" class="dokan-form-control short" style="width: auto; margin-right: 7px;">
                                <option value="month" <?php selected( $duration_unit, 'month' ); ?>><?php _e( 'Month(s)', 'dokan-wc-booking' ); ?></option>
                                <option value="day" <?php selected( $duration_unit, 'day' ); ?>><?php _e( 'Day(s)', 'dokan-wc-booking' ); ?></option>
                                <option value="hour" <?php selected( $duration_unit, 'hour' ); ?>><?php _e( 'Hour(s)', 'dokan-wc-booking' ); ?></option>
                                <option value="minute" <?php selected( $duration_unit, 'minute' ); ?>><?php _e( 'Minutes(s)', 'dokan-wc-booking' ); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="show_if_custom_block" style="display: none">
                        <div class="content-half-part">
                            <div class="dokan-form-group">
                                <label for="_wc_booking_min_duration" class="form-label"><?php _e( 'Minimum duration', 'dokan-wc-booking' ); ?></label>
                                <?php dokan_post_input_box( $post_id, '_wc_booking_min_duration', array( 'min' => '1', 'step' => 1, 'value' => max( absint( get_post_meta( $post_id, '_wc_booking_min_duration', true ) ), 1 ) ), 'number' ); ?>
                            </div>
                        </div>
                        <div class="content-half-part">
                            <div class="dokan-form-group">
                                <label for="_wc_booking_max_duration" class="form-label"><?php _e( 'Maximum duration', 'dokan-wc-booking' ); ?></label>
                                <?php dokan_post_input_box( $post_id, '_wc_booking_max_duration', array( 'min' => '1', 'step' => 1, 'value' => max( absint( get_post_meta( $post_id, '_wc_booking_max_duration', true ) ), 1 ) ), 'number' ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="dokan-form-group">
                        <label for="_wc_booking_calendar_display_mode" class="form-label"><?php _e( 'Calendar display mode', 'dokan-wc-booking' );?></label>
                        <select name="_wc_booking_calendar_display_mode" id="_wc_booking_calendar_display_mode" class="dokan-form-control short" style="width: auto; margin-right: 7px;">
                            <option value="" <?php selected( $calendar_display_mode, '' ); ?>><?php _e( 'Display calendar on click', 'dokan-wc-booking' ); ?></option>
                            <option value="always_visible" <?php selected( $calendar_display_mode, 'always_visible' ); ?>><?php _e( 'Calendar always visible', 'dokan-wc-booking' ); ?></option>
                        </select>
                    </div>

                    <div class="dokan-form-group">
                        <label>
                            <input name="_wc_booking_requires_confirmation" id="_wc_booking_requires_confirmation" value="no" type="hidden" >
                            <input name="_wc_booking_requires_confirmation" id="_wc_booking_requires_confirmation" value="yes" type="checkbox" <?php checked( $booking_confirmation, 'yes' ); ?> class="dokan-booking-confirmation"> <?php _e( 'Requires Confirmation', 'dokan-wc-booking' ); ?>
                            <span class="dokan-tooltips-help tips" title="" data-original-title="<?php _e( 'Check this box if the booking requires YOUR approval/confirmation. Payment will not be taken during CHECKOUT.', 'dokan-wc-booking' ) ?>">
                                <i class="fa fa-question-circle"></i>
                            </span>
                        </label>
                    </div>

                    <div class="dokan-form-group">

                        <label>

                            <input name="_wc_booking_user_can_cancel" id="_wc_booking_user_can_cancel" value="no" type="hidden" >
                            <input name="_wc_booking_user_can_cancel" id="_wc_booking_user_can_cancel" value="yes" type="checkbox" <?php checked( $booking_cancellation, 'yes' ); ?> class="dokan-booking-confirmation"> <?php _e( 'Can Be Cancelled ?', 'dokan-wc-booking' ); ?>
                            <span class="dokan-tooltips-help tips" title="" data-original-title="<?php _e( 'Check this box if the booking can be cancelled by the customer after it has been purchased. A refund will not be sent automatically.', 'dokan-wc-booking' ) ?>">
                                <i class="fa fa-question-circle"></i>
                            </span>

                        </label>
                    </div>

                    <div id="bookings_availability" class="bookings_availability availability_fields dokan-edit-row dokan-clearfix">
                        <div class="dokan-side-left">
                            <h2><?php _e( 'Availability' , 'dokan-wc-booking' ) ?></h2>
                            <p><?php _e( 'Set Availability options' , 'dokan-wc-booking' ) ?></p>
                        </div>
                        <div class="dokan-side-right dokan-clearfix">
                            <div class="dokan-form-group">
                                <label for="_wc_booking_qty" class="form-label"><?php _e( 'Max bookings per block', 'dokan-wc-booking' ); ?></label>
                                <?php dokan_post_input_box( $post_id, '_wc_booking_qty', array( 'min' => '1', 'step' => 1, 'value' => $wc_booking_qty ), 'number' ); ?>
                            </div>
                            <div class="dokan-input-group content-half-part">
                                <label for="_wc_booking_min_date" class="form-label"><?php _e( 'Minimum booking window ( into the future )', 'dokan-wc-booking' ); ?></label>
                                <input type="number" class="dokan-form-control" name="_wc_booking_min_date" id="_wc_booking_min_date" value="<?php echo max( absint( get_post_meta( $post_id, '_wc_booking_min_date', true ) ), 1 ); ?>" step="1" min="1" style="margin-right: 7px; width: 4em;">
                                <select name="_wc_booking_min_date_unit" id="_wc_booking_min_date_unit" class="dokan-form-control short" style="width: auto; margin-right: 7px;">
                                    <option value="month" <?php selected( $booking_min_date_unit, 'month' ); ?>><?php _e( 'Month(s)', 'dokan-wc-booking' ); ?></option>
                                    <option value="week" <?php selected( $booking_min_date_unit, 'week' ); ?>><?php _e( 'Week(s)', 'dokan-wc-booking' ); ?></option>
                                    <option value="day" <?php selected( $booking_min_date_unit, 'day' ); ?>><?php _e( 'Day(s)', 'dokan-wc-booking' ); ?></option>
                                    <option value="hour" <?php selected( $booking_min_date_unit, 'hour' ); ?>><?php _e( 'Hour(s)', 'dokan-wc-booking' ); ?></option>
                                </select>
                            </div>


                            <div class="dokan-input-group content-half-part">
                                <label for="_wc_booking_max_date" class="form-label"><?php _e( 'Maximum booking window ( into the future )', 'dokan-wc-booking' ); ?></label>
                                <input type="number" class="dokan-form-control" name="_wc_booking_max_date" id="_wc_booking_max_date" value="<?php echo max( absint( get_post_meta( $post_id, '_wc_booking_max_date', true ) ), 1 ); ?>" step="1" min="1" style="margin-right: 7px; width: 4em;">
                                <select name="_wc_booking_max_date_unit" id="_wc_booking_max_date_unit" class="dokan-form-control short" style="width: auto; margin-right: 7px;">
                                    <option value="month" <?php selected( $booking_max_date_unit, 'month' ); ?>><?php _e( 'Month(s)', 'dokan-wc-booking' ); ?></option>
                                    <option value="week" <?php selected( $booking_max_date_unit, 'week' ); ?>><?php _e( 'Week(s)', 'dokan-wc-booking' ); ?></option>
                                    <option value="day" <?php selected( $booking_max_date_unit, 'day' ); ?>><?php _e( 'Day(s)', 'dokan-wc-booking' ); ?></option>
                                    <option value="hour" <?php selected( $booking_max_date_unit, 'hour' ); ?>><?php _e( 'Hour(s)', 'dokan-wc-booking' ); ?></option>
                                </select>
                            </div>

                            <div class="dokan-form-group">
                                <label for="_wc_booking_buffer_period" class="form-label"><?php _e( 'Require a buffer period of ( ', 'dokan-wc-booking' ); ?><span id='_booking_binded_label'>minutes</span><?php _e( ' ) between bookings', 'dokan-wc-booking' ); ?></label>
                                <?php dokan_post_input_box( $post_id, '_wc_booking_buffer_period', array( 'step' => 1, 'value' => $booking_buffer_period ), 'number' ); ?>
                            </div>

                            <div class="dokan-form-group">
                                <label for="_wc_booking_default_date_availability" class="form-label"><?php _e( 'All dates are...', 'dokan-wc-booking' ); ?></label>
                                <select name="_wc_booking_default_date_availability" id="_wc_booking_default_date_availability" class="dokan-form-control short" style="width: auto; margin-right: 7px;">
                                    <option value="available" <?php selected( $booking_default_date_availability, 'available' ); ?>><?php _e( 'available by default', 'dokan-wc-booking' ); ?></option>
                                    <option value="non-available" <?php selected( $booking_default_date_availability, 'non-available' ); ?>><?php _e( 'not-available by default', 'dokan-wc-booking' ); ?></option>
                                </select>
                            </div>
                            <div class="dokan-form-group">
                                <label for="_wc_booking_range_availability" class="form-label"><?php _e( 'Set Availability Range :', 'dokan-wc-booking' ); ?></label>
                            </div>

                            <div class="table_grid dokan-booking-range-table">
                                <table class="widefat">
                                    <thead>
                                        <tr>
                                            <th class="sort" width="1%">&nbsp;</th>
                                            <th><?php _e( 'Range type', 'dokan-wc-booking' ); ?></th>
                                            <th><?php _e( 'Range', 'dokan-wc-booking' ); ?></th>
                                            <th></th>
                                            <th></th>
                                            <th>
                                                <?php _e( 'Bookable', 'dokan-wc-booking' ); ?>
                                                <span class="dokan-tooltips-help tips" title="" data-original-title="<?php _e( 'If not bookable, users won\'t be able to choose this block for their booking.', 'dokan-wc-booking' ); ?>">
                                                    <i class="fa fa-question-circle"></i>
                                                </span>
                                            </th>
                                            <th>

                                                <?php _e( 'Priority', 'dokan-wc-booking' ); ?>
                                                <span class="dokan-tooltips-help tips" title="" data-original-title="<?php _e( 'The lower the priority number, the earlier this rule gets applied. By default, global rules take priority over product rules which take priority over resource rules. By using priority numbers you can execute rules in different orders.', 'dokan-wc-booking' ); ?>">
                                                    <i class="fa fa-question-circle"></i>
                                                </span>
                                            </th>    
                                            <th class="remove" width="1%">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="8">
                                                <a href="#" class="button button-primary add_row dokan-btn dokan-btn-theme" data-row="<?php
                                                ob_start();
                                                include( 'html-booking-availability-fields.php' );
                                                $html                        = ob_get_clean();
                                                echo esc_attr( $html );
                                                ?>"><?php _e( 'Add Range', 'dokan-wc-booking' ); ?></a>
                                                <span class="description"><?php _e( 'Rules with lower numbers will execute first. Rules further down this table with the same priority will also execute first.', 'dokan-wc-booking' ); ?></span>
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="availability_rows">
                                        <?php
                                        $values                      = get_post_meta( $post_id, '_wc_booking_availability', true );
                                        if ( !empty( $values ) && is_array( $values ) ) {
                                            foreach ( $values as $availability ) {
                                                include( 'html-booking-availability-fields.php' );
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>


                    <?php include( 'html-dokan-booking-pricing.php' ); ?>
                    <div class='extra_options dokan-edit-row'>
                        <div class="dokan-side-left" >
                            <h2><?php _e( 'Extra Options' , 'dokan-wc-booking' ) ?></h2>
                            <p><?php _e( 'Set more options' , 'dokan-wc-booking' ) ?></p>
                        </div>
                        <div class="dokan-side-right dokan-clearfix" >
                            <?php
                            if ( empty( $post_id ) ) {
                                _e( 'Please Save the Product to add extra options ( Persons or Resources )', 'dokan-wc-booking' );
                                $type = 'hidden';
                            } else {
                            ?>
                                <div class="dokan-form-group">
                                    <label>
                                        <input name="_wc_booking_has_persons" id="_wc_booking_has_persons" type="checkbox" <?php checked( $has_persons, 'yes' ); ?> class="dokan-booking-person"> <?php _e( 'Has persons', 'dokan-wc-booking' ); ?>
                                    </label>

                                </div>
                                <div class="dokan-form-group">
                                    <label>
                                        <input name="_wc_booking_has_resources" id="_wc_booking_has_resources" type="checkbox" <?php checked( $has_resource, 'yes' ); ?> class="dokan-booking-resource"> <?php _e( 'Has resources', 'dokan-wc-booking' ); ?>
                                    </label>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class='dokan-clearfix'></div>


                    <?php
                    if ( !empty( $post_id ) ) {
                        include( 'html-booking-persons.php' );
                        include( 'html-booking-resources.php' );
                    }
                    ?>

                </div>

                <div class="dokan-product-short-description">
                    <label for="post_excerpt" class="form-label"><?php _e( 'Short Description', 'dokan-wc-booking' ); ?></label>
                    <?php wp_editor( $post_excerpt, 'post_excerpt', array( 'editor_height' => 50, 'quicktags' => false, 'media_buttons' => false, 'teeny' => true, 'editor_class' => 'post_excerpt' ) ); ?>
                </div>

                <div class="dokan-product-description">
                    <label for="post_content" class="form-label"><?php _e( 'Description', 'dokan-wc-booking' ); ?></label>
                    <?php wp_editor( $post_content, 'post_content', array( 'editor_height' => 50, 'quicktags' => false, 'media_buttons' => false, 'teeny' => true, 'editor_class' => 'post_content' ) ); ?>
                </div>

                <?php do_action( 'dokan_new_product_form' ); ?>

                <div class="dokan-other-options dokan-edit-row dokan-clearfix">
                    <div class="dokan-side-left">
                        <h2><?php _e( 'Other Options', 'dokan-wc-booking' ); ?></h2>
                    </div>

                    <div class="dokan-side-right">
                        <?php if ( $post_id ): ?>
                            <div class="dokan-form-group">
                                <label for="post_status" class="form-label"><?php _e( 'Product Status', 'dokan-wc-booking' ); ?></label>
                                <?php if ( $post_status != 'pending' ) { ?>
                                    <?php
                                    $post_statuses = apply_filters( 'dokan_post_status', array(
                                        'publish' => __( 'Online', 'dokan' ),
                                        'draft'   => __( 'Draft', 'dokan' )
                                    ), $post );
                                    ?>

                                    <select id="post_status" class="dokan-form-control" name="post_status">
                                        <?php foreach ( $post_statuses as $status => $label ) { ?>
                                            <option value="<?php echo $status; ?>"<?php selected( $post_status, $status ); ?>><?php echo $label; ?></option>
                                        <?php } ?>
                                    </select>
                                <?php } else { ?>
                                    <?php $pending_class = $post_status == 'pending' ? '  dokan-label dokan-label-warning' : ''; ?>
                                    <span class="dokan-toggle-selected-display<?php echo $pending_class; ?>"><?php echo dokan_get_post_status( $post_status ); ?></span>
                                <?php } ?>
                            </div>
                        <?php endif ?>

                        <div class="dokan-form-group">
                            <label for="_visibility" class="form-label"><?php _e( 'Visibility', 'dokan-wc-booking' ); ?></label>
                            <?php
                            dokan_post_input_box( $post_id, '_visibility', array( 'options' => array(
                                    'visible' => __( 'Catalog or Search', 'dokan' ),
                                    'catalog' => __( 'Catalog', 'dokan' ),
                                    'search'  => __( 'Search', 'dokan' ),
                                    'hidden'  => __( 'Hidden', 'dokan ' )
                                ) ), 'select' );
                            ?>
                        </div>

                        <div class="dokan-form-group">
                            <label for="_purchase_note" class="form-label"><?php _e( 'Purchase Note', 'dokan-wc-booking' ); ?></label>
                            <?php dokan_post_input_box( $post_id, '_purchase_note', array( 'placeholder' => __( 'Customer will get this info in their order email', 'dokan' ) ), 'textarea' ); ?>
                        </div>

                        <div class="dokan-form-group">
                            <?php $_enable_reviews = ( $post->comment_status == 'open' ) ? 'yes' : 'no'; ?>
                            <?php dokan_post_input_box( $post_id, '_enable_reviews', array( 'value' => $_enable_reviews, 'label' => __( 'Enable product reviews', 'dokan' ) ), 'checkbox' ); ?>
                        </div>

                    </div>
                </div><!-- .dokan-other-options -->

                <?php if ( $post_id ): ?>
                    <?php do_action( 'dokan_product_edit_after_options' ); ?>
                
                    <?php wp_nonce_field( 'dokan_edit_product', 'dokan_edit_product_nonce' ); ?>
                    <!--hidden input for Firefox issue-->
                    <input type="hidden" name="_stock_status" value="instock"/>
                    <input type="hidden" name="_sku" value=""/>
                    <input type="hidden" name="product_shipping_class" value="-1"/>
                    <input type="hidden" name="price" value=""/>

                    <input type="hidden" name="dokan_update_product" value="<?php esc_attr_e( 'Save Product', 'dokan-wc-booking' ); ?>"/>
                    <input type="hidden" name="product_type" value="booking"/>
                    <input type="submit" name="dokan_update_product" class="dokan-btn dokan-btn-theme dokan-btn-lg btn-block" value="<?php esc_attr_e( 'Save Product', 'dokan-wc-booking' ); ?>"/>

                <?php else: ?>

                    <?php wp_nonce_field( 'dokan_add_new_product', 'dokan_add_new_product_nonce' ); ?>
                    <!--hidden input for Firefox issue-->
                    <input type="hidden" name="_stock_status" value="instock"/>
                    <input type="hidden" name="_sku" value=""/>
                    <input type="hidden" name="product_shipping_class" value="-1"/>
                    <input type="hidden" name="price" value=""/>

                    <input type="hidden" name="add_product" value="<?php esc_attr_e( 'Save Product', 'dokan-wc-booking' ); ?>"/>
                    <input type="hidden" name="product_type" value="booking"/>
                    <input type="submit" name="add_product" class="dokan-btn dokan-btn-theme dokan-btn-lg btn-block" value="<?php esc_attr_e( 'Save Product', 'dokan-wc-booking' ); ?>"/>

                <?php endif; ?>
            </form>

                <?php } else { ?>
                    <div class="dokan-alert dokan-alert"></div>
                <?php } ?>

    <?php } else { ?>

        <?php do_action( 'dokan_can_post_notice' ); ?>

        <?php
    }

    wp_reset_postdata();
    ?>
</div> <!-- #primary .content-area -->
<script type="text/javascript">
        ( function ( $ ) {

            $( document ).ready( function () {
                var duration_type = $( 'select#_wc_booking_duration_type' );
                duration_type.on( 'change', function () {
                    if ( duration_type.val() == 'customer' ) {
                        $( '.show_if_custom_block' ).show();
                    } else {
                        $( '.show_if_custom_block' ).hide();
                    }
                } );

                var duration_unit = $( 'select#_wc_booking_duration_unit' );
                var duration_label = $( 'span#_booking_binded_label' );
                duration_unit.on( 'change', function () {
                    duration_label.html( duration_unit.val() + 's' );
                } );
            } );

        } )( jQuery );

</script>