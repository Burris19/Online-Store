function initMap() {
  var chicago = {lat: 41.85, lng: -87.65};
  var indianapolis = {lat: 39.79, lng: -86.14};
debugger

navigator.geolocation.getCurrentPosition(function(posicion){
    var geolocalizacion = new google.maps.LatLng(posicion.coords.latitude,posicion.coords.longitude);
    console.log(geolocalizacion);

},function(error){
    console.log(error);
});


  var map = new google.maps.Map(document.getElementById('google_canvas'), {
    center: chicago,
    scrollwheel: false,
    zoom: 7
  });

  var directionsDisplay = new google.maps.DirectionsRenderer({
    map: map
  });

  // Set destination, origin and travel mode.
  var request = {
    destination: indianapolis,
    origin: chicago,
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
}

google.maps.event.addDomListener(window,'load',initMap);
