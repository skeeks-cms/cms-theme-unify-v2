<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 */

namespace skeeks\cms\themes\unify\admin\assets;

use skeeks\cms\backend\assets\BackendAppAsset;

/**
 * Opt-in application shell without unify-admin.min.css or HS Admin icons.
 */
class UnifyAdminCompactAppAsset extends UnifyAdminAppAsset
{
    public $depends = [
        UnifyAdminCoreAsset::class,
        BackendAppAsset::class,
        UnifyAdminThemeAdapterAsset::class,
    ];
}
