<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 06.03.2015
 *
 * @var \v3toys\skeeks\models\V3toysProductContentElement $model
 *
 */
/* @var $this yii\web\View */
/* @var $shopProduct \skeeks\cms\shop\models\ShopProduct */

if ($opacity = $model->relatedPropertiesModel->getAttribute("opacity")) {
    $this->registerCss(<<<CSS
#js-slide-{$model->id} .sx-slide-item:after {
    background-color: rgb(0 0 0 / {$opacity}%) !important;
}
.sx-slide-item::after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
CSS
    );
}


?>
<div class="js-slide" id="js-slide-<?php echo $model->id; ?>">
    <div class="">
        <!-- Product -->
        <figure class="g-pos-rel">



            <div class="sx-slide-item">

                <?php if ($model->image) : ?>

                    <?php if ($url = $model->relatedPropertiesModel->getAttribute("url")) : ?>
                        <a href="<?php echo $url; ?>">
                    <?php endif; ?>

                        <img class="img-fluid lazy" style="width: 100%; aspect-ratio: 1920/500;"
                         src="<?php echo \Yii::$app->cms->image1px; ?>"
                         data-src="<?= \Yii::$app->imaging->thumbnailUrlOnRequest($model->image ? $model->image->src : null,
                                 new \skeeks\cms\components\imaging\filters\Thumbnail([
                                     'w' => 1920,
                                     'h' => 500,
                                     'm' => \Imagine\Image\ImageInterface::THUMBNAIL_INSET,
                                 ]), $model->code
                             ); ?>">
                            
                    <?php if ($url) : ?>
                        </a>
                    <?php endif; ?>

                <?php endif; ?>



                <?php if ($video = $model->relatedPropertiesModel->getAttribute("video")) : ?>
                    <?
                    $videoFile = \skeeks\cms\models\CmsStorageFile::findOne($video);
                    ?>
                    <?php if ($videoFile) : ?>

                        <video
                                style="
        position: absolute;
        /*width: 100%;
min-width: 100%;*/
    width: 100%;
    max-height: 100vh;
max-width: none;
"
                                loop="loop" autoplay="" muted=""

                        >
                            <source type="video/mp4" src="<?php echo trim($videoFile->src); ?>"/>
                        </video>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="sx-container">
                    <div class="slider-content">
                        <!--<div class="sx-title h1"><?php /*echo $model->name; */?></div>-->
                        <?php if ($model->description_short) : ?>
                            <div class="sx-description"><?php echo $model->description_short; ?></div>
                        <?php endif; ?>
                        <?php if ($url = $model->relatedPropertiesModel->getAttribute('url')) : ?>
                            <div class="sx-url">
                                <a href="<?php echo $url; ?>" style="color: white; border-bottom: 1px solid;"><?php echo \Yii::t("app", "Подробнее"); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </figure>
    </div>
</div>
