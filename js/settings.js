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
    $('.btn_maps').on('click', changeClass_maps);

	function changeClass_list() {
	   $('.layout').removeClass('col-md-4 col-sm-4 col-xs-12 grid_layout maps_layout').addClass('col-md-12 col-sm-12 col-xs-12 list_layout').fadeIn();
	}
	function changeClassgrid() {
	   $('.layout').removeClass('col-md-12 col-sm-12 col-xs-12 list_layout maps_layout ').addClass('col-md-4 col-sm-4 col-xs-12 grid_layout').fadeIn();
	}
	function changeClass_maps() {
	   $('.layout').removeClass('col-md-12 col-sm-12 col-xs-12 list_layout col-md-4 col-sm-4 col-xs-12 grid_layout .woocommerce-pagination').addClass('col-md-12 col-sm-12 col-xs-12 maps_layout').fadeIn();

	}


	// loadProductMap function 

	function loadProductMap(data) {
		
		var product_locations = JSON.parse(data);
		var map = new google.maps.Map(document.getElementById('product_map'), {
          zoom: 3,
           center: {lat: 23.6850, lng: 90.3563},
        });


	    // locate to users location
	    // if (navigator.geolocation) {
	    //   navigator.geolocation.getCurrentPosition(function (position) {
	    //     initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	    //     map.setCenter(initialLocation);
	    //   });
	    // }


        var markers = [];

        for( var i=0; i < product_locations.length; i++ ) {

        	var latLng = new google.maps.LatLng(product_locations[i].lat, product_locations[i].lng);
        	  marker = new google.maps.Marker({
							position: latLng,
							zoom: 4,
							map: map
				        });

        	  markers.push(marker);

	        infowindow = new google.maps.InfoWindow();
		      google.maps.event.addListener(marker, 'click', (function(marker,i){
		        return function(){

					  infowindow.setContent(
			              '<div class="mapinfo_wrapper">'+
			              	  '<a href="'+product_locations[i].pro_link+'"><img class="pro_image" src="' + product_locations[i].img + '"/></a>'+
				              '<a href="'+product_locations[i].pro_link+'"><h3 class="protitle">' 
				             	 + product_locations[i].title + 
				              '</h3></a>'+
				              '<div class="mapinfoauthor">'
				              	+'<div class="mapautimg">'+ 
				             	 	product_locations[i].auth_img + 
				             	 	'<a href="'+product_locations[i].store_url+'"><p class="map_author_name">'+product_locations[i].auth_name+'</p></a>' +
				             	 '</div>'+
				             	 '<div class="mapautprice">'+
				             		'<span class="map_price">'
				             	 		+ product_locations[i].currency + product_locations[i].price + ' ' +product_locations[i].book_duration + 
				             	 		'</span>'+
				              	'</div>'+
				              '</div>'+
			               '</div>');
			          infowindow.open(map,marker);
		        }
		      })(marker, i));


        }


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

    