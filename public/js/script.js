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

    $('#replayBody').click(function(){
        body  = $(this).val();
        fName = $(this).attr("data-user");
        if(!fName){
            $(this).css('color', 'red').html('Please Log in for leaving a Replay!');
            return false;
        }
    });

    $('#commentSubm').click(function(){
        body  = $(this).prev().val();
        articleId = $(this).prev().attr('data-id');
        fName = $(this).prev().attr("data-user");
        
        if(!fName){
            $(this).prev().css('color', 'red').html('Please Log in for leaving a Replay!');
            return false;
        }

        if(body.trim().length == 0){
            $(this).prev().attr('placeholder','Please fill out this field');
            return false;

        }

        if(body.trim().length < 3){
            $(this).prev().attr('placeholder','Please fill out this field');
            $('#pComm').text('Replay must bee at least three caracters!');
            return false;
        }

        $.ajax({
            url: '/articles/'+articleId+'/comments',
            type: 'post',
            data: {body:body,article_id:articleId},
            success: function (data) { 
                
                if( !$.trim( $('.list-group').html() ).length ) {
                    resp = 1;
                    $('.replay:first').prepend('<span><i id="r">'+resp+' Response</i></span><hr>');
                }

            $('.list-group').prepend("<li class='resp'><p><i>By "+fName+"</i> <i class='createdAt'>now</i></p><p>"+body+"</p><hr class='hr2'></li>");
            $('.textarea').val('');
            resp = $('.resp').length;
            $('#r').text(resp+ " Response");
                if(resp > 1){
                   $('#r').text(resp+ " Responses"); 

                }
            $('.createdAt').first().data("data-date", data[0].created_at); 
           
            currentDate = new Date();
            $(".createdAt").each(function(){
                createdAt =new Date($(this).data("data-date"));
                diff = ((currentDate - createdAt)/1000).toString();
                diff = Math.ceil(diff);
                $(this).text(diff+ " sec ago");
            });

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