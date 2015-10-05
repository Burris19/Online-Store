$(function(){
    $('.create').on('click',function(){
        var route = $(this).data('root');
        $('.content').load( route + '/create');
    });

});
