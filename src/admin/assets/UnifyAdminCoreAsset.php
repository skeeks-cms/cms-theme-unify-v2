<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 */

namespace skeeks\cms\themes\unify\admin\assets;

use skeeks\cms\base\AssetBundle;
use skeeks\cms\backend\assets\BackendCoreAsset;
use skeeks\cms\backend\assets\BackendLegacyIconAsset;

/**
 * Functional providers required by both the legacy and compact backend shell.
 *
 * Legacy-only visual helpers (for example Malihu scrollbar) belong to
 * UnifyAdminLegacyAsset so compact cabinets do not download them.
 */
class UnifyAdminCoreAsset extends AssetBundle
{
    public $depends = [
        BackendCoreAsset::class,
        BackendLegacyIconAsset::class,
    ];
}
