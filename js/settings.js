(function ($) {
	// "use strict";

$('.single_product_thmub_slider').slick({
		autoplay: true,
		arrows: true,
		dots: true,
		speed: 300,
		draggable: true,
		fade: false,
		infinite: true,
		slidesToShow: 1,
		responsive: [
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1
	      }
	    }
	  ]
	});

$('.feature_product_items').slick({
		autoplay: true,
		arrows: true,
		dots: true,
		speed: 300,
		draggable: true,
		fade: false,
		infinite: true,
		slidesToShow: 3,
		responsive: [
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1
	      }
	    }
	  ]
	});

$('.feature_vidoes').slick({
		autoplay: false,
		arrows: true,
		dots: false,
		draggable: true,
		fade: false,
		infinite: true,
		slidesToShow: 2,
		responsive: [
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1
	      }
	    }
	  ]
	});



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


	// add more video in new product page
	$('.add_more_video').click(function(e){
		$('<p class="single_product_video"><input type="text" name="product_video[]" class="dokan-form-control" placeholder="i.e. https://player.vimeo.com/video/197922418"><span class="fa fa-minus"></span></p>').appendTo('.product_videos');
	});

	$('body').on('click', '.fa-minus', function(){
		$(this).parent().remove();
	});

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
							zoom: 12,
							map: map,
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
				loadProductMap(response); 
			}
		});

    }

     $('a[href="#map"').bind('click', function() {
                initMap();
            });


    // google.maps.event.addDomListener('#loadmap', 'click', initMap);


    // persons by quantity filter 

    	// http://stackoverflow.com/questions/8902390/constructing-a-url-with-parameters-using-jquery
	    var buildUrl = function(key1, key2, value1, value2) {
	    	var base = localized.current_url_with_args;
		    var sep = (base.indexOf('?') > -1) ? '&' : '?';
		    if(base.indexOf('min_person') > -1) {
		    	return localized.current_url + '?' + key1 + '=' + value1 + '&' + key2 + '=' + value2;
		    } else {
		    	return localized.current_url_with_args + sep + key1 + '=' + value1 + '&' + key2 + '=' + value2;
		    }
		}

		function getParameterByName(name, d ) {
		    url = window.location.href;
		    name = name.replace(/[\[\]]/g, "\\$&");
		    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
		        results = regex.exec(url);
		    if (!results) return d;
		    if (!results[2]) return '';
		    return decodeURIComponent(results[2].replace(/\+/g, " "));
		}

	    $( "#person-filter" ).slider({
	    	range: true,
            min: 0,
            max: 10,
            values: [getParameterByName('min_person', 2 ), getParameterByName('max_person', 5) ],
            slide: function( event, ui ) {
                $( "#quantity" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
            },
            change: function(event, ui) {
            	var current_url = buildUrl('min_person', 'max_person', ui.values[ 0 ], ui.values[ 1 ]);
            	window.location.replace(current_url);
            	console.log(current_url);
		    }
	    });

	     $( "#quantity" ).val( $( "#person-filter" ).slider( "values", 0 ) +
        " - " + $( "#person-filter" ).slider( "values", 1 ) );

}(jQuery));