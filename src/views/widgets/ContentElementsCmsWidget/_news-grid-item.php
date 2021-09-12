<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 06.03.2015
 *
 * @var \skeeks\cms\models\CmsContentElement $model
 * @var int                                  $key
 * @var int                                  $index
 *
 */
?>
<div class="col-md-3 item" style="margin-bottom: 30px;" data-animation="fadeInUp" data-animation-delay="500" data-animation-duration="500">
    <div class="sx-news-item">
        <div style="margin-bottom: 20px;">
            <a href="<?= $model->url; ?>" title="<?= $model->name; ?>" data-pjax="0">

                <? if ($model->image) : ?>
                    <div class="g-mb-20">
                        <img src="<?= \Yii::$app->imaging->thumbnailUrlOnRequest($model->image->src,
                            new \skeeks\cms\components\imaging\filters\Thumbnail([
                                'w' => 352,
                                'h' => 200,
                            ]), $model->code
                        ) ?>" title="<?= $model->name; ?>" alt="<?= $model->name; ?>" class="img-fluid" style="max-width: 100% !important;"/>
                    </div>
                <? else: ?>
                    <img src="<?= \skeeks\cms\helpers\Image::getCapSrc(); ?>" title="<?= $model->name; ?>" alt="<?= $model->name; ?>" class="img-fluid"/>
                <? endif; ?>
            </a>
        </div>
        <div style="margin-bottom: 16px;">
            <a class="h3 g-text-underline--none--hover" href="<?= $model->url; ?>" title="<?= $model->name; ?>" data-pjax="0">
                <?= $model->name; ?>
            </a>
        </div>
        <div class="sx-datetime" style="font-size: 14px; font-weight: 700; color: #CDCDCB;"><?php echo \Yii::$app->formatter->asDate($model->published_at); ?></div>
    </div>
</div>

