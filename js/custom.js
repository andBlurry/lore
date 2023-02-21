
  $( document ).ready(function() {
   

 
     $(".grid").imagesLoaded().progress( function() {
      


    var $container = $('.grid').isotope({
      itemSelector: '.grid-item',
      masonry: {
    
        gutter: 20,
        isFitWidth: false
      }
    });
  
    $container.imagesLoaded().progress(function() {
      $container.fadeIn(1000).isotope('layout');
    });

      });
});