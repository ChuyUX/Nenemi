$(function (){
	$('.package_select').click(function() {
		var parent = $(this).parent().parent();
		var price = $(parent).find('.package_price').text();
		var price_regular = $(parent).find('.package_regular_price').text();

		$('.product_price').each(function(){
			$(this).text(price);
		});

		$('.product_regular_price').each(function(){
			$(this).text(price_regular);
		});
	});


	$( window ).on( "load", function() { 
		var first_review = $('.yotpo-review:not(.yotpo-hidden):first');
		
		//Fill in user name
		$('.review__meta h6').text($(first_review).find('.yotpo-user-name').text());

		//Fill in date
		$('.review__meta p').text($(first_review).find('.yotpo-review-date:first').text());

		//Fill in stars
		$('.review__meta .list-item__meta-item').html($(first_review).find('.yotpo-review-stars:first').html());

		//Fill in content
		$('.review__content p').text($(first_review).find('.content-review').text());

	});
	
});