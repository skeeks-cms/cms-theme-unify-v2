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
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyThemeGoToAsset extends \skeeks\cms\base\AssetBundle
{
    public $sourcePath = '@vendor/skeeks/cms-theme-unify-v2/src/assets/src';

    public $css = [
        'css/components/go-to.css'
    ];
    public $js = [

    ];
    public $depends = [
        UnifyHsGoToAsset::class,
        UnifyIconHsAsset::class,
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $view->registerJs(<<<JS
(function(sx, $, _)
{
    sx.createNamespace('unify', sx);
    sx.unify.GoToInit = false;
    sx.unify.GoToCallback = function(e) {
        $("body").append(
            '<a class="js-go-to u-go-to-v1" href="#!" data-type="fixed" data-position=\'{"bottom": 15,"right": 15}\' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn"><i class="hs-icon hs-icon-arrow-top"></i></a>'
        );
        $.HSCore.components.HSGoTo.init('.js-go-to');
        window.removeEventListener("scroll", sx.unify.GoToCallback);
    };
    
    window.addEventListener('scroll', sx.unify.GoToCallback);
})(sx, sx.$, sx._);
JS
        );
    }
}