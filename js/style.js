$(document).scroll(function () {
 var ukuran2 = $('#header').height() + 40;
 if ($(document).scrollTop() >= ukuran2 && $(window).width() > 750) {
     $('#site-menu').css('position', 'fixed');
     $('#site-menu').css('top', 0);
     $('#isi').css('position', 'relative');
     $('#isi').css('top', 85);
     $('.opening').css('height', $(window).width() * (550/1349));
     $('#opening').css('background-position-y', $(window).width() * (25/1349));
 } else if ($(document).scrollTop() >= ukuran2 && $(window).width() <= 750 && $(window).width() > 550 ) {
     $('#site-menu').css('position', 'fixed');
     $('#site-menu').css('top', 0);
     $('#isi').css('position', 'relative');
     $('#isi').css('top', 110);
     $('#opening').css('background-position-y', $(window).width() * (25/750));
 }  else if ($(document).scrollTop() < ukuran2 && $(window).width() <= 750 && $(window).width() > 550 ) {
     $('#opening').css('background-position-y', $(window).width() * (25/750));
     $('#site-menu').css('position', 'static');
     $('#isi').css('top', 0);
 } else if ($(document).scrollTop() >= ukuran2 && $(window).width() <= 550 && $(window).width() > 400 && $(".site-menu").height() <= 95) {
     $('#site-menu').css('position', 'fixed');
     $('#site-menu').css('top', 0);
     $('#isi').css('position', 'relative');
     $('#isi').css('top', 103);
     $('#opening').css('background-position-y', $(window).width() * (25/550));
 }  else if ($(document).scrollTop() < ukuran2 && $(window).width() <= 550 && $(window).width() > 400 ) {
     $('#opening').css('background-position-y', $(window).width() * (25/550));
     $('#site-menu').css('position', 'static');
     $('#isi').css('top', 0);
 } else if ($(document).scrollTop() >= ukuran2 && $(window).width() <= 550 && $(window).width() > 400 && $(".site-menu").height() >= 96) {
     $('#site-menu').css('position', 'fixed');
     $('#site-menu').css('top', 0);
     $('#isi').css('position', 'relative');
     $('#isi').css('top', 416);
     $('#opening').css('background-position-y', $(window).width() * (25/550));
 }  else if ($(document).scrollTop() < ukuran2 && $(window).width() <= 550 && $(window).width() > 400 ) {
     $('#opening').css('background-position-y', $(window).width() * (25/550));
     $('#site-menu').css('position', 'static');
     $('#isi').css('top', 0);
 } else if ($(document).scrollTop() >= ukuran2 && $(window).width() <= 400 && $(window).width() > 100 && $(".site-menu").height() <= 65 ) {
     $('#site-menu').css('position', 'fixed');
     $('#site-menu').css('top', 0);
     $('#isi').css('position', 'relative');
     $('#isi').css('top', 60);
     $('#opening').css('background-position-y', $(window).width() * (25/400));
 } else if ($(document).scrollTop() < ukuran2 && $(window).width() <= 400 && $(window).width() > 100 ) {
     $('#opening').css('background-position-y', $(window).width() * (25/400));
     $('#site-menu').css('position', 'static');
     $('#isi').css('top', 0);
 } else if ($(document).scrollTop() >= ukuran2 && $(window).width() <= 400 && $(window).width() > 100 && $(".site-menu").height() >= 66) {
     $('#site-menu').css('position', 'fixed');
     $('#site-menu').css('top', 0);
     $('#isi').css('position', 'relative');
     $('#isi').css('top', 358);
     $('#opening').css('background-position-y', $(window).width() * (25/400));
 } else if ($(document).scrollTop() < ukuran2 && $(window).width() <= 400 && $(window).width() > 100 ) {
     $('#opening').css('background-position-y', $(window).width() * (25/400));
     $('#site-menu').css('position', 'static');
     $('#isi').css('top', 0);
 } else {
     $('#site-menu').css('position', 'static');
     $('#isi').css('top', 0);
 }
});
$(window).ready(function () {
 if($(window).width() <= 480){
 var ukuran  = $(window).width() / 60 ;
     $('.site-title img').css('width', ukuran * 10);
     $('.site-title h1').css('font-size', ukuran * 4);
     $('.site-title h1').css('bottom', ukuran / 8 * 10);
 }
})

