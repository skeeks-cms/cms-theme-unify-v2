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
class UnifyAdminIframeAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/themes/unify/admin/assets/src/';

    public $css = [
    ];

    public $js = [
        'js/classes/Iframe.js',
    ];

    public $depends = [
        UnifyAdminAsset::class,
    ];
}