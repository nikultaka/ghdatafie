jQuery(document).ready(function ($) {
    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(this.hash).offset().top
        }, 1000);
    });
});
// You can also use "$(window).load(function() {"
$(function () {
    // Slideshow 3
//    $("#slider3").responsiveSlides({
//        auto: true,
//        pager: false,
//        nav: true,
//        speed: 500,
//        namespace: "callbacks",
//        before: function () {
//            $('.events').append("<li>before event fired.</li>");
//        },
//        after: function () {
//            $('.events').append("<li>after event fired.</li>");
//        }
//    });

});

$(window).load(function () {
//    $('.flexslider').flexslider({
//        animation: "slide",
//        start: function (slider) {
//            $('body').removeClass('loading');
//        }
//    });
});

$(document).ready(function () {
    /*
     var defaults = {
     containerID: 'toTop', // fading element id
     containerHoverID: 'toTopHover', // fading element hover id
     scrollSpeed: 1200,
     easingType: 'linear' 
     };
     */
//    $().UItoTop({
//        easingType: 'easeOutQuart'
//    });
});

frontend.common = {
    initialize:function()
    {
    },
    get_csrf_token_value:function(){
        return $("#csrf-token").val();
    },
    get_csrf_toke_object_data:function(){
        var data = {};
        data._token = this.get_csrf_token_value();
        return data;
    },
    get_csrf_toke_array_data:function(){
        var data = [];
        data['_token'] = this.get_csrf_token_value();
        return data;
    },
    get_success_msg:function (msg){
        var data = [];
        data = $('#msg_main').text(msg);
        data = $('#msg_main').attr('style', 'color:green;');;
        data = setTimeout(function(){ $('#msg_main').hide(); }, 3000);
        return data;
    }
    
};