$(window).ready(function() {
 var ukuran3 = $(window).width() ;
 if($(window).width() > 750){
     $('.opening').css('height', ukuran3 * (550/1349));
     $('#opening').css('background-position-y', ukuran3 * (25/1349));
     $('#opening .teks').css('top', ukuran3 * (346/1349));
     $('#opening .bg1').css('width', ukuran3 * (300/1349));
     $('#opening .bg1').css('height', ukuran3 * (55/1349));
     $('#opening .bg1').css('top', ukuran3 * (15/1349));
     $('#opening h2').css('font-size', ukuran3 * (40/ 1349));
     $('a.register-btn').css('padding-top', ukuran3 * (10/1349));
     $('a.register-btn').css('padding-bottom', ukuran3 * (10/1349));
     $('a.register-btn').css('padding-left', ukuran3 * (20/1349));
     $('a.register-btn').css('padding-right', ukuran3 * (20/1349));
     $('a.register-btn').css('height', ukuran3 * (50/1349));
     $('a.register-btn').css('width', ukuran3 * (150/1349));
     $('a.register-btn').css('font-size', ukuran3 * (18/1349));
     $('#opening .bg1').css('margin-bottom', ukuran3 * (20/1349));
 }  else if(ukuran3 <= 750 && ukuran3 > 550) {
     $('#bab1 .container').css('margin-right', ukuran3 * (40/750));
     $('#bab1 .container').css('margin-left', ukuran3 * (40/750));
     $('#bab1').css('height', ukuran3 * (473/75000) + 473);
     $('#opening').css('background-position-y', ukuran3 * (25/750));
     $('#opening .teks').css('top', ukuran3 * (299/750));
     $('#opening .bg1').css('width', ukuran3 * (300/750));
     $('#opening .bg1').css('height', ukuran3 * (55/750));
     $('#opening .bg1').css('top', ukuran3 * (15/750));
     $('#opening h2').css('font-size', ukuran3 * (40/ 750));
     $('a.register-btn').css('padding-top', ukuran3 * (10/750));
     $('a.register-btn').css('padding-bottom', ukuran3 * (10/750));
     $('a.register-btn').css('padding-left', ukuran3 * (20/750));
     $('a.register-btn').css('padding-right', ukuran3 * (20/750));
     $('a.register-btn').css('height', ukuran3 * (50/750));
     $('a.register-btn').css('width', ukuran3 * (150/750));
     $('a.register-btn').css('font-size', ukuran3 * (18/750));
     $('#opening .bg1').css('margin-bottom', ukuran3 * (20/750));
     $('#opening2 .')
 } else if(ukuran3 <= 550 && ukuran3 > 400) {
     $('.opening').css('height', ukuran3 * (515/550));
     $('#opening').css('background-position-y', ukuran3 * (25/550));
     $('#opening .teks').css('top', ukuran3 * (251/550));
     $('#opening .bg1').css('width', ukuran3 * (300/550));
     $('#opening .bg1').css('height', ukuran3 * (55/550));
     $('#opening .bg1').css('top', ukuran3 * (15/550));
     $('#opening h2').css('font-size', ukuran3 * (40/ 550));
     $('a.register-btn').css('padding-top', ukuran3 * (10/550));
     $('a.register-btn').css('padding-bottom', ukuran3 * (10/550));
     $('a.register-btn').css('padding-left', ukuran3 * (20/550));
     $('a.register-btn').css('padding-right', ukuran3 * (20/550));
     $('a.register-btn').css('height', ukuran3 * (50/550));
     $('a.register-btn').css('width', ukuran3 * (150/550));
     $('a.register-btn').css('font-size', ukuran3 * (18/550));
     $('#opening .bg1').css('margin-bottom', ukuran3 * (20/550));
 } else {
     $('.opening').css('height', ukuran3 * (515/400));
     $('#opening').css('background-position-y', ukuran3 * (25/400));
     $('#opening').css('height', ukuran3 * (324/400));
     $('#opening .teks').css('top', ukuran3 * (187/400));
     $('#opening .bg1').css('width', ukuran3 * (210/400));
     $('#opening .bg1').css('height', ukuran3 * (49/400));
     $('#opening .bg1').css('top', ukuran3 * (15/400));
     $('#opening h2').css('font-size', ukuran3 * (40/ 400));
     $('a.register-btn').css('padding-top', ukuran3 * (10/400));
     $('a.register-btn').css('padding-bottom', ukuran3 * (10/400));
     $('a.register-btn').css('padding-left', ukuran3 * (9/400));
     $('a.register-btn').css('padding-right', ukuran3 * (9/400));
     $('a.register-btn').css('height', ukuran3 * (46/400));
     $('a.register-btn').css('width', ukuran3 * (114/400));
     $('a.register-btn').css('font-size', ukuran3 * (18/400));
     $('#opening .bg1').css('margin-bottom', ukuran3 * (20/400));
 }
})

$(document).on('click', '.menu-link', function (e) {
 e.preventDefault();
 var location = parseInt($(this).attr('data-top')) -150;

 $("html, body").animate({ scrollTop: location }, "slow");
});
$(document).scroll(function() {
 var ukuran4 = ($(document).scrollTop() / 10) * 5;
 if($(window).width() > 550){
     $('#bab3').css('background-position-y', 1400 - ukuran4);
 } else {
     $('#bab3').css('background-position-y', 1750 - ukuran4);
 }
})
