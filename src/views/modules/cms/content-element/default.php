<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */

if (@$isShowMainImage !== false) {
    $isShowMainImage = true;
}
?>

<?php echo $this->render("@app/views/include/_content-image", ['model' => $model]); ?>


<div class="sx-publication-page">
    <div class="container sx-container g-bg-white">
        <div class="row">
            <!-- Content -->
            <? if ($this->theme->element_content_layout == 'col-left') : ?>
            <div class="order-md-2 sx-content-col-main sx-content-col">
                <? endif; ?>
                <? if ($this->theme->element_content_layout == 'col-right') : ?>
                <div class="sx-content-col-main sx-content-col">
                    <? endif; ?>
                    <? if ($this->theme->element_content_layout == 'no-col') : ?>
                    <div class="col-md-12 g-py-20 sx-content-col">
                        <? endif; ?>
                        <? if ($this->theme->element_content_layout == 'col-left-right') : ?>
                        <div class="col-md-7  order-md-2 g-py-20 sx-content-col">
                            <? endif; ?>

                            <? if (!$this->theme->is_image_body_begin) : ?>
                                <?= $this->render('@app/views/breadcrumbs', [
                                    'model' => $model,
                                ]) ?>
                            <? endif; ?>
                            <div class="sx-content" itemscope itemtype="http://schema.org/NewsArticle">
                                <!-- Микроразметка новости-статьи -->
                                <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?= $model->getUrl(true); ?>"/>
                                <meta itemprop="headline" content="<?= $model->seoName; ?>">
                                <?php if ($model->createdBy) : ?>
                                    <span itemprop="author" itemscope itemtype="https://schema.org/Person"><meta itemprop="name" content="<?= $model->createdBy->displayName; ?>"></span>
                                <?php endif; ?>

                                <span itemprop="publisher" itemtype="http://schema.org/Organization" itemscope="">
                        <meta itemprop="name" content="<?= \Yii::$app->cms->appName; ?>">
                        <?php if (\Yii::$app->skeeks->site->cmsSiteAddress) : ?>
                            <meta itemprop="address" content="<?= \Yii::$app->skeeks->site->cmsSiteAddress->value; ?>">
                        <?php endif; ?>

                                    <?php if (\Yii::$app->skeeks->site->cmsSitePhone) : ?>
                                        <meta itemprop="telephone" content="<?= \Yii::$app->skeeks->site->cmsSitePhone->value; ?>">
                                    <?php endif; ?>

                        <span itemprop="logo" itemtype="http://schema.org/ImageObject" itemscope="">
                            <link itemprop="url" href="<?= $this->theme->logo; ?>">
                            <meta itemprop="image" content="<?= $this->theme->logo; ?>">
                        </span>
                    </span>
                                <meta itemprop="datePublished" content="<?= \Yii::$app->formatter->asDate($model->created_at, "php:Y-m-d"); ?>"/>
                                <meta itemprop="dateModified" content="<?= \Yii::$app->formatter->asDate($model->updated_at, "php:Y-m-d"); ?>"/>
                                <meta itemprop="genre" content="<?= $model->cmsTree ? $model->cmsTree->name : ""; ?>"/>
                                <? if ($model->description_short) : ?>
                                    <meta itemprop="description" content="<?= strip_tags($model->description_short); ?>"/>
                                <? else : ?>
                                    <meta itemprop="description" content="<?= \yii\helpers\StringHelper::truncate(strip_tags($model->description_full), 250); ?>"/>
                                <? endif; ?>
                                <? if ($model->image) : ?>
                                    <span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                        <link itemprop="url" href="<?= $model->getUrl(true); ?>">
                        <span itemprop="image" content="<?= $model->image->src; ?>">
                            <meta itemprop="width" content="<?= $model->image->image_width; ?>">
                            <meta itemprop="height" content="<?= $model->image->image_height; ?>">
                        </span>
                    </span>
                                <? endif; ?>
                                <!-- /Микроразметка новости -->
                                <? if ($model->image && $isShowMainImage && !$this->theme->is_image_body_begin) : ?>
                                    <div class="" style="margin-bottom: 20px;">
                                        <img src="<?= \Yii::$app->imaging->thumbnailUrlOnRequest($model->image ? $model->image->src : null,
                                            new \skeeks\cms\components\imaging\filters\Thumbnail([
                                                'w' => 0,
                                                'h' => 400,
                                            ]), $model->code
                                        ) ?>" title="<?= $model->seoName; ?>" alt="<?= $model->seoName; ?>" class="img-responsive"/>
                                    </div>

                                <? endif; ?>
                                <!--<img src="<? /*= \skeeks\cms\helpers\Image::getCapSrc(); */ ?>" title="<? /*= $model->name; */ ?>" alt="<? /*= $model->name; */ ?>" class="img-responsive" />-->
                                <? if (!$this->theme->is_image_body_begin) : ?>
                                    <?= $model->description_short; ?>
                                <? endif; ?>
                                <div itemprop="articleBody" style="overflow: auto;">
                                    <?= $model->description_full; ?>

                                </div>
                            </div>


                            <? if ($model->images) : ?>
                                <h2><?= count($model->images); ?> фото</h2>
                                <?= $this->render("@app/views/include/gallery", ['images' => $model->images]); ?>
                            <? endif; ?>


                            <ul class="list-inline d-sm-flex sx-list-short-info sx-main-text-color sx-news-item-short-info">
                                <?php /*if ($model->createdBy) : */?><!--
                                    <li class="list-inline-item sx-news-item-created_by">
                                        <img src="<?/*= $model->createdBy->avatarSrc; */?>" style="height: 25px; border-radius: 50%;"/>
                                        <a href="<?/*= $model->createdBy->getPageUrl(); */?>" title="<?/*= $model->createdBy->name; */?>" class="g-color-gray-dark-v4 g-color-primary--hover">
                                            <?/*= $model->createdBy->shortDisplayName; */?>
                                        </a>
                                    </li>
                                    <li class="list-inline-item g-mx-10 sx-news-item-created_by">/</li>
                                --><?php /*endif; */?>


                                <li class="list-inline-item">
                                    <?= \Yii::$app->formatter->asDate($model->published_at, 'medium') ?>
                                </li>
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
                                <li class="list-inline-item ml-auto">

                                    <?= \skeeks\cms\yandex\share\widget\YaShareWidget::widget([
                                        'namespace' => 'YaShareWidget-default',
                                    ]); ?>

                                </li>
                            </ul>

                            <!--<div class="card g-brd-gray-light-v7 g-bg-gray-light-v8 g-pa-15 g-pa-25-30--md g-mb-30 g-mt-30">
                    <? /* echo \skeeks\cms\comments\widgets\CommentsWidget::widget(['model' => $model]); */ ?>
                </div>-->


                            <?= $this->render("@app/views/include/bottom-block"); ?>

                        </div>
                        <? if ($this->theme->element_content_layout == 'col-left') : ?>
                            <?= $this->render("@app/views/include/col-left"); ?>
                        <? endif; ?>
                        <? if ($this->theme->element_content_layout == 'col-right') : ?>
                            <?= $this->render("@app/views/include/col-left"); ?>
                        <? endif; ?>
                        <? if ($this->theme->element_content_layout == 'no-col') : ?>

                        <? endif; ?>
                        <? if ($this->theme->element_content_layout == 'col-left-right') : ?>
                            <?= $this->render("@app/views/include/col-left"); ?>
                        <? endif; ?>
                    </div>
                </div>

</div>

