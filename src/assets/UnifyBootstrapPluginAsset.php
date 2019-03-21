<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

use skeeks\assets\unify\base\UnifyAsset;
use skeeks\assets\unify\base\UnifyPopperAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\jui\JuiAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyBootstrapPluginAsset extends BootstrapPluginAsset
{
    public $sourcePath = '@skeeks/assets/unify/template/html/';

    public $js = [
        /*'assets/vendor/popper.min.js',*/
        'assets/vendor/bootstrap/bootstrap.min.js'
    ];

    //Если грузить в другой последовательности то плохо работают tooltip @see https://stackoverflow.com/questions/13731400/jqueryui-tooltips-are-competing-with-twitter-bootstrap
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        UnifyPopperAsset::class,
        JuiAsset::class,
    ];
}