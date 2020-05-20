<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>

<!-- Copyright Footer -->
<footer class="g-py-20 sx-footer-copyright">
    <div class="container sx-container">
        <div class="row">
            <div class="col-md-8 text-center text-md-left g-mb-10 g-mb-0--md">
                <div class="d-lg-flex">
                    <small class="d-block g-font-size-default g-mr-10 g-mb-10 g-mb-0--md" style="line-height:30px;">
                        <? 
                        $widget = \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('copy-address-text'); 
                        $widget->descriptor->name = 'Блок с текстом о защите прав';
                        ?>
                        2020 &copy; <?= \Yii::t('skeeks/unify', 'All rights reserved'); ?>. <?= $this->theme->title; ?>
                        <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>
                    </small>

                </div>
            </div>


            <div class="col-md-4 align-self-center">
                <? if ($this->theme->is_show_copyright) : ?>
                    <div class="float-right">
                        <a href="https://skeeks.com/" target="_blank" class="g-color-gray-dark-v4" title="<?= \Yii::t('skeeks/unify', 'Site development'); ?> - SkeekS.com">
                            <img src="<?= \skeeks\cms\themes\unify\assets\UnifyThemeAsset::getAssetUrl('img/skeeks/logo.png') ?>" alt="<?= \Yii::t('skeeks/unify', 'Site development'); ?> - SkeekS.com" width="30">
                            <span><?= \Yii::t('skeeks/unify', 'Site development'); ?> - SkeekS.com</span>
                        </a>
                        <a href="https://cms.skeeks.com/" target="_blank" class="g-color-gray-dark-v4" title="Yii2 cms">
                            <span>(Yii2 CMS)</span>
                        </a>
                    </div>
                <? endif; ?>
            </div>
        </div>
    </div>
</footer>
<!-- End Copyright Footer -->