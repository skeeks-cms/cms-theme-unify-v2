<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\widgets\jui\assets;

use skeeks\cms\base\AssetBundle;
/**
 *
 * Этот класс используется для того чтобы не пересекаться с bootstrap tooltip
 *
 * @see https://api.jqueryui.com/sortable/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class JuiSortableAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery-ui';

    public function init()
    {
        parent::init();
        //$this->_implodeFiles();
    }

    public $js = [

        //'ui/core.js', //TODO:переписал


        'ui/minified/data.js',
        'ui/minified/disable-selection.js',
        'ui/minified/focusable.js',
        'ui/minified/form.js',
        'ui/minified/ie.js',
        'ui/minified/keycode.js',
        'ui/minified/labels.js',
        'ui/minified/plugin.js',
        'ui/minified/safe-active-element.js',
        'ui/minified/safe-blur.js',
        'ui/minified/scroll-parent.js',
        'ui/minified/tabbable.js',
        'ui/minified/unique-id.js',
        'ui/minified/version.js',


        'ui/minified/widget.js',

        'ui/widgets/mouse.js',
        'ui/widgets/sortable.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        JuiCoreFixAsset::class,
        JuiSmoothnessAsset::class
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        \Yii::$app->view->registerJs(<<<JS
$.ui = $.ui || {};
JS
        );
    }
}