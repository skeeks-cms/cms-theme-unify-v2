<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

use skeeks\assets\unify\base\UnifyAsset;
use skeeks\assets\unify\base\UnifyIconHsAsset;
use skeeks\assets\unify\base\UnifyOnscrollAnimationAsset;
use skeeks\assets\unify\base\UnifyPopperAsset;
use skeeks\sx\assets\Custom;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\YiiAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyMinAsset extends UnifyAsset
{
    public $css = [
        'assets/css/unify-core.css',
        //'assets/css/unify-components.css',
        'assets/css/unify-globals.css',
    ];

    public $js = [

    ];

    public $depends = [
        YiiAsset::class,
        Custom::class,

        UnifyPopperAsset::class,
        BootstrapPluginAsset::class,

        //UnifyIconHsAsset::class,

        //FontAwesomeAsset::class,
        //VanillaLazyLoadAsset::class,
    ];


}