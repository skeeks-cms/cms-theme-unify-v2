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


<!-- Article Content -->
<div class="col-md-12 align-self-center">
    <ul class="list-inline g-color-gray-dark-v4 g-font-size-12 g-mb-0">

        <? if ($model->createdBy) : ?>
            <li class="list-inline-item">
                <img src="<?= $model->createdBy->avatarSrc; ?>" style="height: 25px; border-radius: 50%; max-width: 100%;"/>
                <span title="<?= $model->createdBy->shortDisplayName; ?>" class="g-color-gray-dark-v4 g-color-primary--hover">
                    <?= $model->createdBy->shortDisplayName; ?>
                </span>
            </li>
            <li class="list-inline-item">/</li>
        <? endif; ?>

        <li class="list-inline-item">
            <?= \Yii::$app->formatter->asDate($model->published_at, 'medium') ?>
        </li>

        <? if ($model->cmsTree) : ?>
            <li class="list-inline-item">/</li>
            <li class="list-inline-item">
                <a class="g-color-gray-dark-v4 g-color-primary--hover" href="<?= $model->cmsTree->url; ?>"><?= $model->cmsTree->name; ?></a>
            </li>
        <? endif; ?>

        <li class="list-inline-item sx-news-item-comments g-mx-10">/</li>
        <li class="list-inline-item sx-news-item-comments g-mr-10">
            <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                <i class="fas fa-comments"></i>
                <?= (int)$model->relatedPropertiesModel->getAttribute('comments'); ?>
            </a>
        </li>
        <li class="list-inline-item sx-news-item-shows g-mx-10">/</li>
        <li class="list-inline-item sx-news-item-shows g-mr-10">
            <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                <i class="fas fa-eye"></i> <?= (int)$model->show_counter; ?>
            </a>
        </li>

    </ul>

    <h3 class="h3 g-font-weight-600 g-mb-15">
        <a class="u-link-v5 g-color-gray-dark-v2 g-color-primary--hover" href="<?= $model->url; ?>"><?= $model->name; ?></a>
    </h3>
    <? /* if ($model->cmsTree) : */ ?><!--
            <li class="list-inline-item">
                <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="<? /*= $model->cmsTree->url; */ ?>"><? /*= $model->cmsTree->name; */ ?></a>
            </li>
            <li class="list-inline-item">/</li>
        --><? /* endif; */ ?>


    <div>
        <a href="<?= $model->absoluteUrl; ?>" title="<?= $model->name; ?>" data-pjax="0">

            <? if ($model->image) : ?>
                <div class="g-mb-20">
                    <img src="<?= \Yii::$app->imaging->thumbnailUrlOnRequest($model->image->src,
                        new \skeeks\cms\components\imaging\filters\Thumbnail([
                            'w' => 0,
                            'h' => 400,
                        ]), $model->code
                    ) ?>" title="<?= $model->name; ?>" alt="<?= $model->name; ?>" class="img-responsive" style="max-width: 100% !important;"/>
                </div>
            <? elseif ($model->cmsTree->dir == 'news/releases'): ?>
                <?
                $imgsrc = \frontend\assets\AppAsset::getAssetUrl('/img/cms/box/box'.\Yii::$app->project->widgetSuffix.".png");
                ?>
                <div class="g-mb-20">
                    <img src="<?= $imgsrc; ?>" title="<?= $model->name; ?>" alt="<?= $model->name; ?>" class="img-responsive"/>
                </div>
            <? else: ?>
                <!--<img src="<? /*= \skeeks\cms\helpers\Image::getCapSrc(); */ ?>" title="<? /*= $model->name; */ ?>" alt="<? /*= $model->name; */ ?>" class="img-responsive" />-->
            <? endif; ?>
        </a>
    </div>
    <div class="g-color-gray-dark-v1 g-font-size-16">
        <?= $model->description_short; ?>
    </div>
    <p><a href="<?= $model->absoluteUrl; ?>" class="btn btn-md u-btn-outline-black g-mr-10 g-mb-15" data-pjax="0"><?= \Yii::t('skeeks/cms', 'More'); ?> <i class="fas fa-chevron-right"></i></a></p>

</div>

