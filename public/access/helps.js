$(function(){

    var marcador_tiempo_real, mapa, latitude,longitude;
    google.maps.event.addDomListener(window,'load',dibujarMapa);

    function dibujarMapa(){
        var opcionesMapa = {
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        mapa = new google.maps.Map(document.getElementById('google_canvas'),opcionesMapa);

        navigator.geolocation.getCurrentPosition(function(posicion){
            latitude = posicion.coords.latitude;
            longitude = posicion.coords.longitude;
            $('.lati').val(latitude);
            $('.lodi').val(longitude);
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

    var message = $('#respuesta');
    message.hide();
    $('.create').on('click',function(){
        var route = $(this).data('root');
        $('.content').load( route + '/create');
    });

    $('#btn-save').on('click',function(e){
        e.preventDefault();
        $('#btn-save').prop('disabled',true);
        var form = $('#form-create');
        var tipo = form.prop('method');
        var url = form.attr('data-url');
        var data = form.serialize();
        $.ajax({
            url: url,
            type: tipo,
            data: data,
            success: function(response) {
                console.log(response);
                if(response) {

                     if(response.success){
                        console.log(response.message);
                         $('#respuesta strong').css('color','black');
                         $('#respuesta strong').text(response.message);
                         message.show();
                     }else{
                         console.log(response.message);
                         $('#respuesta strong').text('Error al guardar el registro');
                         $('#respuesta strong').css('color','orange');
                         message.show();

                     }
                    setTimeout(function(){
                        window.location.href = url;
                    },2000)
                }
            },
            error: function(xhr,ajaxOptions,thrownError){
                console.log(xhr.status);
                console.error(thrownError);
            }
        });
    });
    var indice = 0;
    var dato;
    $("#addCity").keyup(function (e) {

        if (e.keyCode == 13 ) {
            dato = $("#addCity").val();
            indice++;
            $('.table tbody').append('<tr><td>' + indice +' </td> <td class="tdValue"> ' + dato + '</td></tr>');
            $(this).val('');
        }
    });

    $('#btn-save2').on('click',function(e){
        var form = $('#form-create');
        var municipios = $.map($('.tdValue'), function(value, key){
            return $(value).html()
        });

        var departamento = $('#depto').val();

        var data = {
            municipios: municipios,
            departamento: departamento,
        }

        $.ajax({
            url: form.attr('data-url'),
            type: form.prop('method'),
            data: data,
            success: function(response) {
                console.log(response);
                if(response) {

                    if(response.success){
                        console.log(response.message);
                        $('#respuesta strong').css('color','black');
                        $('#respuesta strong').text(response.message);
                        message.show();

                    }else{
                        console.log(response.message);
                        $('#respuesta strong').text('Error al guardar el registro');
                        $('#respuesta strong').css('color','orange');
                        message.show();

                    }

                    setTimeout(function(){
                        window.location.href = form.attr('data-url');
                    },2000)
                }
            },
            error: function(xhr,ajaxOptions,thrownError){
                console.log(xhr.status);
                console.error(thrownError);
            }
        });

    });

    $('#idDepartment').change(function(){
        var id = $(this).val();
        getCities(id);
    });

    function getCities(id)
    {
        $.ajax({
            url: 'depart/' + id ,
            type: 'get',
            data: null,
            success: function(response) {
                console.log(response);
                var combo = $('#cboMunicipio');
                combo.find('option').remove();
                $.each(response,function(key, value)
                {
                    combo.append('<option value=' + key + '>' + value + '</option>');
                });
            },
            error: function(xhr,ajaxOptions,thrownError){
                console.log(xhr.status);
                console.error(thrownError);
            }
        });
    }

    $('#login').on('click',function(e){
        e.preventDefault();
        $(this).prop('disabled',true);
        var form = $('#form-login');
        var tipo = form.prop('method');
        var url = form.attr('data-url');
        var data = form.serialize();
        $.ajax({
            url: url,
            type: tipo,
            data: data,
            success: function (response) {
                if(response.status){
                    window.location.href = '/';

                }else{
                    $('#respuesta strong').text('Email o Password incorrectos');
                    $('#respuesta strong').css('color','orange');
                    message.show();
                    $(this).prop('disabled',false);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.error(thrownError);
            }
        });
    });

    $('#btn-register').on('click',function(e){
        e.preventDefault();
        $('#btn-register').prop('disabled',true);
        var form = $('#form-create');
        var tipo = form.prop('method');
        var url = form.attr('data-url');
        var data = form.serialize();
        $.ajax({
            url: url,
            type: tipo,
            data: data,
            success: function(response) {
                debugger
                if(response) {
                    $('#btn-register').prop('disabled',true);
                    if(response.success){
                        $('#respuesta strong').css('color','black');
                        $('#respuesta strong').text(response.message);
                        message.show();
                        setTimeout(function(){
                            window.location.href = '/login';
                        },2000)

                    }else{
                        $('#respuesta strong').text('Error al guardar el registro');
                        $('#respuesta strong').css('color','orange');
                        message.show();

                    }
                }
            },
            error: function(xhr,ajaxOptions,thrownError){
                console.log(xhr.status);
                console.error(thrownError);
            }
        });
    });

    $('.edit').on('click',function(e){
        e.preventDefault();
        id = $(this).data('id');
        url= $(this).data('url');
        url = url + '/'+ id;
        $('#div-modal').load(url,function(){
            $('#modal-edit').modal({show:true});

        })
    });


    $('.confirmOrder').on('click',function(e){
        e.preventDefault();
        var idOrder = $(this).data('id');
        var url = 'orders/' + idOrder + '/edit';
        $.ajax({
            url: url,
            type: 'get',
            success: function(response) {

                setTimeout(function(){
                    window.location.href = 'orders';
                },2000)


            },
            error: function(xhr,ajaxOptions,thrownError){
                console.log(xhr.status);
                console.error(thrownError);
            }
        });

    });
   
});
