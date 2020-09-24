<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

use skeeks\assets\unify\base\UnifyAsset;
use skeeks\assets\unify\base\UnifyComponentsAsset;
use skeeks\assets\unify\base\UnifyCoreAsset;
use skeeks\assets\unify\base\UnifyGlobalsAsset;
use skeeks\assets\unify\base\UnifyHsPopupAsset;
use skeeks\assets\unify\base\UnifyIconHsAsset;
use skeeks\assets\unify\base\UnifyOnscrollAnimationAsset;
use skeeks\assets\unify\base\UnifyPopperAsset;
use skeeks\sx\assets\Custom;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\YiiAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyDefaultAsset extends UnifyAsset
{
    public $css = [
    ];

    public $js = [
    ];

    public $depends = [
        YiiAsset::class,
        Custom::class,
        UnifyPopperAsset::class,
        BootstrapPluginAsset::class,
        FontAwesomeAsset::class,
        VanillaLazyLoadAsset::class,
        UnifyIconHsAsset::class,
        UnifyHsPopupAsset::class,
        UnifyCoreAsset::class,
        UnifyComponentsAsset::class,
        UnifyGlobalsAsset::class,
    ];


}