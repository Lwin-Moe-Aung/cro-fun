$(function() {
    var maxlen = 100;
    var ellipsestext = "...";
    var moretext = "Read More >>";
    var lesstext = "<< Hide";
    $('.more').each(function() {
        var content = $(this).html();

        if(content.length > maxlen) {

            var c = content.substr(0, maxlen);
            var h = content.substr(maxlen, content.length - maxlen);

            var html = c + '<span class="moreellipses">' + ellipsestext+ '</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
        }

    });

    $(" .morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });

    
});