<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 */

namespace skeeks\cms\themes\unify\admin\assets;

use skeeks\cms\base\AssetBundle;

/**
 * Backward-compatible Unify CSS chain used by existing administration.
 *
 * New cabinets may use UnifyAdminCompactAppAsset and omit the large legacy
 * stylesheet while retaining the shared backend shell and JS contracts.
 */
class UnifyAdminCompatibilityAsset extends AssetBundle
{
    public $depends = [
        UnifyAdminLegacyAsset::class,
        UnifyAdminThemeAdapterAsset::class,
    ];
}
