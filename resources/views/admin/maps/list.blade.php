@extends('admin._base.home.layout')
@section('content')

<body onload="initialize()">
  <div id="map_canvas" style="width:100%; height:500px"></div>
</body>

@endsection

@section('other-scripts')
<script>
  var puntoInicioLatitude = 0;
  var puntoInicioLongitude = 0;

  var puntoFinalLatitude = 0;
  var puntoFinalLongitude = 0;

//    $(function(){
//
//        $.ajax({
//          url: 'listOrders',
//          type: 'get',
//          success: function(response) {
//            console.log(response);
//
//            var puntoInicioLatitude = response['order'][0]['store_origin']['city'].Latitud;
//            var puntoInicioLongitude = response['order'][0]['store_origin']['city'].Logitud;
//
//            var puntoFinalLatitude = response['order'][0]['store_destiny']['city'].Latitud;
//            var puntoFinalLongitude = response['order'][0]['store_destiny']['city'].Logitud;
//
//
//
//          },
//          error: function(xhr,ajaxOptions,thrownError){
//            console.log(xhr.status);
//            console.error(thrownError);
//          }
//
//        });
//
//    });





    function initialize() {
      $.ajax({
        url: 'listOrders',
        type: 'get',
        success: function(response) {
          console.log(response);

          puntoInicioLatitude = response['order'][0]['store_origin']['city'].Latitud;
          puntoInicioLongitude = response['order'][0]['store_origin']['city'].Logitud;

          puntoFinalLatitude = response['order'][0]['store_destiny']['city'].Latitud;
          puntoFinalLongitude = response['order'][0]['store_destiny']['city'].Logitud;



          var latlng = new google.maps.LatLng(57.0442, 9.9116);
          var guatemala=new google.maps.LatLng(puntoInicioLatitude, puntoInicioLongitude);
          var escuintla=new google.maps.LatLng(14.3010087, -90.7883622);
          var mazate=new google.maps.LatLng(14.5313335, -91.5068243);
          var reu=new google.maps.LatLng(puntoFinalLatitude, puntoFinalLongitude);

          var map = new google.maps.Map(document.getElementById('map_canvas'), {

            center: guatemala,
            scrollwheel: true,
            zoom: 7
          });

          var directionsDisplay = new google.maps.DirectionsRenderer({
            map: map
          });

          var ruta2 = {
            destination: reu,
            origin: guatemala,
//            waypoints: [
//              {
//                location:escuintla,
//                stopover:true
//              },{
//                location:mazate,
//                stopover:true
//              }],
            optimizeWaypoints:true,
            provideRouteAlternatives: true,
            travelMode: google.maps.TravelMode.DRIVING
          };

          // Pass the directions request to the directions service.
          var directionsService = new google.maps.DirectionsService();


          directionsService.route(ruta2, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
              // Display the route on the map.
              directionsDisplay.setDirections(response);
            }
          });



        },
        error: function(xhr,ajaxOptions,thrownError){
          console.log(xhr.status);
          console.error(thrownError);
        }

      });
    }





</script>
@endsection
