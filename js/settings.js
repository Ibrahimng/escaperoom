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
	var selector = '[data-rangeSlider]',
                elements = document.querySelectorAll(selector);

        // Example functionality to demonstrate a value feedback
        function valueOutput(element) {
            var value = element.value,
                    output = element.parentNode.getElementsByTagName('output')[0];
            output.innerHTML = value;
        }

        for (var i = elements.length - 1; i >= 0; i--) {
            valueOutput(elements[i]);
        }

        Array.prototype.slice.call(document.querySelectorAll('input[type="range"]')).forEach(function (el) {
            el.addEventListener('input', function (e) {
                valueOutput(e.target);
            }, false);
        });


        // Basic rangeSlider initialization
        rangeSlider.create(elements, {
            min: 0,
            max: 5,
            value : 0,
            borderRadius : 3,
            buffer : 0,
            minEventInterval : 1000,

            // Callback function
            onInit: function () {
            },

            // Callback function
            onSlideStart: function (value, percent, position) {
                console.info('onSlideStart', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
            },

            // Callback function
            onSlide: function (value, percent, position) {
                console.log('onSlide', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
            },

            // Callback function
            onSlideEnd: function (value, percent, position) {
                console.warn('onSlideEnd', 'value: ' + value, 'percent: ' + percent, 'position: ' + position);
            }
        });

}(jQuery));

    