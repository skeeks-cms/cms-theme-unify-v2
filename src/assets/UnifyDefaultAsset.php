<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

use skeeks\assets\unify\base\UnifyAsset;
use skeeks\sx\assets\Custom;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\YiiAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyDefaultAsset extends UnifyAsset
{
    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik',
        'https://use.fontawesome.com/releases/v5.5.0/css/all.css',


        'assets/vendor/icon-awesome/css/font-awesome.min.css',
        'assets/vendor/icon-line/css/simple-line-icons.css',
        'assets/vendor/icon-etlinefont/style.css',
        'assets/vendor/icon-line-pro/style.css',
        'assets/vendor/icon-hs/style.css',
        'assets/vendor/animate.css',
        'assets/vendor/fancybox/jquery.fancybox.min.css',
        'assets/vendor/slick-carousel/slick/slick.css',
        'assets/vendor/typedjs/typed.css',
        'assets/vendor/hs-megamenu/src/hs.megamenu.css',
        'assets/vendor/hamburgers/hamburgers.min.css',


        'assets/css/unify-core.css',
        'assets/css/unify-components.css',
        'assets/css/unify-globals.css',
    ];

    public $js = [
        'assets/vendor/appear.js',
        'assets/vendor/hs-megamenu/src/hs.megamenu.js',

        'assets/vendor/dzsparallaxer/dzsparallaxer.js',
        'assets/vendor/dzsparallaxer/dzsscroller/scroller.js',

        'assets/vendor/dzsparallaxer/advancedscroller/plugin.js',
        'assets/vendor/masonry/dist/masonry.pkgd.min.js',
        'assets/vendor/imagesloaded/imagesloaded.pkgd.min.js',
        'assets/vendor/slick-carousel/slick/slick.js',
        'assets/vendor/hs-bg-video/hs-bg-video.js',
        'assets/vendor/hs-bg-video/vendor/player.min.js',
        'assets/vendor/fancybox/jquery.fancybox.min.js',

        'assets/js/hs.core.js',
        'assets/js/helpers/hs.hamburgers.js',
        'assets/js/helpers/hs.bg-video.js',

        'assets/js/components/hs.header.js',
        'assets/js/components/hs.popup.js',
        'assets/js/components/hs.onscroll-animation.js',
        'assets/js/components/hs.carousel.js',
        'assets/js/components/hs.go-to.js',
    ];

    public $depends = [
        YiiAsset::class,
        Custom::class,
        BootstrapPluginAsset::class,
    ];
}