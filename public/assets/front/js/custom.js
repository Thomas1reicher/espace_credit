jQuery(function ($) {
    $(".div-bande-header").hover(function() {
        $(this).find(".titre-bande-header").css('color', 'orange');
        if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--9-13@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--9-14@1x.png");
        }
        else if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--11-13@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--11-16@1x.png");
        }
        else if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--236-38@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--236-42@1x.png");
        }
        else if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--235-44@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--235-43@1x.png");
        }
        else if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--13-11@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--13-19@1x.png");
        }
        else if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--15-17@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--15-20@1x.png");
        }
        else if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--343-12@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--343-20@1x.png");
        }
        else if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--20-11@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--20-24@1x.png");
        }

    },function(){
        $(this).find(".titre-bande-header").css('color', 'var(--dove-gray)');
        if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--9-14@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--9-13@1x.png");
        }
        else if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--11-16@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--11-13@1x.png");
        }
        else if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--236-42@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--236-38@1x.png");
        }
        else if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--235-43@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--235-44@1x.png");
        }
        else if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--13-19@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--13-11@1x.png");
        }
        else if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--15-20@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--15-17@1x.png");
        }
        else if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--343-20@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--343-12@1x.png");
        }
        else if($(this).find(".img-h").attr("src") == "/assets/front/img/trac--20-24@1x.png"){
            $(this).find(".img-h").attr("src","/assets/front/img/trac--20-11@1x.png");
        }
    })
    
    $(".img-home-header").hover(function() {
        $(this).attr("src","/assets/front/img/trac--2-12@1x.png");
    },function(){
        $(this).attr("src","/assets/front/img/trac-2.png");
    });

    $("[role=presentation]").hover(function() {
        $(this).find(".tab").css('color', 'orange');
    },function(){
        $(this).find(".tab").css('color', 'var(--dove-gray)');
    });
});

