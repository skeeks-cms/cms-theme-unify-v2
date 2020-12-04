<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget */
/* @var $model   \skeeks\cms\models\Tree */
?>

<div class="col-lg-4 g-mb-30">
    <!-- Article -->
    <article class="text-center g-color-white g-overflow-hidden h-100">
        <? if ($model->image) : ?>
        <div class="u-block-hover--scale g-min-height-200 g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_5--after g-transition-0_5 h-100"
             data-bg-img-src="<?= \skeeks\cms\helpers\Image::getSrc(\Yii::$app->imaging->thumbnailUrlOnRequest($model->mainImage ? $model->mainImage->src : null,
                                new \skeeks\cms\components\imaging\filters\Thumbnail([
                                    'w' => 400,
                                    'h' => 210,
                                    'm' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND,
                                ]), $model->code
                            )); ?>">
        <? else : ?>
        <div class="u-block-hover--scale g-min-height-200 g-flex-middle g-bg-cover g-bg-primary g-bg-size-cover g-bg-bluegray-opacity-0_5--after g-transition-0_5 h-100">
        <? endif; ?>

            <div class="g-flex-middle-item g-pos-rel g-z-index-1 g-py-50 g-px-20">
                <div class="h3"><?= $model->name; ?>
                </div>
                <hr class="g-brd-3 g-brd-white g-width-30 g-my-20">
                <a class="btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase" href="<?= $model->url; ?>">Смотреть</a>
            </div>
        </div>
    </article>
    <!-- End Article -->
</div>
