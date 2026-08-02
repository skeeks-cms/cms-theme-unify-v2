<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\admin\assets;

use skeeks\cms\backend\assets\BackendShellMenuAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyAdminLeftMenuAsset extends \skeeks\cms\base\AssetBundle
{
    public $sourcePath = '@skeeks/cms/themes/unify/admin/assets/src/';

    public $css = [];

    public $js = [
    ];

    public $depends = [
        UnifyAdminAppAsset::class,
        BackendShellMenuAsset::class,
    ];
}
