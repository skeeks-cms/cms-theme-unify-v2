<?php
/**
 * @var
 */
?>

<? if ($this->theme->is_image_body_begin) : ?>

<?php
$heightRem = round($this->theme->body_begin_image_height_tree / 16);
$this->registerCss(<<<CSS
.justify-content-center {
    min-height: {$heightRem}rem;
    align-items: center;
}
.sx-breadcrumbs-wrapper i {
    color: white;
}

.g-bg-cover::after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
.sx-body-begin-image-wrapper::after {
    background-color: rgba(0, 0, 0, 0.3);
}

.sx-body-begin-image-wrapper {
    background-size: cover;
    position: relative;
}

.g-z-index-1 {
    z-index: 1;
    position: relative;
}
CSS
);

$image = $model->fullImage;
if (!$image || $image->image_width < 1920) {
    $image = $model->image;
}
?>
    <section class="g-bg-cover g-bg-size-cover sx-body-begin-image-wrapper g-flex-centered" data-bg-img-src="<?= ($image && $image->image_width >= 1920) ? \Yii::$app->imaging->thumbnailUrlOnRequest($image->src,
        new \skeeks\cms\components\imaging\filters\Thumbnail([
            'w' => 1920,
            'h' => $this->theme->body_begin_image_height_tree,
            'm' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND
        ]), $model->code
    ) : $this->theme->body_begin_no_image; ?>" style="background-position: center;">
        <div class="container sx-container text-center g-pos-rel g-z-index-1">
            <div class="row d-flex justify-content-center flex-wrap g-min-height-<?= $this->theme->body_begin_image_height_tree; ?>">
                <div class="col-lg-10 col-12">
                    <div class="mb-5">
                        <div class="lead g-color-white-opacity-0_8"><?= $this->render('@app/views/breadcrumbs', [
                                'model'    => $model,
                                'isShowH1' => false,
                            ]) ?>
                        </div>
                        <h1 class="g-color-white"><?= $model->seoName; ?></h1>
                        <!--<div class="lead g-color-white-opacity-0_8 sx-head-short-description"><?/*= $model->description_short; */?></div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>
