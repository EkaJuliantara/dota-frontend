$(document).scroll(function () {
 var ukuran2 = $('#header').height() + 40;
 if ($(document).scrollTop() >= ukuran2 && $(window).width() > 750) {
     $('#site-menu').css('position', 'fixed');
     $('#site-menu').css('top', 0);
     $('#isi').css('position', 'relative');
     $('#isi').css('top', 70);
 } else if ($(document).scrollTop() >= ukuran2 && $(window).width() <= 750 ) {
     $('#site-menu').css('position', 'fixed');
     $('#site-menu').css('top', 0);
     $('#isi').css('position', 'relative');
     $('#isi').css('top', 75);
 }  else if ($(document).scrollTop() < ukuran2 && $(window).width() <= 750 ) {
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
/*
$(window).ready(function() {
 var ukuran3 = $(window).width() ;
 if($(window).width() > 750){
     $('.opening').css('height', ukuran3 * (590/1349));
     $('#opening .teks').css('top', ukuran3 * (110/1349));
     $('#opening .bg1').css('width', ukuran3 * (300/1349));
     $('#opening .bg1').css('height', ukuran3 * (55/1349));
     $('#opening .bg1').css('top', ukuran3 * (15/1349));
     $('#opening h2').css('font-size', ukuran3 * (40/ 1349));
     $('a.register-btn').css('padding-top', ukuran3 * (10/1349));
     $('a.register-btn').css('padding-bottom', ukuran3 * (10/1349));
     $('a.register-btn').css('padding-left', ukuran3 * (20/1349));
     $('a.register-btn').css('padding-right', ukuran3 * (20/1349));
     $('a.register-btn').css('height', ukuran3 * (50/1349));
     $('a.register-btn').css('width', ukuran3 * (236/1349));
     $('a.register-btn').css('font-size', ukuran3 * (18/1349));
     $('#opening .bg1').css('margin-bottom', ukuran3 * (20/1349));
 }  else if(ukuran3 <= 750 && ukuran3 > 550) {
     $('#opening').css('background-position-y', ukuran3 * (25/750));
     $('#opening .bg1').css('width', ukuran3 * (300/750));
     $('#opening .bg1').css('height', ukuran3 * (55/750));
     $('#opening .bg1').css('top', ukuran3 * (15/750));
     $('#opening h2').css('font-size', ukuran3 * (40/ 750));
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
*/

$('a[href^="#"]').on('click', function (e) {
 e.preventDefault();
    var target = this.hash,
    $target = $(target);
       var scrollAmount = $target.offset().top - $("#header").height() + 16;
       if(target == "#timeline")
       {
         scrollAmount-=64;
       }
 $("html, body").animate({ scrollTop: scrollAmount }, "slow");
});

$(document).scroll(function() {
 var ukuran4 = ($(document).scrollTop() / 10) * 5;
 if($(window).width() > 750){
     $('#bab3').css('background-position-y', 1800 - ukuran4);
 } else {
     $('#bab3').css('background-position-y', 1300 - ukuran4);
 }
})
