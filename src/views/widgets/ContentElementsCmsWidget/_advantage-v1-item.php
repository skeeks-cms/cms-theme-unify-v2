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

<div class="col-lg-4 g-mb-80">
    <!-- Icon Blocks -->
    <div class="u-info-v2-2 text-center sx-color-primary">
        <div class="u-info-v2-2__item sx-brd-primary g-px-20 g-pb-30">
          <span class="u-icon-v1 u-icon-size--2xl g-line-height-1 g-pull-50x-up">
            <i class="<?= $model->relatedPropertiesModel->getAttribute('icon'); ?>"></i>
          </span>
            <h3 class="h5 g-font-weight-600 g-mt-minus-35 g-mb-10"><?= $model->name; ?></h3>
            <p class="mb-0"><?= $model->description_short; ?></p>
        </div>
    </div>
    <!-- End Icon Blocks -->
</div>

