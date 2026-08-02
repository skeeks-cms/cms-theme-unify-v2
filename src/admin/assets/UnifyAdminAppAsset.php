<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\admin\assets;

use skeeks\cms\base\AssetBundle;
use skeeks\cms\backend\assets\BackendAppAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyAdminAppAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/themes/unify/admin/assets/src/';

    public $css = [];

    public $js = [];

    public $depends = [
        UnifyAdminCompatibilityAsset::class,
        BackendAppAsset::class,
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
