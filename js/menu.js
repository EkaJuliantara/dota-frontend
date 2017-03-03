$(document).ready(function (){
    if($(document).width() <= 750)
    {
        $(".menu").hide();
        $(".closebtn").hide();
    }
})
function openNav() {
    $(".menu").slideToggle("slow");
    $(".menu").show();
    $(".closebtn").show();
    $(".openbtn").hide();
    if($(document).scrollTop() >= 85 && $(window).width() <=750 )
    {
        document.getElementById('isi').style.top = "350px";
    }
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    if($(window).width() <= 750)
    {
        $(".menu").slideToggle("slow");
        $(".openbtn").show();
        $(".closebtn").hide();
        if($(document).scrollTop() >= 40)
        {
            document.getElementById('isi').style.top = "60px";
        }
    }
}
