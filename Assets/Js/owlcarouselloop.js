$(document).ready(function() {
 
    $("#owl-demo").owlCarousel({
        items : 10, //10 items above 1000px browser width
        itemsDesktop : [1000,5], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,3], // betweem 900px and 601px
        itemsTablet: [600,2], //2 items between 600 and 0;
        itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
    });
   
  });