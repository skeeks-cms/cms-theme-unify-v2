<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

use skeeks\assets\unify\base\UnifyAsset;
use skeeks\assets\unify\base\UnifyHsCarouselAsset;
use skeeks\assets\unify\base\UnifyHsHamburgersAsset;
use skeeks\assets\unify\base\UnifyHsMegamenuAsset;
use skeeks\assets\unify\base\UnifyHsOnscrollAnimationAsset;
use skeeks\assets\unify\base\UnifyHsPopupAsset;
use skeeks\assets\unify\base\UnifyHsStickyBlockAsset;
use skeeks\sx\assets\Custom;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\YiiAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyThemeAsset extends UnifyAsset
{
    public $sourcePath = "@skeeks/cms/themes/unify/assets/src";

    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik',
        'https://use.fontawesome.com/releases/v5.5.0/css/all.css',

        'css/unify-custom.css',
    ];

    public $js = [
        //'assets/js/components/hs.go-to.js',
    ];

    public $depends = [
        UnifyDefaultAsset::class,

        UnifyHsMegamenuAsset::class,
        UnifyHsHamburgersAsset::class,
        UnifyHsPopupAsset::class,
        UnifyHsOnscrollAnimationAsset::class,
        UnifyHsStickyBlockAsset::class,
        UnifyHsCarouselAsset::class,
    ];
}