<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets\components;

use skeeks\assets\unify\base\UnifyHsGoToAsset;
use skeeks\assets\unify\base\UnifyIconHsAsset;
use yii\web\JqueryAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyThemeFloatLabelAsset extends \skeeks\cms\base\AssetBundle
{
    public $sourcePath = '@vendor/skeeks/cms-theme-unify-v2/src/assets/src/components/float-label';

    public $css = [
        'float-label.css'
    ];
    public $js = [
        'float-label.js'
    ];
    public $depends = [
        JqueryAsset::class,
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $view->registerJs(<<<JS
(function(sx, $, _)
{
    /*$( '.form-group' ).FloatLabel();*/
})(sx, sx.$, sx._);
JS
        );
    }
}