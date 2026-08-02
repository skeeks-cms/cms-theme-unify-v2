<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

use skeeks\cms\base\AssetBundle;
use yii\web\JqueryAsset;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class OverlayscrollbarsAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/themes/unify/assets/src/overlayscrollbars';

    public $css = [
        '2.14/overlayscrollbars.min.css',
    ];
    public $js = [
        '2.14/overlayscrollbars.browser.es6.min.js',
    ];

    public $depends = [
        JqueryAsset::class,
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $view->registerJs(<<<JS
$(document).on('pjax:complete', function (e) {

    document.querySelectorAll('.js-scrollbar').forEach(el => {
        OverlayScrollbars(el, {
            scrollbars: { autoHide: 'leave' }
        });
    });

});
OverlayScrollbars(document.querySelectorAll('.js-scrollbar'), {
    scrollbars: {
        autoHide: 'leave'
    }
});
JS
        );
    }
}
