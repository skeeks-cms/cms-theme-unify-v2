<?
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */
?>
<? if ($widget->dataProvider->query->count()) : ?>
    <?
    /* @var $this yii\web\View */
    \skeeks\assets\unify\base\UnifyHsCarouselAsset::register($this);
    $this->registerJs(<<<JS
//$.HSCore.components.HSCarousel.init('.js-carousel');
JS
    );

    ?>
    <div class="js-carousel" 
         data-infinite="true" 
         data-autoplay="true" 
         data-speed="7000" 
         data-lazy-load="progressive"
         data-pagi-classes="u-carousel-indicators-v31 g-absolute-centered--x g-bottom-0 text-center g-mb-10"
         data-arrows-classes="u-arrow-v1 g-brd-around g-brd-white g-absolute-centered--y g-width-45 g-height-45 g-font-size-25 g-color-white g-color-primary--hover rounded-circle"
         data-arrow-left-classes="fa fa-angle-left g-left-5"
         data-arrow-right-classes="fa fa-angle-right g-right-5"
    >
        <? foreach ($widget->dataProvider->query->orderBy([$widget->orderBy => $widget->order])->all() as $model) : ?>
            <div class="js-slide">
                <img src="<?= $model->image->src; ?>" alt=" " class="img-fluid">
            </div>
        <? endforeach; ?>
    </div>
<? endif; ?>
