<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 06.03.2015
 *
 * @var \skeeks\cms\models\CmsContentElement $model
 *
 */
?>


<div class="row g-mb-30">
    <!-- Article Image -->
    <div class="col-md-2">
        <figure class="u-shadow-v25 g-pos-rel g-mb-20 g-mb-0--lg">
            <? if ($model->image) : ?>
                <a href="<?= $model->image->src; ?>" target="_blank" class="js-fancybox-media">
                    <img class="img-fluid w-100" src="<?= \skeeks\cms\helpers\Image::getSrc(
                        \Yii::$app->imaging->thumbnailUrlOnRequest($model->image ? $model->image->src : null,
                            new \skeeks\cms\components\imaging\filters\Thumbnail([
                                'w' => 100,
                                'h' => 0,
                                'm' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET,
                            ]), $model->code
                        )); ?>" alt="<?= $model->name; ?>">

                </a>
            <? else : ?>
                <img class="img-fluid w-100" src="<?= \skeeks\cms\helpers\Image::getSrc(
                    \Yii::$app->imaging->thumbnailUrlOnRequest($model->image ? $model->image->src : null,
                        new \skeeks\cms\components\imaging\filters\Thumbnail([
                            'w' => 100,
                            'h' => 0,
                            'm' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET,
                        ]), $model->code
                    )); ?>" alt="<?= $model->name; ?>">
            <? endif; ?>

        </figure>
    </div>
    <!-- End Article Image -->

    <!-- Article Content -->
    <div class="col-md-10 align-self-center">
        <h3 class="h4 g-mb-15">
            <?= $model->name; ?>
        </h3>

        <ul class="list-inline g-color-gray-dark-v4 g-font-size-12">
            <? if ($model->cmsTree) : ?>
                <li class="list-inline-item">
                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="<?= $model->cmsTree->url; ?>"><?= $model->cmsTree->name; ?></a>
                </li>
                <li class="list-inline-item">/</li>
            <? endif; ?>

            <li class="list-inline-item">
                <?= \Yii::$app->formatter->asDate($model->published_at, 'full') ?>
            </li>

        </ul>

        <p class="g-color-gray-dark-v2"><?= $model->description_short; ?></p>
        <? if ($model->fullImage) : ?>
            <a class="g-font-size-12 js-fancybox-media" href="<?= $model->fullImage->src; ?>" target="_blank">Читать оригинал</a>
        <? endif; ?>

    </div>
    <!-- End Article Content -->
</div>


