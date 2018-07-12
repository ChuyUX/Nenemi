$(function () {
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

  $('.js-simple-carousel').slick({
    infinite: false,
    slidesToShow: 3,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  $('.card .collapse.show .wishlist-carousel').slick({
    arrows: false,
    dots: true
  });

  $('.featured-posts').slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 3,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          arrows: false,
          centerPadding: '20px',
          slidesToShow: 1
        }
      }
    ]
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

  $('.js-toggle-profile-edit').click(function(){
    $('.js-profile-display').toggle();
    $('.js-profile-edit').toggle();
    return false;
  });

  $('#payment_method').change(function(){
    if($(this).val() === 'visamastercard'){
      $('.js-visamastercard').show();
    } else {
      $('.js-visamastercard').hide();
    }
  });

  $('[data-toggle="tooltip"]').tooltip();

  $('#accordion').on('shown.bs.collapse', function () {
    $('.card .collapse.show .wishlist-carousel').slick({
      arrows: false,
      dots: true
    });
  });

  $('.js-edit-lists').click(function(){
    $('#accordion').addClass('accordion--edit');
    $('.dashboard__content').addClass('dashboard__content--actions');
    $(this).hide();
    return false;
  });

  $('.js-quit-edit-lists').click(function(){
    $('#accordion').removeClass('accordion--edit');
    $('.dashboard__content').removeClass('dashboard__content--actions');
    $('.js-edit-lists').show();
    return false;
  });

  if($('.sticky-scroll-box').length > 0){
    var sticky_item = $('.sticky-scroll-box');
    var top = sticky_item.offset().top;
    $(window).scroll(function () {
      var y = $(this).scrollTop();
      var z = sticky_item.parent();
      if (y >= top){
        sticky_item.width(sticky_item.parent().width());
        sticky_item.addClass('sticky-scroll-box--fixed');
        if(y >= (z.height() + z.offset().top - sticky_item.height())){
          sticky_item.removeClass('sticky-scroll-box--fixed');
          sticky_item.width('auto');
        }
      }else{
        sticky_item.removeClass('sticky-scroll-box--fixed');
        sticky_item.width('auto');
      }

    });
  }

  $('.js-gallery-item').magnificPopup({
    type: 'image',
    gallery:{
      enabled:true
    }
  });

  $('.js-popup-youtube').magnificPopup({
    type: 'iframe'
  });

  $('.js-modal').magnificPopup({
    type: 'inline',
    modal: true
  });

  $('[data-toggle="datepicker"]').datepicker();

  $('.scroll-to').each(function(){
    $(this).click(function(){
        $('html,body').animate({ scrollTop: $($(this).attr('href')).position().top }, 'slow');
        return false;
    });
  });

  $('.woocommerce-select-all').change(function(){
    if($(this).is(':checked')){
      $('.woocommerce-cart-form__contents input').each(function(){
        $(this).prop('checked', true);
      });
    } else {
      $('.woocommerce-cart-form__contents input').each(function(){
        $(this).prop('checked', false);
      });
    }
  });

  $('.js-select-pckg').click(function(){
    if($(this).parents('.panel').hasClass('panel--active')){
      $(this).parents('.pckg-wrappper').find('.panel:not(.panel--active) .btn-primary').removeClass('btn-primary').addClass('btn-outline-primary').text('SELECT');
    }else{
      $(this).parents('.pckg-wrappper').find('.panel .btn-primary').removeClass('btn-primary').addClass('btn-outline-primary').text('SELECT');
    }
    $('.panel').removeClass('panel--active');
    $('.panel__content-select').hide();
    $('.js-view-pckg').fadeIn();
    if($(this).hasClass('btn-primary')){
      $(this).removeClass('btn-primary').addClass('btn-outline-primary').text('SELECT');
      $(this).parents('.panel').find('.panel__content-select').hide();
      $(this).parents('.panel').find('.js-view-pckg').show();
      $(this).parents('.panel').removeClass('panel--active');
    } else {
      $(this).removeClass('btn-outline-primary').addClass('btn-primary').text('SELECTED');
      $(this).parents('.panel').find('.panel__content-select').show();
      $(this).parents('.panel').find('.js-view-pckg').hide();
      $(this).parents('.panel').addClass('panel--active');
    }
    return false;
  });

  $('input[name="payment"]').change(function(){
    if($('#mc_visa').prop('checked')){
      $('.mc_visa__wrapper').show();
    } else{
      $('.mc_visa__wrapper').hide();
    }
  });

});
