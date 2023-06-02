(function (sx, $, _) {
    /**
     *
     */
    sx.classes.Upa = sx.classes.Component.extend({

        _onDomReady: function () {
            //Закрыть мобильное меню
            $(".sx-user-mobile-menu-hide").on("click", function () {
                var jUserMenu = $(".sx-user-mobile-menu");
                jUserMenu.animate({left: '-100%'});
                jUserMenu.removeClass("sx-opened");
                jUserMenu.trigger("hide");
                $("body").removeClass("sx-overflow-hidden");
                return false;
            });

            //Открыть мобильное меню
            $(".sx-user-mobile-menu-trigger").on("click", function () {
                var jUserMenu = $(".sx-user-mobile-menu");

                var footerHeight = $(".shop-menu-footer").height();
                var windowHeight = $(window).height();
                jUserMenu.css("height", (windowHeight - footerHeight - 1) + "px" );
                if (jUserMenu.length) {
                    if (jUserMenu.hasClass("sx-opened")) {
                        jUserMenu.animate({left: '-100%'});
                        jUserMenu.removeClass("sx-opened");
                        jUserMenu.trigger("hide");
                        $("body").removeClass("sx-overflow-hidden");
                    } else {
                        jUserMenu.animate({left: '0'});
                        jUserMenu.addClass("sx-opened");
                        jUserMenu.trigger("show");
                        $("body").addClass("sx-overflow-hidden");
                    }

                    return false;
                } else {
                    return true;
                }
            });
            
            if (this.get("is_default_action")) {
                setTimeout(function() {
                    $(".sx-user-mobile-menu-trigger").trigger('click');
                }, 500);
            }
        },
    });

})(sx, sx.$, sx._);






