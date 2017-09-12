 $(document).ready(function () {
    $('.forgot-pass').click(function(event) {
      $(".pr-wrap").toggleClass("show-pass-reset");
    }); 
    
    $('.pass-reset-submit').click(function(event) {
      $(".pr-wrap").removeClass("show-pass-reset");
    }); 

    $('.sign-in').click(function(event) {
      $(".pr-sign").toggleClass("show-sign-form");
    }); 
    
    $('.pass-login-submit').click(function(event) {
      $(".pr-sign").removeClass("show-sign-form");
    });
});