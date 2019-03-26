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
                $('.sx-project-form-wrapper .form-group.required label').each(function () {
                    $(this).append($('<span class="sx-from-required">').text(' *'));
                });
            });

            $('.sx-project-form-wrapper .form-group.required label').each(function () {
                $(this).append($('<span class="sx-from-required">').text(' *'));
            });
        }
    });

    new sx.classes.ProjectForm();


    /**
     * new sx.classes.Location('id');
     */
    sx.classes.Location = sx.classes.Component.extend({

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
        }
    });



    $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

})(sx, sx.$, sx._);


