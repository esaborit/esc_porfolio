


 // FUNCION PARA INSERTAR EN MAPA DE GOOGLE.
    function initialize() {
        var mapProp = {
          center:new google.maps.LatLng(38.760063, -3.384754),
          zoom: 9,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
            // Disables the default Google Maps UI components
        disableDefaultUI: true,
        scrollwheel: false,
        draggable: false,
         // How you would like to style the map. 
        // This is where you would paste any style found on Snazzy Maps.
        styles: [
                {
                    "featureType": "water",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#b5cbe4"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "stylers": [
                        {
                            "color": "#efefef"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#83a5b0"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#bdcdd3"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e3eed3"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "lightness": 33
                        }
                    ]
                },
                {
                    "featureType": "road"
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {},
                {
                    "featureType": "road",
                    "stylers": [
                        {
                            "lightness": 20
                        }
                    ]
                }
            ]
        };
        var map=new google.maps.Map(document.getElementById("map"),mapProp);
        // Custom Map Marker Icon - Customize the map-marker.png file to customize your icon
        var image = '/porfolioesc/wp-content/themes/esc_porfolio/assets/img/map-marker-4.png';
        var myLatLng = new google.maps.LatLng(38.760063, -3.384754);
        var beachMarker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: image
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
