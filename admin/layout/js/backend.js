$(function()
{
    //Dashbord page
    $('.toggle-info').click(function (){
      $(this).toggleClass('selected').parent().next('.panel-body').fadeToggle(100);
      if ($(this).hasClass('selected')){
        $(this).html('<i class="fa fa-minus fa-lg"></i>')
      }else {
        $(this).html('<i class="fa fa-plus fa-lg"></i>')
      }
    })
    $('.confirm').click(function (){
      return  confirm('Are Your Sure...?');
    });

    $('.child-link').hover(function () {
      $(this).find('.show-delete').fadeIn(400);
    } ,function (){
      $(this).find('.show-delete').fadeOut(400);
    });


});