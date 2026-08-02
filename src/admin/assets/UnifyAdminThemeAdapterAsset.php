<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 */

namespace skeeks\cms\themes\unify\admin\assets;

use skeeks\cms\base\AssetBundle;
use skeeks\cms\backend\assets\BackendShellAsset;

/**
 * Color/theme adapters for legacy Unify and Fancybox markup.
 */
class UnifyAdminThemeAdapterAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/themes/unify/admin/assets/src/';

    public $css = [
        'css/unify-theme.css',
    ];

    public $depends = [
        BackendShellAsset::class,
    ];
}
