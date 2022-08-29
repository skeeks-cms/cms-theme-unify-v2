<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\admin\assets;

use skeeks\assets\unify\base\UnifyAsset;
use skeeks\assets\unify\base\UnifyHsScrollbarAsset;
use skeeks\assets\unify\base\UnifyPopperAsset;
use skeeks\cms\assets\FancyboxAssets;
use skeeks\sx\assets\Custom;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\YiiAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyAdminLeftMenuAsset extends \skeeks\cms\base\AssetBundle
{
    public $sourcePath = '@skeeks/cms/themes/unify/admin/assets/src/';

    public $css = [
        'css/admin-left-menu.css',
    ];

    public $js = [
    ];

    public $depends = [
        //UnifyAdminAppAsset::class,
    ];
}