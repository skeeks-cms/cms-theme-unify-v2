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
class UnifyThemeAsset extends UnifyAsset
{
    public $sourcePath = "@skeeks/cms/themes/unify/assets/src";

    public $css = [
        'css/unify-custom.css',
    ];

    public $js = [
        //'assets/js/components/hs.go-to.js',
    ];

    public $depends = [
        UnifyDefaultAsset::class,
    ];
}