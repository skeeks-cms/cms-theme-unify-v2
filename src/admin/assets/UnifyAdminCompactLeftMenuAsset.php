<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 */

namespace skeeks\cms\themes\unify\admin\assets;

use skeeks\cms\backend\assets\BackendShellMenuAsset;

/**
 * Sidebar entry point for the opt-in compact shell.
 */
class UnifyAdminCompactLeftMenuAsset extends UnifyAdminLeftMenuAsset
{
    public $depends = [
        UnifyAdminCompactAppAsset::class,
        BackendShellMenuAsset::class,
    ];
}
