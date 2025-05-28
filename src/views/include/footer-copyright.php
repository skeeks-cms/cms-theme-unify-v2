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
            <div class="col-12 col-md-8 text-center text-md-left g-mb-10 g-mb-0--md">
                <div class="d-lg-flex">
                    <small class="d-block g-font-size-default g-mr-10 g-mb-10 g-mb-0--md" style="line-height:30px;">
                        <?
                        $year = \Yii::$app->formatter->asDate(time(), "php:Y");
                        $widget = \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('copy-address-text-v2');
                        $widget->descriptor->name = 'Блок с текстом о защите прав';
                        ?>
                        <?php echo $year; ?> &copy; <?= \Yii::t('skeeks/unify', 'All rights reserved'); ?>. <?= $this->theme->title; ?>.
                        <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?><br>
                        <div class="sx-legal-links" style="font-size: 0.8rem;"><a href="<?php echo \yii\helpers\Url::to(['/cms/legal/privacy-policy']); ?>">Политика конфиденциальности</a> | <a href="<?php echo \yii\helpers\Url::to(['/cms/legal/personal-data']); ?>">Обработки персональных данных</a></div>
                    </small>

                </div>
            </div>


            <div class="col-12 col-md-4 align-self-center">
                <? if ($this->theme->is_show_copyright) : ?>
                    <div class="float-md-right" style="text-align: center;">
                        <small>
                        <a href="https://skeeks.com/" style="text-align: center;" target="_blank" class="g-color-gray-dark-v4" title="<?= \Yii::t('skeeks/unify', 'Site development'); ?> - https://skeeks.com">
                            <img src="<?= \skeeks\cms\themes\unify\assets\UnifyThemeAsset::getAssetUrl('img/skeeks/logo.png') ?>" alt="<?= \Yii::t('skeeks/unify', 'Site development'); ?> - https://skeeks.com" width="30" height="33">
                            <span><?= \Yii::t('skeeks/unify', 'Site development'); ?> - SkeekS.com</span>
                        </a>
                        </small>
                    </div>
                <? endif; ?>
            </div>
        </div>
    </div>
</footer>
<!-- End Copyright Footer -->