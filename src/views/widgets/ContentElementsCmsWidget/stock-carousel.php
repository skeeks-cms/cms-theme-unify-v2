<?
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */
\skeeks\assets\unify\base\UnifyHsCarouselAsset::register($this);
$this->registerJs(<<<JS
$.HSCore.components.HSCarousel.init('.js-carousel');
JS
);

?>

<? if ($widget->dataProvider->query->count()) : ?>
    <div class="js-carousel" data-infinite="true" data-autoplay="true" data-speed="7000" data-lazy-load="progressive" data-pagi-classes="u-carousel-indicators-v31 g-absolute-centered--x g-bottom-0 text-center">
        <? foreach ($widget->dataProvider->query->all() as $model) : ?>
            <div class="js-slide">
                <img src="<?= $model->image->src; ?>" alt=" ">
            </div>
        <? endforeach; ?>
    </div>
<? endif; ?>
