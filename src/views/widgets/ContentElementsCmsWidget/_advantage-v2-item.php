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
?>


<div class="col-md-6 col-lg-3 col-6 g-mb-30">
    <!-- Icon Blocks -->
    <div class="text-center">
        <?php if($model->image) : ?>
            <img src="<?php echo \Yii::$app->imaging->thumbnailUrlOnRequest($model->image ? $model->image->src : null,
                    new \skeeks\cms\components\imaging\filters\Thumbnail([
                        'w' => 0,
                        'h' => 250,
                        'm' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET,
                    ]), $model->code
                ); ?>" class="img-fluid" />
        <?php else: ?>
            <span class="u-icon-v2 u-icon-size--3xl g-brd-7 g-brd-primary g-color-primary g-rounded-50x g-mb-25">
            <i class="<?= $model->relatedPropertiesModel->getAttribute('icon'); ?>"></i>
          </span>
        <?php endif; ?>
        
      
      <h3 class="h5 g-color-black mb-25"><?= $model->name; ?></h3>
      <p class="g-color-gray-dark-v4 g-mb-0"><?= $model->description_short; ?></p>
    </div>
    <!-- End Icon Blocks -->
  </div>