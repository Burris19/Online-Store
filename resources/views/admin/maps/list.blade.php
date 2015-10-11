@extends('admin._base.home.layout')
@section('content')

<body onload="initialize()">
  <div id="map_canvas" style="width:800px; height:500px"></div>
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
            var latlng = new google.maps.LatLng(57.0442, 9.9116);
            var settings = {
                zoom: 15,
                center: latlng,
                mapTypeControl: true,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                navigationControl: true,
                navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("map_canvas"), settings);

      }


  </script>
@endsection
