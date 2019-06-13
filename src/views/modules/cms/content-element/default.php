<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>
<section class="g-pb-0">
    <div class="container g-bg-white">
        <div class="row">
            <!-- Content -->
            <div class="col-md-9 order-md-2 g-py-20">

                <?= $this->render('@app/views/breadcrumbs', [
                    'model' => $model,
                ]) ?>


                <div class="g-color-gray-dark-v1 g-font-size-16 sx-content">

                    <? if ($model->image) : ?>
                        <div class="g-mb-20">
                            <img src="<?= \Yii::$app->imaging->thumbnailUrlOnRequest($model->image->src,
                                new \skeeks\cms\components\imaging\filters\Thumbnail([
                                    'w' => 0,
                                    'h' => 400,
                                ]), $model->code
                            ) ?>" title="<?= $model->name; ?>" alt="<?= $model->name; ?>" class="img-responsive"/>
                        </div>

                    <? endif; ?>
                    <!--<img src="<? /*= \skeeks\cms\helpers\Image::getCapSrc(); */ ?>" title="<? /*= $model->name; */ ?>" alt="<? /*= $model->name; */ ?>" class="img-responsive" />-->
                    <?= $model->description_short; ?>
                    <?= $model->description_full; ?>

                </div>


                <? if ($model->images) : ?>
                    <h2><?= count($model->images); ?> фото</h2>
                    <?= $this->render("@app/views/include/gallery", ['images' => $model->images]); ?>
                <? endif; ?>


                <ul class="list-inline d-sm-flex g-color-gray-dark-v4 mb-20">
                    <li class="list-inline-item">
                        <img src="<?= $model->createdBy->avatarSrc; ?>" style="height: 25px; border-radius: 50%;"/>
                        <a href="<?= $model->createdBy->getPageUrl(); ?>" title="<?= $model->createdBy->name; ?>" class="g-color-gray-dark-v4 g-color-primary--hover">
                            <?= $model->createdBy->displayName; ?>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-10">/</li>
                    <li class="list-inline-item">
                        <?= \Yii::$app->formatter->asDate($model->published_at, 'medium') ?>
                    </li>
                    <li class="list-inline-item g-mx-10">/</li>
                    <li class="list-inline-item g-mr-10">
                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                            <i class="icon-finance-206 u-line-icon-pro align-middle g-pos-rel g-top-1 mr-1"></i>
                            <?= (int)$model->relatedPropertiesModel->getAttribute('comments'); ?>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-10">/</li>
                    <li class="list-inline-item g-mr-10">
                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                            <i class="icon-eye u-line-icon-pro align-middle mr-1"></i> <?= (int)$model->show_counter; ?>
                        </a>
                    </li>
                    <li class="list-inline-item ml-auto">

                        <?

                        if ($model->image) {
                            $this->registerMetaTag([
                                'property' => 'og:image',
                                'content'  => $model->image->absoluteSrc,
                            ], 'og:image');
                        } else if ($model->cmsTree->dir == 'blog/releases') {
                            $imgsrc = \frontend\assets\AppAsset::getAssetUrl('/img/cms/box/box'.\Yii::$app->project->widgetSuffix.".png");
                            $this->registerMetaTag([
                                'property' => 'og:image',
                                'content'  => $imgsrc,
                            ], 'og:image');
                        }

                        if ($model->description_short) {
                            $this->registerMetaTag([
                                'property' => 'og:description',
                                'content'  => trim(strip_tags($model->description_short)),
                            ], 'og:description');
                        }


                        $this->registerMetaTag([
                            'property' => 'og:title',
                            'content'  => $model->name,
                        ], 'og:title');
                        ?>
                        <?= \skeeks\cms\yandex\share\widget\YaShareWidget::widget([
                            'namespace' => 'YaShareWidget-default',
                        ]); ?>

                    </li>
                </ul>

                <!--<div class="card g-brd-gray-light-v7 g-bg-gray-light-v8 g-pa-15 g-pa-25-30--md g-mb-30 g-mt-30">
                    <?/* echo \skeeks\cms\comments\widgets\CommentsWidget::widget(['model' => $model]); */?>
                </div>-->



                <?= $this->render("@app/views/include/bottom-block"); ?>

            </div>
            <?= $this->render("@app/views/include/col-left"); ?>
        </div>
    </div>

</section>
