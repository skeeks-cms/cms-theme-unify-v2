<?
/* @var $this yii\web\View */
\skeeks\assets\unify\base\UnifyHsCarouselAsset::register($this);
$this->registerJs(<<<JS
$.HSCore.components.HSCarousel.init('.js-carousel');
JS
);

?>

<div id="carouselCus1" class="js-carousel g-pb-60" data-infinite="true" data-autoplay="true" data-speed="7000" data-lazy-load="progressive" data-slides-show="3"
     data-pagi-classes="u-carousel-indicators-v31 g-absolute-centered--x g-bottom-0 text-center" data-responsive='[{
     "breakpoint": 1200,
     "settings": {
       "slidesToShow": 4
     }
   }, {
     "breakpoint": 992,
     "settings": {
       "slidesToShow": 3
     }
   }, {
     "breakpoint": 768,
     "settings": {
       "slidesToShow": 2
     }
   }, {
     "breakpoint": 576,
     "settings": {
       "slidesToShow": 1
     }
   }]'>

    <? foreach ($widget->dataProvider->query->all() as $model) : ?>
        <div class="js-slide g-px-15 mb-1">
            <!-- Testimonials -->
            <blockquote class="u-blockquote-v8 g-font-weight-300 g-font-size-15 rounded g-pa-25 g-mb-25">
                <?= $model->description_short; ?>
            </blockquote>
            <div class="media">
                <img class="d-flex align-self-center rounded-circle u-shadow-v19 g-brd-around g-brd-3 g-brd-white g-width-50 mr-3" src="<?= \skeeks\cms\helpers\Image::getSrc(
                        \Yii::$app->imaging->thumbnailUrlOnRequest($model->image ? $model->image->src : null,
                            new \skeeks\cms\components\imaging\filters\Thumbnail([
                                'w' => 50,
                                'h' => 0,
                                'm' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET,
                            ]), $model->code
                        )); ?>" alt="<?= $model->name; ?>" alt="Image Description">
                <div class="media-body align-self-center">
                    <h4 class="g-color-black g-font-weight-600 g-font-size-15 g-mb-0"><?= $model->name; ?></h4>
                    <!--<span class="d-block g-color-gray-dark-v4 g-font-size-13">Reason: Template Quality</span>-->
                </div>
            </div>
            <!-- End Testimonials -->
        </div>
    <? endforeach; ?>

</div>