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

  $('.live-name').keyup(function () {

      $('.live-preview .box-information h5').text($(this).val());
  });

  $('.live-description').keyup(function () {

    $('.live-preview .box-information .Description-font-size').text($(this).val());
  });
  $('.live-price').keyup(function () {

    $('.live-preview .box-information h4').text($(this).val());
  });
});