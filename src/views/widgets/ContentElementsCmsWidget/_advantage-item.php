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
<!--g-brd-left--lg-->
<div class="col-lg-4 g-brd-gray-light-v4 g-px-40 g-mb-50 g-mb-0--lg">
    <div class="text-center">
        <? if ($model->relatedPropertiesModel->getAttribute('icon')) : ?>
            <span class="d-inline-block u-icon-v3 u-icon-size--xl g-bg-primary g-color-white rounded-circle" style="    width: 6.42857rem;
    height: 6.42857rem;
    font-size: 2.85714rem;
    margin-bottom: 30px;">
                  <!--<i class="icon-finance-086 u-line-icon-pro"></i>-->
                <i class="<?= $model->relatedPropertiesModel->getAttribute('icon'); ?>" style="    position: relative;
    top: 50%;
    -webkit-transform: translateY(-45%);
    -ms-transform: translateY(-45%);
    transform: translateY(-45%);
    display: block;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    z-index: 2;"></i>
            </span>
        <? elseif ($model->image) : ?>
            <span class="d-inline-block u-icon-v3 u-icon-size--xl g-bg-primary g-color-white rounded-circle g-mb-30" style="line-height: 80px;">
                <img height="50" src="<?= $model->image->src; ?>">
            </span>
        <? endif; ?>

        <h3 class="h5 g-color-gray-dark-v2 g-font-weight-600 text-uppercase mb-3"><?= $model->name; ?></h3>
        <p class="g-color-gray-dark-v4 g-line-height-1_8 mb-4">
        </p>
        <p><?= $model->description_short; ?></p>
    </div>
</div>

