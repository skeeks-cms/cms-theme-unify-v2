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

<? if ($this->theme->is_image_body_begin) : ?>
    <section class="g-bg-cover g-bg-size-cover g-bg-white-gradient-opacity-v1--after sx-body-begin-image-wrapper" data-bg-img-src="<?= $model->image ? $model->image->src : $this->theme->body_begin_no_image; ?>" style="background-image: url('<?= $model->image ? $model->image->src : $this->theme->body_begin_no_image; ?>'); background: center;">
        <div class="container text-center g-pos-rel g-z-index-1 g-pb-50">
            <div class="row d-flex justify-content-center align-content-end flex-wrap g-min-height-<?= $this->theme->body_begin_image_height_element; ?>">
                <div class="col-lg-10 mt-auto">
                    <div class="mb-5">
                        <div class="lead g-color-white-opacity-0_8"><?= $this->render('@app/views/breadcrumbs', [
                            'model' => $model,
                            'isShowH1' => false,
                        ]) ?>
                         </div>
                        <h1 class="g-color-white g-font-weight-600 g-mb-30"><?= $model->name; ?></h1>
                        <div class="lead g-color-white-opacity-0_8"><?= $model->description_short; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>

<section class="g-pb-0">
    <div class="container g-bg-white">
        <div class="row">
            <!-- Content -->
            <? if ($this->theme->tree_content_layout == 'col-left') : ?>
                <div class="col-md-9 order-md-2 g-py-20">
            <? endif; ?>
            <? if ($this->theme->tree_content_layout == 'col-right') : ?>
                <div class="col-md-9 g-py-20">
            <? endif; ?>
            <? if ($this->theme->tree_content_layout == 'no-col') : ?>
                <div class="col-md-12 g-py-20">
            <? endif; ?>
            <? if ($this->theme->tree_content_layout == 'col-left-right') : ?>
                <div class="col-md-7  order-md-2 g-py-20">
            <? endif; ?>

                <? if (!$this->theme->is_image_body_begin) : ?>
                <?= $this->render('@app/views/breadcrumbs', [
                    'model' => $model,
                ]) ?>
                <? endif; ?>
                <div class="g-color-gray-dark-v1 g-font-size-16 sx-content" itemscope itemtype="http://schema.org/NewsArticle">
                    <!-- Микроразметка новости-статьи -->
                    <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?= $model->getUrl(true); ?>"/>
                    <meta itemprop="headline" content="<?= $model->name; ?>">
                    <span itemprop="author" itemscope itemtype="https://schema.org/Person"><meta itemprop="name" content="<?= $model->createdBy->displayName; ?>"></span>
                    <span itemprop="publisher" itemtype="http://schema.org/Organization" itemscope="">
                        <meta itemprop="name" content="<?= \Yii::$app->cms->appName; ?>">
                        <meta itemprop="address" content="<?= $this->theme->address; ?>">
                        <meta itemprop="telephone" content="<?= $this->theme->phone; ?>">
                        <span itemprop="logo" itemtype="http://schema.org/ImageObject" itemscope="">
                            <link itemprop="url" href="<?= $this->theme->logo; ?>">
                            <meta itemprop="image" content="<?= $this->theme->logo; ?>">
                        </span>
                    </span>
                    <meta itemprop="datePublished" content="<?= \Yii::$app->formatter->asDate($model->created_at, "php:Y-m-d"); ?>"/>
                    <meta itemprop="dateModified" content="<?= \Yii::$app->formatter->asDate($model->updated_at, "php:Y-m-d"); ?>"/>
                    <meta itemprop="genre" content="<?= $model->cmsTree->name; ?>"/>
                    <? if ($model->description_short) : ?>
                        <meta itemprop="description" content="<?= $model->description_short; ?>"/>
                    <? else : ?>
                        <meta itemprop="description" content="<?= \yii\helpers\StringHelper::truncate($model->description_full, 250); ?>"/>
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
                        <div class="g-mb-20">
                            <img src="<?= \Yii::$app->imaging->thumbnailUrlOnRequest($model->image ? $model->image->src : null,
                                new \skeeks\cms\components\imaging\filters\Thumbnail([
                                    'w' => 0,
                                    'h' => 400,
                                ]), $model->code
                            ) ?>" title="<?= $model->name; ?>" alt="<?= $model->name; ?>" class="img-responsive"/>
                        </div>

                    <? endif; ?>
                    <!--<img src="<? /*= \skeeks\cms\helpers\Image::getCapSrc(); */ ?>" title="<? /*= $model->name; */ ?>" alt="<? /*= $model->name; */ ?>" class="img-responsive" />-->
                    <? if (!$this->theme->is_image_body_begin) : ?>
                    <?= $model->description_short; ?>
                    <? endif; ?>
                    <div itemprop="articleBody">
                    <?= $model->description_full; ?>

                    </div>
                </div>


                <? if ($model->images) : ?>
                    <h2><?= count($model->images); ?> фото</h2>
                    <?= $this->render("@app/views/include/gallery", ['images' => $model->images]); ?>
                <? endif; ?>


                <ul class="list-inline d-sm-flex g-color-gray-dark-v4 mb-0 sx-list-short-info">
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
                            'property' => 'og:url',
                            'content'  => \yii\helpers\Url::to($model->url, true)
                        ], 'og:url' );

                        $this->registerMetaTag([
                            'property' => 'og:title',
                            'content'  => $model->name,
                        ], 'og:title');

                        $this->registerMetaTag([
                            'property' => 'og:type',
                            'content'  => 'article',
                        ], 'og:type');
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
            <? if ($this->theme->tree_content_layout == 'col-left') : ?>
                <?= $this->render("@app/views/include/col-left"); ?>
            <? endif; ?>
            <? if ($this->theme->tree_content_layout == 'col-right') : ?>
                <?= $this->render("@app/views/include/col-left"); ?>
            <? endif; ?>
            <? if ($this->theme->tree_content_layout == 'no-col') : ?>

            <? endif; ?>
            <? if ($this->theme->tree_content_layout == 'col-left-right') : ?>
                <?= $this->render("@app/views/include/col-left"); ?>
            <? endif; ?>
        </div>
    </div>

</section>

