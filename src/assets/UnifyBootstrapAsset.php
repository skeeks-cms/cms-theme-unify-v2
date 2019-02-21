<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

use skeeks\assets\unify\base\UnifyAsset;
use yii\bootstrap\BootstrapAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyBootstrapAsset extends BootstrapAsset
{
    public $sourcePath = '@skeeks/assets/unify/template/html/';
    public $css = [
        'assets/vendor/bootstrap/bootstrap.min.css',
    ];
}