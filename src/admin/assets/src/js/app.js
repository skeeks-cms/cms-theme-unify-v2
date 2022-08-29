/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

(function (sx, $, _) {


    sx.classes.App = sx.classes.Component.extend({

        _init: function () {

        },

        _onDomReady: function () {
            // initialization of custom select
            //$('.js-select').selectpicker();

            $('.sx-main-col').fadeIn();


            $(document).on('pjax:complete', function (e) {
                $('[data-toggle="tooltip"]').tooltip();
            });

            $(document).on('pjax:error', function (e, data) {
                console.error('Не удалось перезагрузить контейнер: ' + e.target.id + ' — ' + data.statusText);
                e.preventDefault();
            });

            if ($.pjax) {
                $.pjax.defaults.timeout = 60000;
            }


            // initialization of sidebar navigation component
            //$.HSCore.components.HSSideNav.init('.js-side-nav');
            // initialization of HSDropdown component
            //$.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {dropdownHideOnScroll: false});
            // initialization of custom scrollbar
            //$.HSCore.components.HSScrollBar.init($('.js-custom-scroll'));
        },


        _initNotify: function () {
            //Глобальные настройки JGrowl
            $.jGrowl.defaults.closer = false;
            $.jGrowl.defaults.closeTemplate = '×';
            $.jGrowl.defaults.position = 'top-right';
            $.jGrowl.defaults.life = 5000;
        },

    });

    sx.App = new sx.classes.App();


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

})(sx, sx.$, sx._);