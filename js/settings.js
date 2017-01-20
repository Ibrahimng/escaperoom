(function ($) {
	// "use strict";

	/* Testimonial */
	$('.testimonial_slider').slick({
		autoplay: true,
		arrows: true,
		dots: true,
		draggable: true,
		fade: false,
		infinite: true
	});

	$('.popup_video').venobox({
        framewidth: '800px',       
        frameheight: '500px',                
        bgcolor: '#5dff5e',         
        titleattr: 'data-title',    
        numeratio: true,            
        infinigall: true            
    });

    // Wc Categories after arrow
	var arrow = $( '<span class="arrow_right ion-android-arrow-dropright"></span>' );
	$( ".product-categories li.cat-parent > a" ).after(arrow);

	$( ".product-categories li.cat-parent .arrow_right" ).click(function() {
	  $(this).toggleClass( 'ion-android-arrow-dropdown ion-android-arrow-dropright').next().toggle();
	});

    
    //grid & list and maps layout 

    $('.btn_grid').on('click', changeClassgrid);
    $('.btn_list').on('click', changeClass_list);
   // $('.btn_maps').on('click', changeClass_maps);

	function changeClass_list() {
	   $('.layout').removeClass('col-md-4 col-sm-4 col-xs-12').addClass('col-md-12 col-sm-12 col-xs-12 list_layout').fadeIn("slow");
	}
	function changeClassgrid() {
	   $('.layout').removeClass('col-md-12 col-sm-12 col-xs-12 list_layout').addClass('col-md-4 col-sm-4 col-xs-12').fadeIn("slow");
	}
	// function changeClass_maps() {
	//    $('.layout').removeClass('col-md-12 col-sm-12 col-xs-12 col-md-4 col-sm-4 col-xs-12 list_layout').addClass('col-md-12 col-sm-12 col-xs-12 maps_layout').fadeIn("slow");
	// }

	// loadProductMap function 

	function loadProductMap(data) {
		var product_locations = JSON.parse(data);
		console.log(product_locations);
		var map = new google.maps.Map(document.getElementById('product_map'), {
          zoom: 3,
          center: {lat: -25.363, lng: 131.044}
        });
		var labels = 'AIzaSyAWQTIcIfpsttvugW18F1y14p8gbFXmtXE';

     	var markers = product_locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            zoom: 4,
            map: map,
            label: labels[i % labels.length]
          });
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: localized.themepath + '/assets/maps/icon/m'});

	}

	//google maps 
	function initMap() {
		var data = {
			'action': 'get_product_locations_ajax'
		};

		$.ajax({
			url: woocommerce_params.ajax_url,
			data: data,
			success:function(response) {
				console.log(response);
				loadProductMap(response); 
			}
		});
    }

    google.maps.event.addDomListener(window, 'load', initMap);

}(jQuery));


    