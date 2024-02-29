// Add your JS customizations here
jQuery(document).ready(function ($) {
    $('.btn-darkmode').on('click', function () {
		let cm = $('body').attr('data-bs-theme');
		cm = (cm == 'dark') ? 'light' : 'dark';
		$('body').attr('data-bs-theme',cm);
		document.cookie = "data_bs_theme="+cm+";path=/";
        if(cm == 'dark'){
            $('.btn-darkmode .darkmode-light').hide();
            $('.btn-darkmode .darkmode-dark').show();
        } else {
            $('.btn-darkmode .darkmode-light').show();
            $('.btn-darkmode .darkmode-dark').hide();
        }
    });
    $(window).scroll(function() {
        if ($(window).scrollTop() > $('#site-header').height()) {
          $("body").addClass("is-scrolled");
          $('#karyawp-scrolltotop').fadeIn(100);
        } else {
          $("body").removeClass("is-scrolled");
          $('#karyawp-scrolltotop').fadeOut(100);
        }
    });
    $('#karyawp-scrolltotop').on('click', function () {
      $('html, body').animate({scrollTop : 0}, 800);
      return false;
    });
});