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


            $(document).on('pjax:complete', function(e)
            {
                $('[data-toggle="tooltip"]').tooltip();
            });

            $(document).on('pjax:error', function(e, data)
            {
                console.error('Не удалось перезагрузить контейнер: ' + e.target.id + ' — ' + data.statusText);
                e.preventDefault();
            });

            if ($.pjax)
            {
                $.pjax.defaults.timeout = 60000;
            }

            // initialization of hamburger
            $.HSCore.helpers.HSHamburgers.init('.hamburger');

            // initialization of charts
            $.HSCore.components.HSAreaChart.init('.js-area-chart');
            $.HSCore.components.HSDonutChart.init('.js-donut-chart');
            $.HSCore.components.HSBarChart.init('.js-bar-chart');
            $.HSCore.components.HSPieChart.init('.js-pie-chart');

            // initialization of sidebar navigation component
            $.HSCore.components.HSSideNav.init('.js-side-nav', {
                afterOpen: function () {
                    setTimeout(function () {
                        $.HSCore.components.HSAreaChart.init('.js-area-chart');
                        $.HSCore.components.HSDonutChart.init('.js-donut-chart');
                        $.HSCore.components.HSBarChart.init('.js-bar-chart');
                        $.HSCore.components.HSPieChart.init('.js-pie-chart');
                    }, 400);
                },
                afterClose: function () {
                    setTimeout(function () {
                        $.HSCore.components.HSAreaChart.init('.js-area-chart');
                        $.HSCore.components.HSDonutChart.init('.js-donut-chart');
                        $.HSCore.components.HSBarChart.init('.js-bar-chart');
                        $.HSCore.components.HSPieChart.init('.js-pie-chart');
                    }, 400);
                }
            });

            // initialization of range datepicker
            $.HSCore.components.HSRangeDatepicker.init('#rangeDatepicker, #rangeDatepicker2, #rangeDatepicker3');

            // initialization of datepicker
            $.HSCore.components.HSDatepicker.init('#datepicker', {
                dayNamesMin: [
                    'SU',
                    'MO',
                    'TU',
                    'WE',
                    'TH',
                    'FR',
                    'SA'
                ]
            });

            // initialization of HSDropdown component
            $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {dropdownHideOnScroll: false});

            // initialization of custom scrollbar
            $.HSCore.components.HSScrollBar.init($('.js-custom-scroll'));

            // initialization of popups
            $.HSCore.components.HSPopup.init('.js-fancybox', {
                btnTpl: {
                    smallBtn: '<button data-fancybox-close class="btn g-pos-abs g-top-25 g-right-30 g-line-height-1 g-bg-transparent g-font-size-16 g-color-gray-light-v3 g-brd-none p-0" title=""><i class="hs-admin-close"></i></button>'
                }
            });
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
})(sx, sx.$, sx._);