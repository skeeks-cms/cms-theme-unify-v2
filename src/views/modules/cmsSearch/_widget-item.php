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
    <div class="col-sm-4 sm-margin-bottom-20 text-center">
        <a href="<?= $model->url; ?>">
        <? if ($model->image) : ?>
            <img src="<?= \skeeks\cms\helpers\Image::getSrc(\Yii::$app->imaging->thumbnailUrlOnRequest($model->image ? $model->image->src : null,
                new \skeeks\cms\components\imaging\filters\Thumbnail([
                    'w' => 400,
                    'h' => 210,
                    'm' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND,
                ]), $model->code
            )); ?>" title="<?= $model->name; ?>" alt="<?= $model->name; ?>" class="img-responsive"/>
        <? else: ?>
            <img src="<?= \skeeks\cms\helpers\Image::getCapSrc(); ?>" title="<?= $model->name; ?>"
                 alt="<?= $model->name; ?>" class="img-responsive"/>
        <? endif; ?>
        </a>
    </div>
    <div class="col-sm-8 news-v3">
        <div class="news-v3-in-sm no-padding">
            <h2 class="h4">
                <a href="<?= $model->url; ?>" title="<?= $model->name; ?>" data-pjax="0"><?= $model->name; ?></a>
            </h2>
            <ul class="list-inline posted-info">
                <? /* if ($model->createdBy) : */ ?><!--
                    <li>Добавил: <a href="<? /*= $model->createdBy->getPageUrl(); */ ?>" title="<? /*= $model->createdBy->name; */ ?>"><? /*= $model->createdBy->name; */ ?></a></li>
                --><? /* endif; */ ?>
                <? if ($model->cmsTree) : ?>
                    <li>Категория: <a href="<?= $model->cmsTree->url; ?>"
                                      title="<?= $model->cmsTree->name; ?>"><?= $model->cmsTree->name; ?></a></li>
                <? endif; ?>
                <li>Время публикации: <?= \Yii::$app->formatter->asDate($model->published_at, 'full') ?></li>
                <? if ($testValue = $model->relatedPropertiesModel->getAttribute('test')) : ?>
                    <li><?= $model->relatedPropertiesModel->getAttributeLabel('test'); ?>: <?= $testValue; ?></li>
                <? endif; ?>
            </ul>
            <p><?= $model->description_short; ?></p>

            <p><a href="<?= $model->url; ?>" data-pjax="0" class="btn btn-primary"><?= Yii::t("skeeks/unify", "More"); ?></a></p>
        </div>
    </div>

