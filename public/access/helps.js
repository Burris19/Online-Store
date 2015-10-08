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
            $('.table tr:last').after('<tr><td>' + indice +' </td> <td> ' + dato + '</td></tr>');
        }
    });

      $('#btn-save2').on('click',function(){
          var cells = new Array();
           $('#municipios tr td').each(function(){
               cells.push($(this).html());
           });
           var depto = { 'departamento' : $('#depto').val() };

           $.ajax({
               url: 'departaments',
               type: 'post',
               data: cells.serialize(),
               success: function(response) {
                   console.log(response);
                   if(response) {

                        if(response.success){
                           console.log(response);


                        }else{
                            console.log(response);


                        }

                   }
               },
               error: function(xhr,ajaxOptions,thrownError){
                   console.log(xhr.status);
                   console.error(thrownError);
               }
           });





      });

});
