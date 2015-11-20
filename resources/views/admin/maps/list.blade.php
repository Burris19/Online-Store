@extends('admin._base.home.layout')
@section('content')

<body onload="initialize()">
  <div id="map_canvas" style="width:100%; height:500px"></div>
</body>

@endsection

@section('other-scripts')
  {!! Html::script('plugins/datatables/jquery.dataTables.min.js') !!}
  {!! Html::script('plugins/datatables/dataTables.bootstrap.min.js') !!}
  {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}
  <script>
    $(function () {
       $("#example1").DataTable();
    });





      function initialize() {
        var guatemala=new google.maps.LatLng(14.6349261, -90.50714820000002);
        var escuintla=new google.maps.LatLng(14.3010087, -90.7883622);
        var mazate=new google.maps.LatLng(14.5313335, -91.5068243);
        var reu=new google.maps.LatLng(14.5281152, -91.6843682);
        var progreso=new google.maps.LatLng(14.8619077, -90.020893);
        var map = new google.maps.Map(document.getElementById('map_canvas'), {

           center: guatemala,
           scrollwheel: true,
           zoom: 7
         });

         var directionsDisplay = new google.maps.DirectionsRenderer({
           map: map
         });

   // Set destination, origin and travel mode.

             var ruta1 = {
               destination: progreso,
               origin: guatemala,
               optimizeWaypoints:true,
               provideRouteAlternatives: true,
               travelMode: google.maps.TravelMode.DRIVING
             };

             var ruta2 = {
               destination: reu,
               origin: guatemala,
               waypoints: [
                 {
                   location:escuintla,
                   stopover:true
                 },{
                   location:mazate,
                   stopover:true
                 }],
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
        }


  </script>
@endsection
