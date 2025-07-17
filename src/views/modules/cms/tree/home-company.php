<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
/* @var $model \skeeks\cms\models\CmsTree */
if (!$model->meta_title) {
    $this->title = $this->theme->title;
}
?>

<? if (!\Yii::$app->mobileDetect->isMobile) : ?>
    <?
    $content = \skeeks\cms\models\CmsContent::find()->where(['code' => 'slide'])->one();
    ?>
    <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
        'namespace'          => 'home-slider',
        'enabledCurrentTree' => 'N',
        'orderBy'            => 'priority',
        'order'              => SORT_ASC,
        'enabledRunCache'    => \skeeks\cms\components\Cms::BOOL_N,
        'content_ids'        => [
            $content ? $content->id : "",
        ],
        'viewFile'           => '@app/views/widgets/ContentElementsCmsWidget/slider-revo-no-full',
    ]); ?>
<? else : ?>
<? endif; ?>



<?= trim(\skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
    'namespace'       => 'home-sub-catalog',
    'viewFile'        => '@app/views/widgets/TreeMenuCmsWidget/home-sub-catalog',
    'treeParentCode'  => "services",
    'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
])); ?>


<div class="g-bg-img-hero" style="background-image: url(<?= \skeeks\cms\themes\unify\assets\UnifyThemeAsset::getAssetUrl('img/svg-bg3.svg'); ?>);">
    <div class="container g-pt-80">
        <div class="row g-pb-60">
            <div class="col-md-12 text-center">
                <h2 class="h1 text-uppercase sx-color-primary">Преимущества</h2>
            </div>
        </div>
        <?
        $contentFaq = \skeeks\cms\models\CmsContent::find()->where(['code' => 'advantage'])->one();
        ?>
        <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
            'enabledCurrentTree'      => 'N',
            'enabledSearchParams'     => 'N',
            'enabledCurrentTreeChild' => 'N',
            'namespace'               => 'home-advantage',
            'enabledPaging'           => \skeeks\cms\components\Cms::BOOL_N,
            'enabledRunCache'         => \skeeks\cms\components\Cms::BOOL_Y,
            'limit'                   => 12,
            'content_ids'             => [
                $contentFaq ? $contentFaq->id : "",
            ],
            'viewFile'                => '@app/views/widgets/ContentElementsCmsWidget/advantage-v1',
        ]); ?>
    </div>

    <div class="g-bg-img-hero g-pb-60 sx-actions" id="sx-sell">
        <div class="container">
            <!--<div class="row g-pb-20">
                <div class="col-md-12 text-center">
                    <h2 class="h1 text-uppercase sx-color-primary">Акции</h2>
                </div>
            </div>-->
            <?
            $contentFaq = \skeeks\cms\models\CmsContent::find()->where(['code' => 'stock'])->one();
            ?>
            <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                'enabledCurrentTree'      => 'N',
                'enabledSearchParams'     => 'N',
                'enabledCurrentTreeChild' => 'N',
                'namespace'               => 'home-stock',
                'enabledPaging'           => \skeeks\cms\components\Cms::BOOL_N,
                'enabledRunCache'         => \skeeks\cms\components\Cms::BOOL_N,
                'limit'                   => 12,
                'content_ids'             => [
                    $contentFaq ? $contentFaq->id : "",
                ],
                'viewFile'                => '@app/views/widgets/ContentElementsCmsWidget/stock-carousel',
            ]); ?>
        </div>
    </div>
</div>


<? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget("home-about-block"); ?>

<div class="g-bg-img-hero g-bg-secondary">
    <div class="container g-pt-40">

        <div class="row g-pb-60">
            <div class="col-md-12 text-center">
                <h2 class="h1 text-uppercase sx-color-primary">
                    О компании
                </h2>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 g-mb-30">
                <div class="h-100 g-bg-size-cover g-bg-pos-center g-bg-cover g-bg-black-opacity-0_4--after g-pos-rel g-py-150 g-mb-30 g-mb-0--lg" data-bg-img-src="/images/min/maxresdefault.jpg"
                     style="background-image: url(/images/min/maxresdefault.jpg);">
                    <article class="text-center g-absolute-centered--y g-z-index-1 g-px-50" style="width: 100%;">
                        <a class="js-fancybox d-inline-block g-text-underline--none--hover mb-3 sx-fancybox" target="_blank" href="https://www.youtube.com/embed/8RrylVCPp4E?autoplay=1"
                           data-src="https://www.youtube.com/embed/8RrylVCPp4E?autoplay=1" data-speed="350" data-caption="Video Popup">
                        <span class="u-icon-v3 u-icon-size--xl u-icon-scale-1_2--hover g-bg-primary g-color-white rounded-circle g-cursor-pointer">
                          <i class="g-font-size-17 g-pos-rel g-left-2 fa fa-play"></i>
                        </span>
                        </a>
                        <!--<h4 class="g-color-white">Top advisers in more displays of agreement with Unify Marketing</h4>-->
                    </article>
                </div>
            </div>
            <div class="col-md-6">

                <p class="lead">
                    Современное оформление, гармоничное сочетание красок, четкость деталей и формулировок, а также эксклюзивные идеи и оригинальный дизайн – это то, что создает Колорит-Принт для своих
                    постоянных клиентов.
                    Наш сплоченный и креативный коллектив работает на рынке 19 лет, и предоставляет профессиональные услуги в типографической сфере. Мы гарантируем безупречное качество, 100% воплощение ваших идей и
                    пожеланий, минимальные сроки выполнения, инновационные методы и техники, приемлемый спектр услуг и эффективную цифровую печать.
                </p>
            </div>
        </div>

    </div>
