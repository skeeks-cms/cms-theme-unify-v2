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
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyAdminAppAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/themes/unify/admin/assets/src/';

    public $css = [
        'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&display=swap',
        'css/admin.css',
        //'css/unify-admin.min.css',
        //'css/custom-theme.css',
        //'css/app.css',
    ];

    public $js = [
        //'js/classes/Iframe.js',
        'js/classes/Blocker.js',
        'js/classes/Window.js',

        'js/app.js',
    ];

    public $depends = [
        UnifyAdminAsset::class,
    ];

    public function init()
    {
        parent::init();
        $this->_implodeFiles();
    }

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