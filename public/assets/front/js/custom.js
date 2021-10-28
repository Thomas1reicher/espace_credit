

jQuery(function ($) {
  

    $(".delete-img").click(function (e) {
        alert("test");

    });
    $(".add_item_link").click(function (e) {
        const collectionHolder = document.querySelector('.' + e.currentTarget.dataset.collectionHolderClass);
        const item = document.createElement('li');

        item.innerHTML = collectionHolder
            .dataset
            .prototype
            .replace(
            /__name__/g,
            collectionHolder.dataset.index
            )
            .replace(
                /__qnb__/g,
                parseInt(collectionHolder.dataset.index)+1
                );

        collectionHolder.appendChild(item);

        collectionHolder.dataset.index++;
    });

    burger = $('.open-main-nav');
    nav    = document.getElementById('main-nav'),
    slowmo = document.getElementById('slowmo');
    function numberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    }
    $( document ).ready(function() {
        recherche($(".select-credit option:selected").attr("data-credit"),$(".duree-form").val(),parseInt($(".montant-form").val()));
        recalculate();
        duree = parseInt($(".duree-form").val());
        $(".duree-info").text(duree + " mois");
        montant = parseInt($(".montant-form").val());
        if(montant > 999){
            montantstr=$(this).val();            
                $(".montant-info").text(numberWithCommas(montant) + ".00€");
            }
           else{
            $(".montant-info").text(montant + ".00€");
        }
        if($(".modal")){
            setTimeout(function(){ 
                $(".modal").hide();
             }, 11000);
        }
    });
    function recherche(pret,period,montant){

        console.log(pret,period,montant);
        if(pret !== undefined && period !== undefined && montant !== undefined){
       
        $.post('/recherche',
            {pret : pret,
            period : period,
            montant : montant
            }
        ).done( function(response) {
            if(!isNaN(response)){
            $(".taux-info").text(response + "%*");
            $(".taux-info").attr("data",response);
            $(".error-div").text("");
            }else{
              
                $(".error-div").text("Les paramètres de simulation ne sont pas bon");
                $.post('/rechercheduree',
                {pret : pret,
                montant : montant
                }
            ).done( function(response) {
                if(!isNaN(response)){
                    $(".duree-form").val(response);
                    $(".duree-info").text(response + " mois");
                    $(".error-div").text("");
                    recherche(pret,response,montant)
                    recalculate();
                    }else{
                        $(".error-div").text("Les paramètres de simulation ne sont pas bon");
                    }
                      
               
            });
            }
        }).fail(function(jxh,textmsg,errorThrown){

        });
    }
    recalculate();
    }
    $(".montant-form").change(function () {
        recherche($(".select-credit option:selected").attr("data-credit"),$(".duree-form").val(),parseInt($(".montant-form").val()));
        recalculate();
        montant = parseInt($(this).val());
        if(montant > 999){
            montantstr=$(this).val();            
                $(".montant-info").text(numberWithCommas(montant) + ".00€");
            }
           else{
            $(".montant-info").text(montant + ".00€");
        }
        
    });
    $(".duree-form").change(function () {
        recherche($(".select-credit option:selected").attr("data-credit"),$(".duree-form").val(),parseInt($(".montant-form").val()));
        recalculate();
        duree = parseInt($(this).val());
        $(".duree-info").text(duree + " mois");
        
    });
    $(".montant-form").click(function () {
        $(this).val("");
    });
    $(".duree-form").click(function () {
       
    });
    $(".select-credit").change(function () {
 
        recalculate();
        recherche($(".select-credit option:selected").attr("data-credit"),$(".duree-form").val(),parseInt($(".montant-form").val()));

    });
    function recalculate() {
        montant = parseInt($(".montant-form").val());
        taeg = parseFloat($(".taux-info").attr("data"));
        taeg = taeg / 100;
        duree = parseInt($(".duree-form").val());
        v1 = (Math.pow((1 + taeg), (1 / 12)) - 1);
        v2 = (1 - Math.pow((1 / (1 + taeg)), (duree / 12)));
        constante3 = (montant * v1 / v2);
        constante3_b = Math.floor(constante3);
        constante3_l = (constante3 * 100) - (constante3_b * 100);
        elmt = $(".litle-num-orange");
        $(".big-num-orange").text(constante3_b);
        $(".big-num-orange").append(elmt);
        $(".big-num-orange").append("€");
        $(".litle-num-orange").text(',' + Math.floor(constante3_l));
        interet = constante3 * duree;
        $(".interet-info").text(numberWithCommas(interet.toFixed(2)) + "€");

    };
    $(".div-bande-header").hover(function () {
        $(this).find(".unfixed-txt").css('color', 'orange');
        if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--9-13@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--9-14@1x.png");
        } else if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--11-13@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--11-16@1x.png");
        } else if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--236-38@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--236-42@1x.png");
        } else if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--235-44@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--235-43@1x.png");
        } else if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--13-11@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--13-19@1x.png");
        } else if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--15-17@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--15-20@1x.png");
        } else if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--343-12@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--343-20@1x.png");
        } else if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--20-11@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--20-24@1x.png");
        }

    }, function () {
        $(this).find(".unfixed-txt").css('color', 'var(--dove-gray)');
        if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--9-14@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--9-13@1x.png");
        } else if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--11-16@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--11-13@1x.png");
        } else if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--236-42@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--236-38@1x.png");
        } else if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--235-43@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--235-44@1x.png");
        } else if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--13-19@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--13-11@1x.png");
        } else if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--15-20@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--15-17@1x.png");
        } else if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--343-20@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--343-12@1x.png");
        } else if ($(this).find(".unfixed").attr("src") == "/assets/front/img/trac--20-24@1x.png") {
            $(this).find(".unfixed").attr("src", "/assets/front/img/trac--20-11@1x.png");
        }
    })

    $("#demande_pret_Envoyer").hover(function () {
        $(this).css('background-color', '#fd5912');
    }, function () {
        $(this).css('background-color', 'orange');
    });

    $("#demande_Envoyer").hover(function () {
        $(this).css('background-color', '#fd5912');
    }, function () {
        $(this).css('background-color', 'orange');
    });

    $(".icones-philo li").hover(function () {
        $(this).find(".titre-bande-header").css('color', 'orange');
        if ($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--9-13@1x.png") {
            $(this).find(".img-philo").attr("src", "/assets/front/img/trac--9-14@1x.png");
        } else if ($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--11-13@1x.png") {
            $(this).find(".img-philo").attr("src", "/assets/front/img/trac--11-16@1x.png");
        } else if ($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--236-38@1x.png") {
            $(this).find(".img-philo").attr("src", "/assets/front/img/trac--236-42@1x.png");
        } else if ($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--235-44@1x.png") {
            $(this).find(".img-philo").attr("src", "/assets/front/img/trac--235-43@1x.png");
        } else if ($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--13-11@1x.png") {
            $(this).find(".img-philo").attr("src", "/assets/front/img/trac--13-19@1x.png");
        } else if ($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--15-17@1x.png") {
            $(this).find(".img-philo").attr("src", "/assets/front/img/trac--15-20@1x.png");
        }

    }, function () {
        $(this).find(".titre-bande-header").css('color', 'var(--dove-gray)');
        if ($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--9-14@1x.png") {
            $(this).find(".img-philo").attr("src", "/assets/front/img/trac--9-13@1x.png");
        } else if ($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--11-16@1x.png") {
            $(this).find(".img-philo").attr("src", "/assets/front/img/trac--11-13@1x.png");
        } else if ($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--236-42@1x.png") {
            $(this).find(".img-philo").attr("src", "/assets/front/img/trac--236-38@1x.png");
        } else if ($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--235-43@1x.png") {
            $(this).find(".img-philo").attr("src", "/assets/front/img/trac--235-44@1x.png");
        } else if ($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--13-19@1x.png") {
            $(this).find(".img-philo").attr("src", "/assets/front/img/trac--13-11@1x.png");
        } else if ($(this).find(".img-philo").attr("src") == "/assets/front/img/trac--15-20@1x.png") {
            $(this).find(".img-philo").attr("src", "/assets/front/img/trac--15-17@1x.png");
        }
    })

    $(".unfixed-home").hover(function () {
        $(this).attr("src", "/assets/front/img/trac--2-12@1x.png");
    }, function () {
        $(this).attr("src", "/assets/front/img/trac-2.png");
    });

    $("[role=presentation]").hover(function () {
        $(this).find(".tab").css('color', 'orange');
    }, function () {
        $(this).find(".tab").css('color', 'var(--dove-gray)');
    });

    $(".slick-arrow").hover(function () {
        $(this).css('background-image', 'url(assets/front/img/trac--226-1@1x.png)');
    }, function () {
        $(this).css('background-image', 'url(assets/front/img/trac--227-1@1x.png)');
    });

    $(".open-main-nav").click(function () {
        burger = $('.open-main-nav');
        nav = document.getElementById('main-nav'),
        slowmo = document.getElementById('slowmo');
        if($(this).hasClass('is-open')){
            $('.body-content').show();
        }else{
            setTimeout(function(){ $('.body-content').hide() }, 800);
        }
        this.classList.toggle('is-open');
        nav.classList.toggle('is-open');
    });
    $(".div-form-pret .link-pret").click(function () {
        $(".select-credit option:selected").text();
        document.cookie = "current="+$(".select-credit option:selected").text();
    });
   function burger() {
    burger = $('.open-main-nav');
    nav = document.getElementById('main-nav'),
    slowmo = document.getElementById('slowmo');
    this.classList.toggle('is-open');
    nav.classList.toggle('is-open');
    $('.body-content').hide();
    }

    /* Onload demo - dirty timeout */
    let clickEvent = new Event('click');


    $('.slide').on('afterChange', function(event, slick, currentSlide){

      }); 

    $( "#demande_type_credit_demande").change(function() {
        type = $("#demande_type_credit_demande option:selected").html();
        $('.credit-form').each(function(index, value) {
          $(this).hide();
        });
        if(type == "PRÊT PERSO"){
            $('.credit-perso-form').show();
        }
        else if(type == "PRÊT AUTO"){
            $('.credit-auto-form').show();
        }
        else if(type == "PRÊT MOTO"){
            $('.credit-moto-form').show();
        }
        else if(type == "PRÊT MOBILITÉ"){
            $('.credit-mobilite-form').show();
        }
        else if(type == "PRÊT TRAVAUX"){
            $('.credit-travaux-form').show();
        }
        if(type == "PRÊT AUTO" || type == "PRÊT MOTO"){
            $('.credit-vehicule-form').show();
        }
    });

    var distance = $('.gray-div').offset().top,
    $window = $(window);

    $window.scroll(function() {
        if ( $window.scrollTop() >= distance ) {
            $('.gray-div').css('position', 'fixed');
        }
        else{
            $('.gray-div').css('position', 'unset');
        }
    });
});