</div>

<? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>


<div class="g-bg-img-hero g-bg-secondary">
    <div class="container g-pt-20">
        <?
        $contentNews = \skeeks\cms\models\CmsContent::find()->where(['code' => 'review'])->one();
        ?>
        <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
            'namespace'   => 'review',
            'content_ids' => [
                $contentNews ? $contentNews->id : "",
            ],
            'viewFile'    => '@app/views/widgets/ContentElementsCmsWidget/slider-review',
        ]); ?>
    </div>
</div>


<?
//\skeeks\assets\unify\base\UnifyDzsparallaxerAsset::register($this);
\skeeks\assets\unify\base\UnifyHsCountersAsset::register($this);

$this->registerJs(<<<JS
var counters = $.HSCore.components.HSCounter.init('[class*="js-counter"]');
JS
);
?>

<? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget("home-why-we"); ?>

<section class="dzsparallaxer auto-init height-is-based-on-content" style="background: url(https://htmlstream.com/preview/unify-v2.6.2/assets/img/bg/pattern2.png);">
    <div class="container g-pt-80">

        <div class="row g-pb-60">
            <div class="col-md-12 text-center">
                <h2 class="h1 text-uppercase sx-color-primary">Почему выбирают нас?</h2>
            </div>
        </div>


        <div class="row text-center text-uppercase">
            <div class="col-lg-3 col-sm-6 g-mb-50">
                <div class="g-bg-black-opacity-0_8 g-color-white g-rounded-3 g-pa-30 g-bg-primary">
                    <div class="js-counter h2 g-font-weight-300 g-mb-10">980</div>
                    <h4 class="h5 g-font-weight-300">Заборов в сезон</h4>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 g-mb-50">
                <div class="g-bg-black-opacity-0_8 g-color-white g-rounded-3 g-pa-30 g-pl-10 g-pr-10 g-bg-primary">
                    <div class="js-counter h2 g-font-weight-300 g-mb-10">3</div>
                    <h4 class="h5 g-font-weight-300">Года Гарантии</h4>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 g-mb-50">
                <div class="g-bg-black-opacity-0_8 g-color-white g-rounded-3 g-pa-30 g-bg-primary">
                    <div class="js-counter h2 g-font-weight-300 g-mb-10">9580</div>
                    <h4 class="h5 g-font-weight-300">Всего клиентов</h4>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 g-mb-50">
                <div class="g-bg-black-opacity-0_8 g-color-white g-rounded-3 g-pa-30 g-bg-primary">
                    <div class="js-counter h2 g-font-weight-300 g-mb-10">290</div>
                    <h4 class="h5 g-font-weight-300">Отзывов о нас</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>


<section class="promo-4 noborder g-bg-secondary g-pt-20 g-pb-20">
    <div class="container">
        <?= $this->render("@app/views/include/bottom-block"); ?>
    </div>
</section>

<section class="promo-4 noborder g-bg-secondary g-pt-20 g-pb-20">
    <div class="container">

        <?
        $contentNews = \skeeks\cms\models\CmsContent::find()->where(['code' => 'news'])->one();
        ?>
        <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
            'namespace'       => 'home-news',
            'enabledPaging'   => \skeeks\cms\components\Cms::BOOL_N,
            'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_Y,
            'limit'           => 12,
            'content_ids'     => [
                $contentNews ? $contentNews->id : "",
            ],
            'viewFile'        => '@app/views/widgets/ContentElementsCmsWidget/news-masonry',
        ]); ?>

    </div>
</section>
