<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
\skeeks\cms\themes\unify\assets\VanillaLazyLoadAsset::register($this);
\skeeks\cms\themes\unify\assets\components\UnifyThemeStickAsset::register($this);

$this->registerCss(<<<CSS
.sx-content-section {
    padding: 4rem 0 !important;
}
.sx-content-section .sx-slider-block {
    margin-top: 2rem;
}
CSS
);
?>

<?php echo $this->render("@app/views/include/_content-image", ['model' => $model]); ?>

<div class="sx-child-bg-2n">
<?php if ($model->activeChildren) : ?>
    <?php 
    $counter = 0;
    foreach ($model->activeChildren as $activeChild) : ?>
    <?php
        $counter ++;    
    ?>
        <div class="sx-content-section" id="location">
            <div class="sx-container container">
                <div class="row">
                    <div class="col-12">
                        <div class="h2"><?php echo $activeChild->seoName; ?></div>
                    </div>
                </div>
                <?php if($activeChild->description_short) : ?>
                    <div class="row sx-short-description">
                        <div class="col-12 col-sm-6">
                            <?php echo $activeChild->description_short; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="row sx-slider-block">
                    <div class="col-12 col-sm-4 <?php echo $counter % 2 == 0 ? "order-sm-1" : "order-sm-2"; ?>  my-auto">
                        <div class="sx-text-block">
                            <!--<div>
                               <img
                                        class="lazy sx-icon"
                                        style="aspect-ratio: 1/1;"
                                        src="<?php /*echo \Yii::$app->cms->image1px; */?>"
                                        data-src="<?php /*echo \common\themes\app\assets\AppThemeAsset::getAssetUrl("img/about/swim.svg"); */?>">
                            </div>-->
                            <!--<div class="h2">Заголовок</div>-->
                            <?php if($activeChild->description_full) : ?>
                                <div class="row sx-short-description">
                                    <div class="col-12">
                                        <?php echo $activeChild->description_full; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-12 col-sm-8 <?php echo $counter % 2 == 0 ? "order-sm-2" : "order-sm-1"; ?> my-auto">
                        <?php
                        if ($activeChild->images) : ?>
                            <div class="sx-stick-wrapper">
                            <div class="js-carousel sx-stick"
                                 data-slidesToShow="1"
                                 data-arrows-classes="g-color-primary--hover sx-arrows sx-color-silver"
                                 data-arrow-left-classes="hs-icon hs-icon-arrow-left sx-left"
                                 data-arrow-right-classes="hs-icon hs-icon-arrow-right sx-right"
                            >
                                <? foreach ($activeChild->images as $image) : ?>
                                    <div class="js-slide">
                                        <img
                                                class="img-fluid"
                                                style="aspect-ratio: <?php echo $image->image_width; ?>/<?php echo $image->image_height; ?>; width: 100%;"
                                                src="<?= \Yii::$app->imaging->thumbnailUrlOnRequest($image->src,
                                                    new \skeeks\cms\components\imaging\filters\Thumbnail([
                                                        'w' => 1000,
                                                        'h' => 0,
                                                        'm' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND,
                                                    ]), $activeChild->name
                                                ); ?>"
                                        >
                                    </div>
                                <? endforeach; ?>
                            </div>
                            </div>
                        <? else : ?>
                            <img
                                    class="lazy img-fluid"
                                    style="aspect-ratio: 1056/800; width: 100%;"
                                    src="<?php echo \Yii::$app->cms->image1px; ?>"
                                    data-src="https://imgholder.ru/1056x800/#c0c0c0/adb9ca&text=1056x800&font=kelson">
                        <? endif; ?>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

</div>