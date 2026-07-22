(function (sx, $, _) {
    /**
     *
     */
    sx.classes.Upa = sx.classes.Component.extend({

        _onDomReady: function () {
            var jUserMenu = $(".sx-user-mobile-menu");
            var jMenuTriggers = $(".sx-user-mobile-menu-trigger");
            var jMenuBackdrop = $(".sx-user-mobile-menu-backdrop");
            var jLastTrigger = null;
            var mobileMenuQuery = window.matchMedia("(max-width: 991.98px)");

            var closeMenu = function (restoreFocus) {
                if (!jUserMenu.hasClass("sx-opened")) {
                    return;
                }

                jUserMenu.removeClass("sx-opened").attr("aria-hidden", "true");
                jMenuTriggers.attr("aria-expanded", "false");
                jMenuBackdrop.attr("aria-hidden", "true");
                jUserMenu.trigger("hide");
                $("body").removeClass("sx-overflow-hidden sx-upa-menu-open");

                if (restoreFocus !== false && jLastTrigger && jLastTrigger.length) {
                    jLastTrigger.trigger("focus");
                }
            };

            var openMenu = function (jTrigger) {
                if (!jUserMenu.length || !mobileMenuQuery.matches) {
                    return false;
                }

                jLastTrigger = jTrigger;
                jUserMenu.addClass("sx-opened").attr("aria-hidden", "false");
                jMenuTriggers.attr("aria-expanded", "true");
                jMenuBackdrop.attr("aria-hidden", "false");
                jUserMenu.trigger("show");
                $("body").addClass("sx-overflow-hidden sx-upa-menu-open");
                jUserMenu.find(".sx-user-mobile-menu-hide").trigger("focus");
                return true;
            };

            $(".sx-user-mobile-menu-hide").on("click", function () {
                closeMenu(true);
            });

            jMenuBackdrop.on("click", function () {
                closeMenu(true);
            });

            jMenuTriggers.on("click", function (event) {
                if (!mobileMenuQuery.matches) {
                    return true;
                }

                event.preventDefault();

                if (jUserMenu.hasClass("sx-opened")) {
                    closeMenu(true);
                } else {
                    openMenu($(this));
                }

                return false;
            });

            $(document).on("keydown.sxUpaMenu", function (event) {
                if (!jUserMenu.hasClass("sx-opened")) {
                    return;
                }

                if (event.key === "Escape") {
                    event.preventDefault();
                    closeMenu(true);
                    return;
                }

                if (event.key !== "Tab") {
                    return;
                }

                var jFocusable = jUserMenu
                    .find('a:visible, button:visible, input:visible, select:visible, textarea:visible, [tabindex]:visible')
                    .filter('[tabindex!="-1"]');

                if (!jFocusable.length) {
                    return;
                }

                var firstFocusable = jFocusable.get(0);
                var lastFocusable = jFocusable.get(jFocusable.length - 1);

                if (event.shiftKey && document.activeElement === firstFocusable) {
                    event.preventDefault();
                    $(lastFocusable).trigger("focus");
                } else if (!event.shiftKey && document.activeElement === lastFocusable) {
                    event.preventDefault();
                    $(firstFocusable).trigger("focus");
                }
            });

            $(window).on("resize.sxUpaMenu", function () {
                if (!mobileMenuQuery.matches) {
                    closeMenu(false);
                    jUserMenu.removeAttr("aria-hidden");
                } else if (!jUserMenu.hasClass("sx-opened")) {
                    jUserMenu.attr("aria-hidden", "true");
                }
            }).trigger("resize.sxUpaMenu");
            
        },
    });

})(sx, sx.$, sx._);




