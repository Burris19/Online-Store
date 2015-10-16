$(function() {

    var marcador_tiempo_real, mapa;
    google.maps.event.addDomListener(window,'load',dibujarMapa);

    function dibujarMapa(){
        var opcionesMapa = {
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        mapa = new google.maps.Map(document.getElementById('google_canvas'),opcionesMapa);

        navigator.geolocation.getCurrentPosition(function(posicion){
            var geolocalizacion = new google.maps.LatLng(posicion.coords.latitude,posicion.coords.longitude);
            var geolocalizacion2=new google.maps.LatLng(14.53333,-91.68333);

            mapa.setCenter(geolocalizacion);

            var directionsDisplay = new google.maps.DirectionsRenderer({
              map: mapa
            });

            // Set destination, origin and travel mode.
            var request = {
              destination: geolocalizacion,
              origin: geolocalizacion2,
              travelMode: google.maps.TravelMode.DRIVING
            };

            // Pass the directions request to the directions service.
            var directionsService = new google.maps.DirectionsService();
            directionsService.route(request, function(response, status) {
              if (status == google.maps.DirectionsStatus.OK) {
                // Display the route on the map.
                directionsDisplay.setDirections(response);
              }
            });

            //navigator.geolocation.watchPosition(actualizarPosicion,function(error){console.log(error);},{maximumAge: 0});

            },function(error){
                console.log(error);
        });

    }
    // function actualizarPosicion(posicion){
    //     var geolocalizacion = new google.maps.LatLng(posicion.coords.latitude,posicion.coords.longitude);
    //     marcador_tiempo_real.setPosition(geolocalizacion);
    //     mapa.setCenter(geolocalizacion);
    // }

});
