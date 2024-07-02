<?
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */
?>
<? if ($widget->dataProvider->query->count()) : ?>
    <?
    /* @var $this yii\web\View */
    \skeeks\cms\themes\unify\assets\components\UnifyThemeStickAsset::register($this);
    \skeeks\cms\themes\unify\assets\VanillaLazyLoadAsset::register($this);
    ?>
    <div class="js-carousel sx-stick"
         data-infinite="true" 
         data-autoplay="true" 
         data-speed="7000" 
         data-lazy-load="progressive"
         data-pagi-classes="text-center list-inline sx-stick-dots g-color-primary"

         data-arrows-classes="g-color-primary--hover sx-arrows sx-color-white"
         data-arrow-left-classes="hs-icon hs-icon-arrow-left sx-left sx-plus-20"
         data-arrow-right-classes="hs-icon hs-icon-arrow-right sx-right sx-plus-20"
    >
        <? foreach ($widget->dataProvider->query->orderBy([$widget->orderBy => $widget->order])->all() as $model) : ?>
            <div class="js-slide">
                <? if ($banner_url = $model->relatedPropertiesModel->getAttribute("url")) : ?>
                    <a href="<?php echo $banner_url; ?>">
                <? endif; ?>
                <img data-src="<?= $model->image->src; ?>" alt=" " class="img-fluid lazy">
                <? if ($banner_url) : ?>
                    </a>
                <? endif; ?>
            </div>
        <? endforeach; ?>
    </div>
<? endif; ?>
