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
});