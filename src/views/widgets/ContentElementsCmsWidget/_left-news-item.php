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

<article class="media g-mb-10">
    <a class="d-flex u-shadow-v25 mr-3" href="<?= $model->url; ?>" title="<?= $model->name; ?>">
        <img class="g-width-60 g-height-60" src="<?= \skeeks\cms\helpers\Image::getSrc(
                    \Yii::$app->imaging->thumbnailUrlOnRequest($model->image ? $model->image->src : null,
                        new \skeeks\cms\components\imaging\filters\Thumbnail([
                            'w' => 60,
                            'h' => 60,
                            'm' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND,
                        ]), $model->code
                    )); ?>" alt="<?= $model->name; ?>">
    </a>

    <div class="media-body">
        <h3 class="h6">
            <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover" href="<?= $model->url; ?>" title="<?= $model->name; ?>"><?= $model->name; ?></a>
        </h3>

        <ul class="u-list-inline g-font-size-12 g-color-gray-dark-v4">
            <li class="list-inline-item">
                <?= \Yii::$app->formatter->asDate($model->published_at) ?>
            </li>

        </ul>
    </div>
</article>


