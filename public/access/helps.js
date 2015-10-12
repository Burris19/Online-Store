$(function(){

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

    /*
        Guardar los departamentos
     */
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
                },
                error: function(xhr,ajaxOptions,thrownError){
                    console.log(xhr.status);
                    console.error(thrownError);
                }
            });

      });

    //var idDepartment = $('#idDepartment').val();

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



});
/**
dataType   : 'json',
contentType: 'application/json; charset=UTF-8',
*/
