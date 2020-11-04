<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget */
/* @var $models  \skeeks\cms\models\Tree[] */
?>
<? if ($models = $widget->activeQuery->all()) : ?>
    <div class="">
        <div class="">
            <div class="">
                <!--g-brd-top--md g-brd-bottom--md g-brd-gray-light-v4-->
                <ul class="row sx-category-list-small list-inline nomargin g-brd-top--md g-brd-bottom--md g-brd-gray-light-v4 no-gutters">
                    <? foreach ($models as $model) : ?>

                        <li class="col-lg-2 col-md-3 col-sm-4 col-6 g-mb-10 g-mt-10">
                            <div class="text-center">
                                <a data-pjax="0" href="<?= $model->url; ?>" class="shop-item-image">
                                    <img src="<?= \skeeks\cms\helpers\Image::getSrc(\Yii::$app->imaging->thumbnailUrlOnRequest($model->mainImage ? $model->mainImage->src : null,
                                        new \skeeks\cms\components\imaging\filters\Thumbnail([
                                            'w' => 120,
                                            'h' => 100,
                                            'm' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET,
                                        ]), $model->code
                                    )); ?>
                        " alt="<?= $model->name; ?>">
                                </a>
                                <!--<div class="easy-block-v1-badge rgba-purple"><? /*= $model->name; */ ?></div>-->
                                <div class="sx-caption-wrapper text-center">
                                    <a data-pjax="0" href="<?= $model->url; ?>" class="sx-subcatalog-title sx-main-text-color g-color-primary--hover g-text-underline--none--hover" style="display: inherit;"><?= $model->name; ?></a>
                                </div>
                            </div>
                        </li>

                    <? endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<? endif; ?>