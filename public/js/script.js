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
                    $('.show p:first').append('<i class="fa fa-comments-o"></i><i class="commentsI comm"> comments '+resp+'</i>')
                }

                if( !$.trim( $('#recentComm ul').html() ).length ) {
                    $('<span><i>Recent comments</i></span><hr>').insertBefore('#recentComm');
                }


                $('#recentComm ul').prepend('<li data-id="'+data.id+'"><p><i class="commentsI">By</i><i class="commentsI"> '+fName+'</i><i class="fa fa-clock-o"></i> <i class="createdAt commentsI">now</i></p><a href=""><h5 id="h5">'+body.substr(0, 60)+'</h5></a><hr class="hr2"></li>');



                $('.list-group').prepend("<li class='resp'><div id='userImg'><img src='/img/noUser.png' alt='&#9786'></div><div id='replayIcon'><a class='fa fa-reply' href=''></a></div><div class='delete-comment' data-id='"+data.id+"'><button class='btnSubm'>Delete</button></div><p><i class='commentsI'>By</i><i class='commentsI'> "+fName+"</i><i class='fa fa-clock-o'></i> <i class='createdAt commentsI'>now</i></p><p>"+body+"</p><hr class='hr2'></li>");


                $('.textarea').val('');
                $('.resp').first().slideToggle("fast");
                resp = $('.resp').length;
                $('#r').text(resp+ " Response");
                    if(resp > 1){
                       $('#r').text(resp+ " Responses");
                       $('.show .comm').text(' comments '+resp); 

                    }
                $('.createdAt').first().data("data-date", data.created_at); 

                $('#recentComm .createdAt').first().data("data-date", data.created_at); 
               
                currentDate = new Date();
                $(".createdAt").each(function(){
                    createdAt =new Date($(this).data("data-date"));
                    diff = ((currentDate - createdAt)/1000).toString();
                    diff = Math.ceil(diff);
                    $(this).text(diff+ " sec ago");
                });

                deleteComment();
            }
            
        });

    });

    $(".resp").slice(0, 3).show();
    $('#loadMore').click(function (e) {
        e.preventDefault();
        $(".resp:hidden").slice(0, 3).slideDown();
        if ($(".resp:hidden").length == 0) {
            $("#load").slideToggle('fast');
        }
        
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


let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();

let months = ["January", "February", "March", "April", "May", "Jun", "July", "August", "September", "October", "November", "December"];

$('#next').click(function(){
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
});

$('#previous').click(function(){
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
});

showCalendar(currentMonth, currentYear);

function showCalendar(month, year) {
let firstDay = (new Date(year, month)).getDay();
let daysInMonth = 32 - new Date(year, month, 32).getDate();
let prevMonth = month-1;
let daysPrevMonth = 32 - new Date(year, prevMonth, 32).getDate();

$('#calendar-body').html("");
$('#monthAndYear').text(months[month] + " " + year);
let date = 1;
    for (let i = 0; i < 6; i++) {
        $('#calendar-body').append("<tr></tr>");
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay-1) {
                $('#calendar-body tr').prepend("<td class='day emptyTd'>"+(daysPrevMonth--)+"</td>");
            }
            else if (date > daysInMonth) {
                $('#calendar-body tr:nth-of-type('+(i+1)+')').append("<td class='day'></td>");
                if($('#calendar-body tr:last-of-type td:first-of-type').is(':empty')){
                    $('#calendar-body tr:last-of-type').remove();
                    
                }
                
            }else {
                $('#calendar-body tr:nth-of-type('+(i+1)+')').append("<td class='day "+date+"'>"+date+"</td>");
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    $('.'+date+'').addClass("bg-info");
                }
                date++;
            }

        }
    }
    
    let emptyTd = $('#calendar-body tr:last-of-type td:empty');
    emptyTd.addClass('emptyTd')
    for (let k=1; k <= emptyTd.length; k++) {
        $('#calendar-body tr:last-of-type td:empty').first().text(k)
    }
    
}

$('.delete-article .btnSubm').click(function(){
    let href = $(this).parent().parent().parent().find('.title-href').attr('href');
    $(this).parent().parent().parent().remove();
    $.ajax({
        url: href,
        type: 'post',
        data: {'_method': 'DELETE'}
    });
});

function deleteComment(){
    $('.delete-comment .btnSubm').click(function(){
    let url = $(this).parent().attr("data-id");
    $(this).parent().parent().remove();
    $('[data-id='+url+']').remove();
    $.ajax({
        url: '/comments/'+url+'/delete',
        type: 'post',
        data: {'_method': 'DELETE'}
    });

    resp = $('.resp').length;
        $('#r').text(resp+ " Response");
        if(resp > 1){
            $('#r').text(resp+ " Responses");
            $('.show .comm').text(' comments '+resp); 
        }
        if(resp == 0){
            $('#r').parent().next().remove();
            $('#r').parent().remove(); 
        }
        if($.trim($("#recentComm ul").html())==''){
            $('#recentComm').prev().remove();
        }

    });   

}

deleteComment()


    
});

    
    
    