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
    <ul class="list-inline g-color-silver sx-news-item-short-info sx-main-text-color ">

        <?/* if ($model->createdBy) : */?><!--
            <li class="list-inline-item sx-news-item-created_by">
                <img src="<?/*= $model->createdBy->avatarSrc; */?>" style="height: 25px; border-radius: 50%; max-width: 100%;"/>
                <span title="<?/*= $model->createdBy->shortDisplayName; */?>" class="g-color-gray-dark-v4 g-color-primary--hover">
                    <?/*= $model->createdBy->shortDisplayName; */?>
                </span>
            </li>
            <li class="list-inline-item sx-news-item-created_by">/</li>
        --><?/* endif; */?>

        <li class="list-inline-item sx-news-item-created_at">
            <?= \Yii::$app->formatter->asDate($model->published_at, 'medium') ?>
        </li>

        <? if ($model->cmsTree) : ?>
            <li class="list-inline-item sx-delimiter">/</li>
            <li class="list-inline-item sx-item">
                <a class="sx-main-text-color g-text-underline--none--hover g-color-primary--hover" href="<?= $model->cmsTree->url; ?>"><?= $model->cmsTree->name; ?></a>
            </li>
        <? endif; ?>

        <li class="list-inline-item sx-news-item-comments sx-delimiter">/</li>
        <li class="list-inline-item sx-news-item-comments sx-item">
            <a class="sx-main-text-color g-text-underline--none--hover g-color-primary--hover">
                <i class="fas fa-comments"></i>
                <?= (int)$model->relatedPropertiesModel->getAttribute('comments'); ?>
            </a>
        </li>
        <li class="list-inline-item sx-news-item-shows sx-delimiter">/</li>
        <li class="list-inline-item sx-news-item-shows sx-item">
            <a class="sx-main-text-color g-text-underline--none--hover g-color-primary--hover">
                <i class="fas fa-eye"></i> <?= (int)$model->show_counter; ?>
            </a>
        </li>

    </ul>

    <h3 class="h3 sx-news-list-title-wrapper">
        <a class="sx-main-text-color g-text-underline--none--hover g-color-primary--hover" href="<?= $model->url; ?>"><?= $model->name; ?></a>
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
                <div class="sx-news-list-img-wrapper">
                    <img src="<?= \Yii::$app->imaging->thumbnailUrlOnRequest($model->image->src,
                        new \skeeks\cms\components\imaging\filters\Thumbnail([
                            'w' => 0,
                            'h' => 400,
                        ]), $model->code
                    ) ?>" title="<?= $model->name; ?>" alt="<?= $model->name; ?>" class="img-responsive" style="max-width: 100% !important;"/>
                </div>
            <? endif; ?>
        </a>
    </div>
    <div class="sx-main-text-color sx-news-list-description">
        <?= $model->description_short; ?>
    </div>
    <p><a href="<?= $model->absoluteUrl; ?>" class="btn btn-secondary" data-pjax="0"><?= \Yii::t('skeeks/cms', 'More'); ?> <i class="hs-icon hs-icon-arrow-right" style="font-size: 11px;"></i></a></p>

</div>

