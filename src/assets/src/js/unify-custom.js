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
        construct: function(id, opts)
        {
            opts = opts || {};
            id = id || false;

            this.applyParentMethod(sx.classes.Component, 'construct', [opts]);

            if (id) {
                this.href(id);
            }
        },

        href: function(id)
        {
            var duration = Number(this.get('duration', 500));
            var easing   = String(this.get('easing', 'swing'));

            var Jtarget   = $(id);
            var newHash   = "#" + Jtarget.attr('id');

            if (!Jtarget.offset())
            {
                return true;
            }

            var top = Jtarget.offset().top;
            var oldLocation = window.location.href.replace(window.location.hash, '');
            var newLocation = oldLocation + newHash;

            if (oldLocation + newHash == newLocation)
            {
                $('html:not(:animated),body:not(:animated)')
                    .animate({ scrollTop: top }, duration, easing, function()
                    {
                      window.location.href = newLocation;
                    });

                return true;
            }
        },

        _onDomReady: function () {

            var self = this;

            $('body').on("click", ".sx-scroll-to", function() {
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
        }
    });

    new sx.classes.Location();



    $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

    $.HSCore.components.HSPopup.init('.js-fancybox-media', {
        helpers: {
            media: {},
            overlay: {
                css: {
                    'background': 'rgba(0, 0, 0, .8)'
                }
            }
        }
    });

    if ($("body").hasClass("sx-header-sticky-margin")) {
        if ($("#js-header").hasClass("u-header--sticky-top")) {
            $("body").css("margin-top", $("#js-header").height());
        }
    }

})(sx, sx.$, sx._);


