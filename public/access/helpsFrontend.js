/**
 * Created by julian on 21/10/15.
 */
$(function(){


    var message = $('.message');
    message.hide();

    var items = localStorage.length;
    $('.items').text(items);
    $('.detail').on('click',function(e){
        e.preventDefault();
        var parent = $(this).parents('.item');
        var id = parent.data('id');
        var url = 'detail/' + id;
        $('#content').load(url);
    });
    $('.addCart2').on('click',function(){
        $('#content').load('shoppingCart',function(){
            functions.fillTable();
            functions.getTotal('tableBuy');
            $(".quantity").change(function(e){
                var quantity = $(this).val();
                var price = $($(this).parent()).next().text();
                var total = functions.total(price,quantity);
                $(this).parent().siblings('.total').text(total);
                functions.getTotal('tableBuy');
                var id = $(this).data('id');
                functions.validateAction(id);

            });
            $('.deleteItem').on('click',function(e){
                e.preventDefault();
                var idItem = $(this).data('id');
                localStorage.removeItem(''+idItem);
                $('#content').load('shoppingCart',function(){
                    functions.fillTable();
                    functions.getTotal('tableBuy');
                    $(".quantity").change(function(e){
                        var quantity = $(this).val();
                        var price = $($(this).parent()).next().text();
                        var total = functions.total(price,quantity);
                        $(this).parent().siblings('.total').text(total);
                        functions.getTotal('tableBuy');
                        var id = $(this).data('id');
                        functions.validateAction(id);

                    });
                    $('.deleteItem').on('click',function(e){
                        e.preventDefault();
                        var idItem = $(this).data('id');
                        localStorage.removeItem(''+idItem);
                    });
                });
            });
        });
    });
    $('.addCart').on('click',function(){
        pedido.id = $(this).data('id');
        functions.fill();
        functions.validateAction($(this).data('id'),1);
        $('#content').load('shoppingCart',function(){
            functions.fillTable();
            functions.getTotal('tableBuy');
            $(".quantity").change(function(e){
                var quantity = $(this).val();
                var price = $($(this).parent()).next().text();
                var total = functions.total(price,quantity);
                $(this).parent().siblings('.total').text(total);
                functions.getTotal('tableBuy');
                var id = $(this).data('id');
                functions.validateAction(id);

            });
            $('.deleteItem').on('click',function(e){
                e.preventDefault();
                var idItem = $(this).data('id');
                localStorage.removeItem(''+idItem);
                $('#content').load('shoppingCart',function(){
                    functions.fillTable();
                    functions.getTotal('tableBuy');
                    $(".quantity").change(function(e){
                        var quantity = $(this).val();
                        var price = $($(this).parent()).next().text();
                        var total = functions.total(price,quantity);
                        $(this).parent().siblings('.total').text(total);
                        functions.getTotal('tableBuy');
                        var id = $(this).data('id');
                        functions.validateAction(id);

                    });
                    $('.deleteItem').on('click',function(e){
                        e.preventDefault();
                        var idItem = $(this).data('id');
                        localStorage.removeItem(''+idItem);
                    });
                });
            });
        });
    });
    $('#btn-process-buy').on('click',function(e) {
        e.preventDefault();
        //$(this).prop('disabled', true);
        var form = $('#create-buy');
        var type = form.prop('method');
        var url = form.data('url');

        $.ajax({
            url: url,
            type: type,
            data: {
                products: functions.prepareData()
            },
            success: function(response) {
                console.log(response);
                if(response.bandera)
                {
                    //posicion del cliente
                    var latitudeCliente = response.client.latitude;
                    var longitudeCliente = response.client.longitude;

                    var idStoreMin = [] ;
                    var distanciaTotal = 0;

                    $.each(response.stores,function(a,b){
                        //posicion de la tienda
                        var latitudeStore = b['store']['city'].Latitud;
                        var longitudeStore = b['store']['city'].Logitud;

                        var cliente = new google.maps.LatLng(latitudeCliente, longitudeCliente);
                        var store = new google.maps.LatLng(latitudeStore, longitudeStore);
                        var distancia = google.maps.geometry.spherical.computeDistanceBetween(cliente, store);

                        if(distanciaTotal == 0)
                        {
                            distanciaTotal = distancia;
                            idStoreMin[0] = b['store']['id'];
                        }else
                        {
                            if(distancia < distanciaTotal)
                            {
                                distanciaTotal = distancia;
                                idStoreMin[0] = b['store']['id'];
                            }
                        }
                    });


                    var storeWithDistance = [];

                    $.each(response.getStores, function(a2,b2){
                        var latitudeStore2 = b2['city'].Latitud;
                        var longitudeStore2 = b2['city'].Logitud;

                        var cliente2 = new google.maps.LatLng(latitudeCliente, longitudeCliente);
                        var store2 = new google.maps.LatLng(latitudeStore2, longitudeStore2);
                        var distancia2 = google.maps.geometry.spherical.computeDistanceBetween(cliente2, store2);

                        var datos = {
                            idStore : b2.id,
                            distancia : distancia2
                        }

                        storeWithDistance.push(datos);

                    });

                    var data = {
                        idStoreOrigin : idStoreMin,
                        stores : storeWithDistance,
                        idSale : response.record.id

                    };

                    $.ajax({
                        url: 'admin/saveOrder',
                        type: 'post',
                        data: data,
                        success: function(response) {
                            console.log(response);
                            message.show();
                            if(response.success)
                            {
                                localStorage.clear();
                                $('.texto').text('Su compra se ha realizado con exito');
                            }
                            else
                            {
                                $('.texto').text('La transaccion no se pudo completar');
                            }

                            setTimeout(function(){
                                window.location.href = '/';
                            },4000)

                        },
                        error: function(xhr,ajaxOptions,thrownError){
                            console.log(xhr.status);
                            console.error(thrownError);
                        }
                    });

                }else{
                    message.show();
                    if(response.success)
                    {
                        localStorage.clear();
                        $('.texto').text('Su compra se ha realizado con exito');
                    }
                    else
                    {
                        $('.texto').text('La transaccion no se pudo completar');
                    }

                    setTimeout(function(){
                        window.location.href = '/';
                    },4000)
                }

            },
            error: function(xhr,ajaxOptions,thrownError){
                console.log(xhr.status);
                console.error(thrownError);
            }
        });

    });
    var Contacts = {
        index: 1,
        init: function(){},
        storeAdd: function(entry){
            entry.id = Contacts.index;
            window.localStorage.setItem("Contacts:"+ entry.id, JSON.stringify(entry));
            window.localStorage.setItem("Contacts:index", ++Contacts.index);
        },
        storeEdit:function(entrada){},
        storeRemove:function(entrada){}
    };
    var pedido = {
        'id' : 0,
        'name' : 'name',
        'image' : 'image',
        'quantity' : 2,
        'price' : 25.25,
        'discount' : 0.0,
        'total' : 25
    }
    var functions = {
        total : function(price,quantity){
            return (parseInt(price) * parseInt(quantity));
        },
        fill : function(){
            pedido.name = $('[name=title]').text();
            pedido.image = $('[name=img]').attr('src');
            pedido.quantity = 1;
            pedido.price = $('[name=price]').text();
            pedido.total = functions.total(pedido.price,pedido.quantity);
            functions.updateItems();
          },
        updateItems : function(){
            var items = localStorage.length;
            $('.items').text(items);
        },
        validateAction: function(id){
            var object = JSON.parse(localStorage.getItem(''+id));
            if (object === null){
                localStorage.setItem( ''+id , JSON.stringify(pedido) );
            }else{
                object.quantity += 1;
                localStorage.removeItem(''+id);
                localStorage.setItem( ''+id , JSON.stringify(object) );
            }
        },
        fillTable: function(){
          for ( var i = 0, len = localStorage.length; i < len; ++i )
          {
            var object =JSON.parse(localStorage.getItem(localStorage.key(i)));
            $('.table tbody').append('<tr>'+
                                          '<td>'+object.name+'</td>'+
                                          '<td><input type="number" data-id="'+object.id+'" value='+object.quantity+' class="form-control quantity" style = "width : 75px"></td>'+
                                          '<td class="price">'+object.price+'</td>'+
                                          '<td>'+0+'</td>'+
                                          '<td class="total">'+functions.total(object.price,object.quantity)+'</td>'+
                                          '<td><a href="#" class="deleteItem" data-id="'+object.id+'" ><i class="fa fa-trash-o"></i></a></td>'+
                                      +'</tr>');
          }
        },
        getTotal : function(idTable){
            var total = 0.00;
            var table = $('#'+ idTable + ' tr .total');
            table.each(function(index){
               total += parseInt($(this).text());
            });
            $('#fullTotal').text(total);
        },
        prepareData:function(){
             return $.map(localStorage, function (row, index) {
                 var tmpIndex = index;
                 if (localStorage.length > 1) {
                     tmpIndex = index + 1;
                 };
                 row = JSON.parse(localStorage.getItem(tmpIndex));

                 return {
                    id: row.id,
                    quantity: row.quantity
                 };
            });
        },
        editaDelete: function(){

        }
    }


});
