$(document).ready(function (){
    $('.carousel__about').owlCarousel({
        margin :30,
        loop:true,
        autoplay:true,
 
     responsive :{
         0:{
             items:1,
             nav:true
         },
         600:{
             items:1,
             nav:false
         },
         1000:{
             items:1,
             nav:false
         },
     }
    });  
    $('.owlcousel__partner').owlCarousel({
        margin :30,
        loop:true,
        autoplay:true,
 
     responsive :{
         0:{
             items:1,
             nav:true
         },
         600:{
             items:2,
             nav:false
         },
         1000:{
             items:4,
             nav:false
         },
     }
    });  
    $('.banner__carousel').owlCarousel({
     //    margin :30,
        loop:true,
        autoplay:true,
 
     responsive :{
         0:{
             items:1,
             nav:false
         },
         600:{
             items:1,
             nav:false
         },
         1000:{
             items:1,
             nav:false
         },
     }
    });  
    $('.nav_menu_mobile').hide();
    $('.menu-md-header').click(function(){
     $('.nav_menu_mobile').toggle();
    });
 
 $('.display__form__mobile').click(function(){
     if ($('.form-md-header').find('.input__search').hasClass('show__search'))
     {
      $('.form-md-header').find('.input__search').removeClass('show__search');
     }
     else
     {
      $('.form-md-header').find('.input__search').addClass('show__search');
         }
 });
 
 $('.menu_sub').click(function(){
        if ($(this).find('.submenu').hasClass('activemenu'))
        {
         $(this).find('.submenu').removeClass('activemenu');
        }
        else
        {
         $(this).find('.submenu').addClass('activemenu');
         }  
     });
 });