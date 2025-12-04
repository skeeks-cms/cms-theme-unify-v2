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
class FontAwesomeIconsAsset extends UnifyAsset
{
    public $sourcePath = "@skeeks/cms/themes/unify/assets/src/font-awesme-icons";

    public $css = [
        'css/fontello.css',
    ];

    public $js = [
    ];

    public $depends = [
    ];


}