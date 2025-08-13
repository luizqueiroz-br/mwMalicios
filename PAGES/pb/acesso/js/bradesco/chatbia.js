jQuery(document).ready(function( $ ){

    var dirPart, host, pathArray;

    // Transformar URL em Array
    function splitPath(path) {
        path.replace(/^(.*\/)?([^/]*)$/, function(_, dir, file) {
            dirPart = dir;
        });

        dirPart = dirPart.split('/');
        dirPart = dirPart.filter(item => item);

        return dirPart;
    }

    pathArray = splitPath(window.location.pathname);
    host = window.location.host;

    if ( $.inArray("classic", pathArray) >= 0 || $.inArray("exclusive", pathArray) >= 0 || $.inArray("prime", pathArray) >= 0  || $.inArray("private", pathArray) >= 0 || $.inArray("inovacao", pathArray) >= 0 || $.inArray("aliadosbia", pathArray) >= 0 || $.inArray("canaisdigitais", pathArray) >= 0 ) {

        // Carregar CSS do botão de Chat com a Bia
        $('head').append('<link rel="stylesheet" type="text/css" href="//'+host+'/assets/common/chatbia/css/chatbia-dist.css">');

        if (($.inArray("consorcios", pathArray) >= 0) ) {
            $("body").addClass("chatbia-desktop");
        }

        // Carregar script JS-Cookie (se ainda não carregou na página)
        if (typeof Cookies !== "function") {
            $.getScript("//"+host+"/assets/common/cookies/vendor/js-cookie.min.js", function(){});
        }

        if($("#cookies").is(":visible")) {
            $(".cookies__cta a.c-btn").on("click", function() {
                $("#chatbia").addClass("show");
            });
        } else {
            $("#chatbia").addClass("show");
        }    

        $("#chatbia").on("transitionend webkitTransitionEnd oTransitionEnd", function() {
            if ($(this).hasClass("show") && !Cookies.get('chatbia-balloon')) {
                $("#chatbia-balloon").addClass("show");
                $(this).off();
            }
        });

        $("#chatbia-fechar").on("click", function(e) {
            e.preventDefault();
            $("#chatbia-balloon").removeClass("show");
            Cookies.set('chatbia-balloon', 'false');
        })

        $(".balloon").on("click", function(e) {
            e.preventDefault();
            $("#chatbia-balloon").removeClass("show");
            Cookies.set('chatbia-balloon', 'false');
        })

        $("#chatbia-button a").on("click", function(e) {
            e.preventDefault();
            var origin, platform, url;
            var url = $(this).attr("href");
            $("#chatbia-fechar").click();

            if ( ($.inArray("consorcios", pathArray) >= 0 && $.inArray("classic", pathArray) >= 0) && window.location.hostname != "localhost") {
                dataLayer.push({ event: "interaction", EventCategory: "consorcio-home", EventAction: "consorcio-clique-bia", EventLabel: "botao-fale-com-a-bia" });
                console.log(dataLayer);

                origin = "origin=consorcio";
            } else if ( ($.inArray("classic", pathArray) >= 0 || $.inArray("exclusive", pathArray) >= 0 || $.inArray("prime", pathArray) >= 0  || $.inArray("private", pathArray) >= 0) && window.location.hostname != "localhost") {
                var nomeDoSite = pathArray[1];   
                var areaDoSite = pathArray[pathArray.length-1];

                if (areaDoSite == undefined || areaDoSite == nomeDoSite) {
                    areaDoSite = 'home'
                }

                dataLayer.push({ 'event': "ga.custom_event", 'custom.category': nomeDoSite, 'custom.action': areaDoSite + " – Clique BIA", 'custom.label': "Botão Fale com a BIA" });

                origin = "";
            } else if (window.location.hostname != "localhost") {
                var nomeDoSite = pathArray[0];
                var areaDoSite = pathArray[pathArray.length-1];

                if (areaDoSite == undefined || areaDoSite == nomeDoSite) {
                    areaDoSite = 'home'
                }
                dataLayer.push({ 'event': "ga.custom_event", 'custom.category': nomeDoSite, 'custom.action': areaDoSite + " – Clique BIA", 'custom.label': "Botão Fale com a BIA" });

                origin = "";
            }

            if ($("body").hasClass("mobile")) {
                platform = "&platform=MOBILE";
            } else {
                platform = "&platform=WEB";
            }

            if (!$("#chatbia-iframe").length) {
                if (window.innerWidth < 768) {
                    var urlChat =  url + "&" + origin + platform 
                    $('#chatbia-button').on('click', function(){
                        var newTab = document.createElement('a');
                        newTab.href = urlChat;
                        newTab.target = '_blank';
                        newTab.click()
                    })
                }else {
                    $("#chatbia").append("<div id='chatbia-iframe'><iframe src='" + url + "&" + origin + platform + "' /></div>");
                    $("#chatbia-iframe iframe").on('load', function() {
                        $("#chatbia-iframe").addClass("show");
                        if ( ($.inArray("consorcios", pathArray) >= 0 && $.inArray("classic", pathArray) >= 0) && window.location.hostname != "localhost") {
                            dataLayer.push({ event: "PageviewVirtual", virtualPageUrl: "consorcio/bia", virtualPageTitle: "Bia é a IA do bradesco" });
                        }    
                    });
                }
            } else {
                $("#chatbia-iframe").toggleClass("show");
            }
        })
    } else {
        $("#chatbia").remove();
    }

    setTimeout(function() {
        if (window.parent != null && window.parent != undefined) {
            window.addEventListener('message', function(e) {

                if (e.data == "FechaModal") {
                    console.info(e.data);
                    console.log('MODAL_CHAT_BIA_FECHADO');
                    $("#chatbia-iframe").removeClass("show");
                    $('#chatbia-iframe').remove()

                    if ( ($.inArray("consorcios", pathArray) >= 0 && $.inArray("classic", pathArray) >= 0) && window.location.hostname != "localhost") {
                        dataLayer.push({ event: "interaction", EventCategory:"consorcio", EventAction: "consorcio-clique-bia", EventLabel: "Fechar modal" });
                        console.log(dataLayer);
                    } else if ( ($.inArray("classic", pathArray) >= 0 || $.inArray("exclusive", pathArray) >= 0 || $.inArray("prime", pathArray) >= 0  || $.inArray("private", pathArray) >= 0) && window.location.hostname != "localhost") {
                        var nomeDoSite = pathArray[1];   
                        var areaDoSite = pathArray[pathArray.length-1];

                        if (areaDoSite == undefined || areaDoSite == nomeDoSite) {
                            areaDoSite = 'home'
                        }
                        dataLayer.push({ 'event': "ga.custom_event", 'custom.category': nomeDoSite,'custom.action': areaDoSite + " – Clique BIA", 'custom.label': "Fechar modal" });
        
                    } else if (window.location.hostname != "localhost") {
                        var nomeDoSite = pathArray[0];
                        var areaDoSite = pathArray[pathArray.length-1];

                        if (areaDoSite == undefined || areaDoSite == nomeDoSite) {
                            areaDoSite = 'home'
                        }
                        dataLayer.push({ 'event': "ga.custom_event", 'custom.category': nomeDoSite,'custom.action': areaDoSite + " – Clique BIA", 'custom.label': "Fechar modal" });
                    }
                } else  if (e.data == "MsgEnviada") {
                    console.info(e.data);
                    dataLayer.push({ event: "interaction", EventCategory: "consorcio-home", EventAction: "consorcio-mensagem-bia", EventLabel: "duvida-enviada" });
                    console.log(dataLayer);

                    if ( ($.inArray("classic", pathArray) >= 0 || $.inArray("exclusive", pathArray) >= 0 || $.inArray("prime", pathArray) >= 0  || $.inArray("private", pathArray) >= 0) && window.location.hostname != "localhost") {
                        var nomeDoSite = pathArray[1];   
                        var areaDoSite = pathArray[pathArray.length-1];

                        if (areaDoSite == undefined || areaDoSite == nomeDoSite) {
                            areaDoSite = 'home'
                        }
                        dataLayer.push({ 'event': "ga.custom_event", 'custom.category': nomeDoSite, 'custom.action': areaDoSite + " – Clique BIA", 'custom.label': "Enviar" });
                    } else if (window.location.hostname != "localhost") {
                        var nomeDoSite = pathArray[0];
                        var areaDoSite = pathArray[pathArray.length-1];

                        if (areaDoSite == undefined || areaDoSite == nomeDoSite) {
                            areaDoSite = 'home'
                        }
                        dataLayer.push({ 'event': "ga.custom_event", 'custom.category': nomeDoSite, 'custom.action': areaDoSite + " – Clique BIA", 'custom.label': "Enviar" });
                    }
                }

            }, false);
        }
    }, 500);

});
