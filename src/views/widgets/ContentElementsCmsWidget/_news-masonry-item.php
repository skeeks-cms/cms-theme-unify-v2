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
/* @var $this yii\web\View */


$class = 'col-sm-4';
if ($this->theme->news_list_count_columns == 2) {
    $class = 'col-sm-6';
}
if ($this->theme->news_list_count_columns == 3) {
    $class = 'col-sm-4';
}
if ($this->theme->news_list_count_columns == 4) {
    $class = 'col-sm-3';
}
?>


<div class="masonry-grid-item <?= $class; ?> g-mb-30 item">
    <!-- Blog Background Overlay Blocks -->
    <article class="u-block-hover">
        <div class="g-bg-cover g-bg-white-gradient-opacity-v1--after">
            <img class="u-block-hover__main--mover-down" style="max-width: 100% !important;" src="<?= \Yii::$app->imaging->thumbnailUrlOnRequest($model->image ? $model->image->src : null,
                            new \skeeks\cms\components\imaging\filters\Thumbnail([
                                'w' => 350,
                                'h' => 350,
                            ]), $model->code
                        ) ?>" alt="<?= $model->name; ?>">
        </div>
        <div class="g-pos-abs g-top-0 g-right-0 g-z-index-1 g-pa-35">
            <span class="d-block g-color-white g-font-weight-600 g-font-size-12"><?= \Yii::$app->formatter->asDate($model->published_at); ?></span>
        </div>
        <div class="u-block-hover__additional--partially-slide-up g-z-index-1">
            <div class="u-block-hover__visible g-pa-25">
                <span class="d-block g-color-white-opacity-0_7 g-font-weight-600 g-font-size-12 mb-2"><?= $model->tree_id ? $model->cmsTree->name : ""; ?></span>
                <h2 class="h3 g-color-white g-font-weight-600 mb-3">
                    <a class="u-link-v5 g-color-white g-color-white--hover g-cursor-pointer" href="<?= $model->url; ?>"><?= $model->name; ?></a>
                </h2>
                <div class="g-color-white-opacity-0_7 mb-0"><?= $model->description_short; ?></div>
            </div>

            <div class="g-pl-25">
                <a class="d-inline-block g-brd-bottom g-brd-white g-color-white g-font-weight-600 g-font-size-12 text-uppercase g-text-underline--none--hover g-mb-30" href="<?= $model->url; ?>">
                    <?= Yii::t("skeeks/unify", "More"); ?>
                </a>
            </div>
        </div>
    </article>
    <!-- End Blog Background Overlay Blocks -->
</div>




