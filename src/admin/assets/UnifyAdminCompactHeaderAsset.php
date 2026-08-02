<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 */

namespace skeeks\cms\themes\unify\admin\assets;

use skeeks\cms\backend\assets\BackendShellHeaderAsset;

/**
 * Header entry point for the opt-in compact shell.
 */
class UnifyAdminCompactHeaderAsset extends UnifyAdminHeaderAsset
{
    public $depends = [
        UnifyAdminCompactAppAsset::class,
        BackendShellHeaderAsset::class,
    ];
}
