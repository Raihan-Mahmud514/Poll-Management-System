 
/*=======	Sticky Nav =========*/

 $(window).scroll(function(){
     
        var ourWindow = $(this).scrollTop();
        
        if(ourWindow>300) {
            $('body').addClass('sticky');
        } else{
            $('body').removeClass('sticky');
        }
    });

/*======Nav-Color-Changer ==========*/

$('#menu ul li').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
    });