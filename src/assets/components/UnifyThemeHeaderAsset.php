<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets\components;

use skeeks\assets\unify\base\UnifyHsGoToAsset;
use skeeks\assets\unify\base\UnifyIconHsAsset;
use skeeks\cms\themes\unify\assets\UnifyThemeAsset;
use skeeks\cms\themes\unify\UnifyTheme;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyThemeHeaderAsset extends \skeeks\cms\base\AssetBundle
{
    public $sourcePath = '@vendor/skeeks/cms-theme-unify-v2/src/assets/src';

    public $css = [
        'css/components/header.css'
    ];
    public $js = [

    ];
    public $depends = [
        UnifyThemeAsset::class,
    ];
}