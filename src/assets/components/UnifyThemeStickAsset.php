<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets\components;

use skeeks\assets\unify\base\UnifyHsCarouselAsset;
use skeeks\cms\themes\unify\assets\UnifyThemeAsset;
/**
 *
 * <div class="js-carousel sx-stick"
         data-infinite="true"
         data-autoplay="true"
         data-speed="7000"
         data-lazy-load="progressive"
         data-pagi-classes="u-carousel-indicators-v31 g-absolute-centered--x g-bottom-0 text-center g-mb-10"

         data-arrows-classes="g-color-primary--hover sx-arrows sx-color-silver"
         data-arrow-left-classes="hs-icon hs-icon-arrow-left sx-left sx-plus-20"
         data-arrow-right-classes="hs-icon hs-icon-arrow-right sx-right sx-plus-20"
    >
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyThemeStickAsset extends \skeeks\cms\base\AssetBundle
{
    public $sourcePath = '@vendor/skeeks/cms-theme-unify-v2/src/assets/src';

    public $css = [
        'css/components/stick.css',
    ];
    public $js = [

    ];
    public $depends = [
        UnifyThemeAsset::class,
        UnifyHsCarouselAsset::class,
    ];
}