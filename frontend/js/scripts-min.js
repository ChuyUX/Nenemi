$(".js-destinations").slick({dots:!1,infinite:!1,slidesToShow:3,slidesToScroll:1,responsive:[{breakpoint:600,settings:{slidesToShow:1,slidesToScroll:1}}]}),$(".js-centeritem").slick({dots:!1,infinite:!1,slidesToShow:1,centerMode:!0,centerPadding:($(window).width()-$(".navbar").width())/2+"px"}),$(".filter a").click(function(){return $(this).hasClass("btn-outline-primary")?($(".results-list").addClass("results-list--overlay"),$(this).removeClass("btn-outline-primary").addClass("btn-primary")):($(".results-list").removeClass("results-list--overlay"),$(this).removeClass("btn-primary").addClass("btn-outline-primary")),$(this).parent().find(".filter__modal").toggle(),!1}),$(".filter__modal-close").click(function(){var s=$(this).parents(".filter").find(".filter__link");return s.hasClass("btn-outline-primary")?($(".results-list").addClass("results-list--overlay"),s.removeClass("btn-outline-primary").addClass("btn-primary")):($(".results-list").removeClass("results-list--overlay"),s.removeClass("btn-primary").addClass("btn-outline-primary")),$(this).parents(".filter__modal").hide(),!1});