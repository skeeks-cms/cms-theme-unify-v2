<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 26.07.2015
 */
namespace skeeks\cms\themes\unify\widgets\filters\assets;

use skeeks\assets\unify\base\UnifyIoRangeSliderAsset;
use skeeks\cms\themes\unify\assets\UnifyDefaultAsset;
use yii\web\AssetBundle;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class FiltersWidgetAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/themes/unify/widgets/filters/assets/src';

    public $css = [
        'css/filters.css'
    ];
    public $js = [
        'js/filters.js'
    ];
    public $depends = [
        //UnifyThemeShopAsset::class,
        //UnifyDefaultAsset::class,
        UnifyIoRangeSliderAsset::class,
    ];
}
