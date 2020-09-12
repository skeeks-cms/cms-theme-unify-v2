<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

use yii\web\AssetBundle;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class FontAwesomeAsset extends \skeeks\cms\base\AssetBundle
{
    public $sourcePath = '@vendor/fortawesome/font-awesome/';
    public $css = [
        'css/all.min.css',
    ];
}