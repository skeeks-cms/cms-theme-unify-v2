<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\admin\assets;

use skeeks\assets\unify\base\UnifyAppearAsset;
use skeeks\assets\unify\base\UnifyAsset;
use skeeks\assets\unify\base\UnifyFancyboxAsset;
use skeeks\assets\unify\base\UnifyHsPopupAsset;
use skeeks\assets\unify\base\UnifyHsScrollbarAsset;
use skeeks\cms\themes\unify\assets\FontAwesomeAsset;
use skeeks\sx\assets\Custom;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\YiiAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyAdminAsset extends UnifyAsset
{
    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik&display=swap',
        //'https://use.fontawesome.com/releases/v5.5.0/css/all.css',


        'assets/vendor/icon-awesome/css/font-awesome.min.css',
        'assets/vendor/icon-line/css/simple-line-icons.css',
        'assets/vendor/icon-etlinefont/style.css',
        'assets/vendor/icon-line-pro/style.css',
        'assets/vendor/icon-hs/style.css',

        'admin-template/assets/vendor/hs-admin-icons/hs-admin-icons.css',

        'assets/vendor/animate.css',
        //'assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css',

        'admin-template/assets/vendor/flatpickr/dist/css/flatpickr.min.css',
        'admin-template/assets/vendor/bootstrap-select/css/bootstrap-select.min.css',

        'admin-template/assets/vendor/chartist-js/chartist.min.css',
        'admin-template/assets/vendor/chartist-js-tooltip/chartist-plugin-tooltip.css',

        'assets/vendor/hamburgers/hamburgers.min.css',
        'admin-template/assets/css/unify-admin.css',
        'assets/css/custom.css',
    ];
    public $js = [
        //'admin-template/assets/vendor/jquery/jquery.min.js',
        //'admin-template/assets/vendor/jquery-migrate/jquery-migrate.min.js',

        'assets/vendor/cookiejs/jquery.cookie.js',


        'assets/vendor/jquery-ui/ui/widget.js',
        'assets/vendor/jquery-ui/ui/version.js',
        'assets/vendor/jquery-ui/ui/keycode.js',
        'assets/vendor/jquery-ui/ui/position.js',
        'assets/vendor/jquery-ui/ui/unique-id.js',
        'assets/vendor/jquery-ui/ui/safe-active-element.js',

        'assets/vendor/jquery-ui/ui/widgets/menu.js',
        'assets/vendor/jquery-ui/ui/widgets/mouse.js',

        'assets/vendor/jquery-ui/ui/widgets/datepicker.js',

        //'assets/vendor/appear.js',
        'admin-template/assets/vendor/bootstrap-select/js/bootstrap-select.min.js',
        'admin-template/assets/vendor/flatpickr/dist/js/flatpickr.min.js',
        //'assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js',
        'admin-template/assets/vendor/chartist-js/chartist.min.js',
        'admin-template/assets/vendor/chartist-js-tooltip/chartist-plugin-tooltip.js',

        //'assets/js/hs.core.js',
        'admin-template/assets/js/components/hs.side-nav.js',
        'assets/js/helpers/hs.hamburgers.js',
        'admin-template/assets/js/components/hs.range-datepicker.js',
        'assets/js/components/hs.datepicker.js',
        'assets/js/components/hs.dropdown.js',
        //'assets/js/components/hs.scrollbar.js',
        'admin-template/assets/js/components/hs.area-chart.js',
        'admin-template/assets/js/components/hs.donut-chart.js',
        'admin-template/assets/js/components/hs.bar-chart.js',
        'admin-template/assets/js/components/hs.pie-chart.js',
        'assets/js/helpers/hs.focus-state.js',
        //'admin-template/assets/js/components/hs.popup.js',

        'assets/js/custom.js',
    ];
    public $depends = [
        YiiAsset::class,
        Custom::class,
        BootstrapAsset::class,
        BootstrapPluginAsset::class,
        //UnifyFancyboxAsset::class,
        FontAwesomeAsset::class,
        UnifyHsPopupAsset::class,
        UnifyAppearAsset::class,
        UnifyHsScrollbarAsset::class,
        'skeeks\cms\assets\FancyboxAssets',
    ];
}