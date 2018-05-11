$('.js-destinations').slick({
  dots: false,
  infinite: false,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$('.js-centeritem').slick({
  dots: false,
  infinite: false,
  slidesToShow: 1,
  centerMode: true,
  centerPadding: ($(window).width() - $('.navbar').width()) / 2+'px'
});

$('.filter a').click(function(){
  if($(this).hasClass('btn-outline-primary')){
    $('.results-list').addClass('results-list--overlay');
    $(this).removeClass('btn-outline-primary').addClass('btn-primary');
  } else {
    $('.results-list').removeClass('results-list--overlay');
    $(this).removeClass('btn-primary').addClass('btn-outline-primary');
  }
  $(this).parent().find('.filter__modal').toggle();
  return false;
});

$('.filter__modal-close').click(function(){
  var filter_link = $(this).parents('.filter').find('.filter__link');
  if(filter_link.hasClass('btn-outline-primary')){
    $('.results-list').addClass('results-list--overlay');
    filter_link.removeClass('btn-outline-primary').addClass('btn-primary');
  } else {
    $('.results-list').removeClass('results-list--overlay');
    filter_link.removeClass('btn-primary').addClass('btn-outline-primary');
  }
  $(this).parents('.filter__modal').hide();
  return false;
});
