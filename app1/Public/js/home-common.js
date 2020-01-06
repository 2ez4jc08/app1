$(document).ready(function(){

    $('.support-trigger').mouseenter(function(){
        $('.trig-div').hide();
        $('.support-float').stop();
        $('.support-float').toggle({width: 195}, 400);
    });

    $('.support-float').mouseleave(function(){
        $('.support-float').toggle();
        $('.trig-div').show();
    });

});


