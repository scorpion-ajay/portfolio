(function($) {
  "use strict";
  $(window).on("load", function() { // makes sure the whole site is loaded
    //preloader
    $("#status").fadeOut(); // will first fade out the loading animation
    $("#preloader").delay(450).fadeOut("slow"); // will fade out the white DIV that covers the website.    
  });


    //menu

    var content = document.querySelector( '.content-wrap' );

    function inits() {
      initEvents();
    }
    
    inits();

  	//typed js
    $(".typed").typed({
        strings: ["My Name is Ajay Verma","aka Developer", "I'm a Web Designer and Developer", "Love Simplicity"],
        typeSpeed: 100,
        backDelay: 900,
        // loop
        loop: true
    });

})(jQuery);