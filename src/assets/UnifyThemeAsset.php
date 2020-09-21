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
        'css/unify-custom.css',
    ];

    public $js = [
        'js/unify-custom.js',
    ];

    public $depends = [
        UnifyDefaultAsset::class,
    ];

    public function init()
    {
        parent::init();

        if (isset(\Yii::$app->view->theme->is_min_assets) && \Yii::$app->view->theme->is_min_assets) {
            $this->depends = [
                UnifyMinAsset::class
            ];
        }
    }
}