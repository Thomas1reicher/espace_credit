jQuery(function ($) {

    $(".montant-form").change(function() {
       recalculate(); 
       montant=parseInt($(this).val());
       $(".montant-info").text(montant+"€");

    });
    $(".duree-form").change(function() {
        recalculate(); 
        duree=parseInt($(this).val());
        $(".duree-info").text(duree+" mois");
     });
     $(".select-credit").change(function() {
        taeg=parseFloat($(".select-credit option:selected").val());
        $(".taux-info").attr("data",taeg);
        $(".taux-info").text(taeg+"%*");
        recalculate(); 
        
     });
    function recalculate(){
        montant =parseInt($(".montant-form").val());
        taeg = parseFloat($(".taux-info").attr("data"));
        taeg = taeg/100;
        duree=parseInt($(".duree-form").val());
        v1=(Math.pow(( 1+taeg ) ,( 1/12 )) - 1 );
        v2=( 1 - Math.pow(( 1 / ( 1+ taeg ) ) , ( duree / 12 )));
        constante3 = ( montant  * v1 / v2 );
        constante3_b = Math.floor(constante3);
        constante3_l = (constante3*100)-(constante3_b*100);
        elmt=$(".litle-num-orange");
        $(".big-num-orange").text(constante3_b);
        $(".big-num-orange").append(elmt);
        $(".big-num-orange").append("€");
        $(".litle-num-orange").text(','+Math.floor(constante3_l));
        interet=constante3*(1+taeg);
        $(".interet-info").text(interet.toFixed(2)+"€");

        

    };
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

    $(".icones-philo td").hover(function() {
        $(this).find(".titre-bande-header").css('color', 'orange');
        if($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--9-13@1x.png"){
            $(this).find(".img-philo").attr("src","/assets/front/img/trac--9-14@1x.png");
        }
        else if($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--11-13@1x.png"){
            $(this).find(".img-philo").attr("src","/assets/front/img/trac--11-16@1x.png");
        }
        else if($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--236-38@1x.png"){
            $(this).find(".img-philo").attr("src","/assets/front/img/trac--236-42@1x.png");
        }
        else if($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--235-44@1x.png"){
            $(this).find(".img-philo").attr("src","/assets/front/img/trac--235-43@1x.png");
        }
        else if($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--13-11@1x.png"){
            $(this).find(".img-philo").attr("src","/assets/front/img/trac--13-19@1x.png");
        }
        else if($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--15-17@1x.png"){
            $(this).find(".img-philo").attr("src","/assets/front/img/trac--15-20@1x.png");
        }

    },function(){
        $(this).find(".titre-bande-header").css('color', 'var(--dove-gray)');
        if($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--9-14@1x.png"){
            $(this).find(".img-philo").attr("src","/assets/front/img/trac--9-13@1x.png");
        }
        else if($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--11-16@1x.png"){
            $(this).find(".img-philo").attr("src","/assets/front/img/trac--11-13@1x.png");
        }
        else if($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--236-42@1x.png"){
            $(this).find(".img-philo").attr("src","/assets/front/img/trac--236-38@1x.png");
        }
        else if($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--235-43@1x.png"){
            $(this).find(".img-philo").attr("src","/assets/front/img/trac--235-44@1x.png");
        }
        else if($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--13-19@1x.png"){
            $(this).find(".img-philo").attr("src","/assets/front/img/trac--13-11@1x.png");
        }
        else if($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--15-20@1x.png"){
            $(this).find(".img-philo").attr("src","/assets/front/img/trac--15-17@1x.png");
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



