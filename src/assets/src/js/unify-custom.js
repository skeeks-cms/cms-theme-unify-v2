/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

(function (sx, $, _) {
    /**
     * Добавление звездочек в формы обрамленные .sx-project-form-wrapper
     */
    sx.classes.ProjectForm = sx.classes.Component.extend({

        _onDomReady: function () {
            $(document).on('pjax:complete', function (e) {
                $('.form-group.required label').each(function () {
                    var jLabel = $(this);
                    _.delay(function () {
                        jLabel.find(".sx-from-required").remove();
                        jLabel.append($('<span class="sx-from-required" title="Это поле обязательно для заполнения">').text(' *'));
                    }, 200);
                });
            });

            $('.form-group.required label').each(function () {
                var jLabel = $(this);
                _.delay(function () {
                    jLabel.find(".sx-from-required").remove();
                    jLabel.append($('<span class="sx-from-required" title="Это поле обязательно для заполнения">').text(' *'));
                }, 200);
            });
        }
    });

    new sx.classes.ProjectForm();


    /**
     * new sx.classes.Location('id');
     * new sx.classes.Location('#id');
     * <a href="#id" class="sx-scroll-to">go to id</a>
     */
    sx.classes.Location = sx.classes.Component.extend({

        /**
         * Установка необходимых данных
         * @param text
         * @param opts
         */
        construct: function (id, opts) {
            opts = opts || {};
            id = id || false;

            this.applyParentMethod(sx.classes.Component, 'construct', [opts]);

            if (id) {
                this.href(id);
            }

            this._isDomReady = false;
            this._isWindowReady = false;
        },

        href: function (id) {
            var self = this;

            var duration = Number(this.get('duration', 500));
            var easing = String(this.get('easing', 'swing'));

            var Jtarget = $(id);
            var newHash = "#" + Jtarget.attr('id');

            if (!Jtarget.offset()) {
                return true;
            }

            var top = Jtarget.offset().top;
            var oldLocation = window.location.href.replace(window.location.hash, '');
            var newLocation = oldLocation + newHash;

            if (oldLocation + newHash == newLocation) {
                $('html:not(:animated),body:not(:animated)')
                    .animate({scrollTop: top}, duration, easing, function () {
                        if (Boolean(self.get('isLocationHref')) === true) {
                            window.location.href = newLocation;
                        }

                    });

                return true;
            }
        },

        _preloaderFade: function() {

            setTimeout(function() {
                $('.sx-preloader').fadeOut('slow', function () {
                    /*$(this).remove();*/
                });
            }, 300);

        },

        _onWindowReady: function () {

            if (this._isDomReady) {
                this._preloaderFade();
            }

            this._isWindowReady = true;

        },

        _onDomReady: function () {

            var self = this;

            $('body').on("click", ".sx-scroll-to", function () {
                if ($(this).attr('href')) {
                    if ($(this).attr('href') != "#") {
                        return self.href($(this).attr('href'));
                    }
                } else {
                    if ($(this).data('href')) {
                        return self.href($(this).data('href'));
                    }
                }

                return false;
            });


            $(".sx-content table").addClass("table table-striped table-bordered table-hover u-table--v1 table-condensed sx-project-table");
            $(".sx-content table").each(function() {
                var jWrapper = $("<div>", {
                    'class': 'table-responsive'
                });
                $(this).after(jWrapper);
                $(this).appendTo(jWrapper);
            });

            this._isDomReady = true;
            if (this._isWindowReady) {
                this._preloaderFade();
            }

        }
    });

    new sx.classes.Location();


    /*$.HSCore.components.HSOnScrollAnimation.init('[data-animation]');*/

    if ($("body").hasClass("sx-header-sticky-margin")) {
        /*if ($("#js-header").hasClass("u-header--sticky-top")) {
            $("body").css("margin-top", $("#js-header").height());
        }*/
    }
    if ($("#shop-menu-footer").length) {
        if ($("#shop-menu-footer").is(":visible")) {
            $("body").css("margin-bottom", $("#shop-menu-footer").height());
        }
    }

    $(window).ready(function () {

        if ($("body").hasClass('sx-header-sticky')) {
            $("#js-header").addClass("u-header--sticky-top");
        }

        if ($("body").hasClass('sx-header-sticky-margin')) {
            $("body").css("margin-top", $("#js-header").height());
        }

            
        _.delay(function () {
            /*if ($("body").hasClass("sx-header-sticky-margin")) {
                if ($("#js-header").hasClass("u-header--sticky-top")) {
                    $("body").css("margin-top", $("#js-header").height());
                }
            }*/
        }, 200);
    });


    

    $("[data-toggle=tooltip]").tooltip();
    $(document).on('pjax:complete', function(event) {
      $("[data-toggle=tooltip]", $(event.target)).tooltip();
    })


})(sx, sx.$, sx._);
