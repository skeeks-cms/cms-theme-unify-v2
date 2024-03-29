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

<article class="media sx-news-item">
    <a class="d-flex sx-news-img-wrapper" href="<?= $model->url; ?>" title="<?= $model->name; ?>">
        <img src="<?= \skeeks\cms\helpers\Image::getSrc(
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
            <a class="sx-main-text-color g-text-underline--none--hover g-color-primary--hover" href="<?= $model->url; ?>" title="<?= $model->name; ?>"><?= $model->name; ?></a>
        </h3>

        <ul class="list-inline sx-color-silver sx-date-info">
            <li class="list-inline-item">
                <?= \Yii::$app->formatter->asDate($model->published_at) ?>
            </li>
        </ul>
    </div>
</article>


