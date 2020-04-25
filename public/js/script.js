$(document).ready(function(){ 
$.ajaxSetup({
    headers:
    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

    $('.subscription').find('.btnSubm').click(function () {
        email = $(this).next().val();
        
       $.ajax({
            url: '/subscribers',
            type: 'post',
            data: {email:email},
            success: function (data) { 
                $('.subsMsg').text(data);
                $('input[name ="email"]').val('');
            }
        });
    });

    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 400) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 

        if($(this).scrollTop() > 130) {
            $('#down').css({position:'fixed', top:'0px', right:'0px', });
            $('#down').css('z-index', 3000);
            $('#divNav').css('padding', '0 30px');
        }
        else{
            $('#down').css('position', 'static');
            $('#divNav').css('padding', '0');
        }
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    });

});