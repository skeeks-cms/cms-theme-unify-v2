<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\admin\assets;

use skeeks\assets\unify\base\UnifyAsset;
use skeeks\cms\base\AssetBundle;
use skeeks\cms\themes\unify\assets\UnifyThemeAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyAdminUnauthorizedAsset extends UnifyThemeAsset
{
    public $sourcePath = '@skeeks/cms/themes/unify/admin/assets/src/';

    public $css = [
        'css/unauthorized.css',
    ];

    public $js = [
        'js/classes/Blocker.js',
        //'js/app.js',
    ];

    public $depends = [
        UnifyThemeAsset::class,
    ];

    /**
     * Registers this asset bundle with a view.
     * @param View $view the view to be registered with
     * @return static the registered asset bundle instance
     */
    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $imageLoaderUrl = self::getAssetUrl('img/loader/Ripple-1.5s-163px.svg');
        $view->registerJs(<<<JS
        (function(sx, $, _){
            sx.Config.set('imageLoader', '{$imageLoaderUrl}');
        })(sx, sx.$, sx._);
JS
);
    }
}