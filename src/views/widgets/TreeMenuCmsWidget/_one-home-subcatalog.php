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

<div class="col-lg-4  sx-one-subcatalog-wrapper">
    <!-- Article -->
    <article class="text-center g-color-white">
        <? if ($model->image) : ?>
        <div class="sx-one-subcatalog"
             data-bg-img-src="<?= \skeeks\cms\helpers\Image::getSrc(\Yii::$app->imaging->thumbnailUrlOnRequest($model->mainImage ? $model->mainImage->src : null,
                 new \skeeks\cms\components\imaging\filters\Thumbnail([
                     'w' => 400,
                     'h' => 210,
                     'm' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND,
                 ]), $model->code
             )); ?>">
            <? else : ?>
            <div class="sx-one-subcatalog g-bg-primary">
                <? endif; ?>
                <div class="sx-one-subcatalog-info">
                    <div class="h3"><?= $model->name; ?>
                    </div>
                    <hr>
                    <a class="btn btn-md" href="<?= $model->url; ?>">Смотреть</a>
                </div>
            </div>
    </article>
    <!-- End Article -->
</div>
