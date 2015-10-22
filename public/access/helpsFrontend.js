/**
 * Created by julian on 21/10/15.
 */
$(function(){
    var items = localStorage.length;
    $('.items').text(items);



    $('.detail').on('click',function(e){
        e.preventDefault();
        var parent = $(this).parents('.item');
        var id = parent.data('id');
        var url = 'detail/' + id;
        $('#content').load(url);
    });

    $('.addCart').on('click',function(){
        pedido.id = $(this).data('id');
        functions.fill();
        functions.validateAction($(this).data('id'));
        $('#content').load('shoppingCart',function(){
            functions.fillTable();
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
        validateAction: function(id)
        {
            var object = JSON.parse(localStorage.getItem(''+id));
            if (object === null){
                localStorage.setItem( ''+id , JSON.stringify(pedido) );
            }else{
                object.quantity +=1 ;
                localStorage.removeItem(''+id);
                localStorage.setItem( ''+id , JSON.stringify(object) );

            }
        },

        fillTable: function(){
          //debugger
          for ( var i = 0, len = localStorage.length; i < len; ++i )
          {
            var object =JSON.parse(localStorage.getItem(localStorage.key(i)));
            console.log(object);

            $('.table tbody').append('<tr>'+
                                      '<td>'+object.name+'</td>'+
                                      '<td><input type="number" value='+object.quantity+' class="form-control" width=100></td>'+
                                      '<td>'+object.price+'</td>'+
                                      '<td>'+0+'</td>'+
                                      '<td>'+object.quantity+'</td>'+
                                      +'</tr>');

          }
        }
    }




});
