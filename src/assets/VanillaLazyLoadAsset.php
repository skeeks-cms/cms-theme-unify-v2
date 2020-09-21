<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

use skeeks\cms\base\AssetBundle;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class VanillaLazyLoadAsset extends AssetBundle
{
    public $sourcePath = '@bower/vanilla-lazyload/dist';

    public $js = [
        'lazyload.min.js',
    ];

    public $css = [
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        \Yii::$app->view->registerJs(<<<JS
sx.LazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
    // ... more custom settings?
});
JS
        );
    }
}
