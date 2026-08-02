<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 */

namespace skeeks\cms\themes\unify\admin\assets;

use skeeks\assets\unify\base\UnifyHsScrollbarAsset;
use skeeks\cms\base\AssetBundle;
use skeeks\cms\backend\assets\BackendUiAsset;

/**
 * Legacy Unify component, utility and enhanced-scrollbar provider.
 *
 * New backend and cabinet markup should use semantic sx-* contracts instead.
 */
class UnifyAdminLegacyAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/themes/unify/admin/assets/src/';

    public $css = [
        'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&display=swap',
        'css/unify-admin.min.css',
    ];

    public $depends = [
        UnifyAdminAsset::class,
        UnifyHsScrollbarAsset::class,
        BackendUiAsset::class,
    ];
}
