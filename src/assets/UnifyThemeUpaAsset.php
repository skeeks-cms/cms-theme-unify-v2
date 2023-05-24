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
use skeeks\cms\base\AssetBundle;
use skeeks\sx\assets\Custom;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\YiiAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyThemeUpaAsset extends AssetBundle
{
    public $sourcePath = "@skeeks/cms/themes/unify/assets/src/upa";

    public $css = [
        'css/unify-upa.css',
    ];

    public $js = [
        //'js/classes/Blocker.js',
        'js/classes/Window.js',
    ];

    public $depends = [
        Custom::class
    ];
}