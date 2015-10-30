function map(){
    this.loadMap = function(){
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
                var marcador = new google.maps.Marker({
                    map: mapa,
                    position:geolocalizacion,
                    visible: true
                });
                marcador_tiempo_real = new google.maps.Marker({
                    map: mapa,
                    position:geolocalizacion2,
                    visible: true
                });
                mapa.setCenter(geolocalizacion);


            },function(error){
                console.log(error);
            });

        }
    }

}


//
//$(function() {
//
//    var marcador_tiempo_real, mapa;
//    google.maps.event.addDomListener(window,'load',dibujarMapa);
//
//    function dibujarMapa(){
//        var opcionesMapa = {
//            zoom: 15,
//            mapTypeId: google.maps.MapTypeId.ROADMAP
//        }
//
//        mapa = new google.maps.Map(document.getElementById('google_canvas'),opcionesMapa);
//
//        navigator.geolocation.getCurrentPosition(function(posicion){
//        var geolocalizacion = new google.maps.LatLng(posicion.coords.latitude,posicion.coords.longitude);
//        var geolocalizacion2=new google.maps.LatLng(14.53333,-91.68333);
//        var marcador = new google.maps.Marker({
//            map: mapa,
//            position:geolocalizacion,
//            visible: true
//        });
//        marcador_tiempo_real = new google.maps.Marker({
//        map: mapa,
//        position:geolocalizacion2,
//        visible: true
//        });
//        mapa.setCenter(geolocalizacion);
//
//
//        },function(error){
//            console.log(error);
//        });
//
//    }
//
//
//
//});
//
