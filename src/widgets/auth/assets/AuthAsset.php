<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 26.07.2015
 */

namespace skeeks\cms\themes\unify\widgets\auth\assets;

use skeeks\cms\admin\assets\JqueryMaskInputAsset;
use skeeks\cms\themes\unify\assets\UnifyThemeAsset;
use yii\web\AssetBundle;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AuthAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/themes/unify/widgets/auth/assets/src';

    public $css = [
        'auth.css',
    ];
    public $js = [
        'auth.js',
    ];
    public $depends = [
        //UnifyThemeShopAsset::class,
        JqueryMaskInputAsset::class,
        UnifyThemeAsset::class,
    ];
}
