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
\skeeks\cms\themes\unify\assets\VanillaLazyLoadAsset::register($this);
?>


<div class="<?= $class; ?> item">
    <!-- Blog Background Overlay Blocks -->
    <a href="<?php echo $model->url; ?>" class="sx-item">
        <div class="sx-img-wrapper">
            <img class="img-fluid lazy"
                 style="aspect-ratio: 500/400; width: 100%;"
                 src="<?php echo \Yii::$app->cms->image1px; ?>"
                 data-src="<?= \Yii::$app->imaging->thumbnailUrlOnRequest($model->image ? $model->image->src : null,
                new \skeeks\cms\components\imaging\filters\Thumbnail([
                    'w' => 500,
                    'h' => 400,
                    'm' => \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND,
                ]), $model->code
            ) ?>" alt="<?= $model->name; ?>">
        </div>
        <div class="sx-info">
            <div class="sx-date"><?= \Yii::$app->formatter->asDate($model->published_at); ?></div>
            <div class="sx-title h4">
                <?= $model->name; ?>
            </div>
        </div>
    </a>
    <!-- End Blog Background Overlay Blocks -->
</div>




