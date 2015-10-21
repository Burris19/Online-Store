/**
 * Created by julian on 21/10/15.
 */
$(function(){
    $('.detail').on('click',function(e){
        e.preventDefault();
        var parent = $(this).parents('.item');
        var id = parent.data('id');
        var url = 'detail/' + id;
        $('#content').load(url);
    });
});
