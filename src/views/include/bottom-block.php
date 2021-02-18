<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
$this->registerCss(<<<CSS
.sx-bottom-second-page-block {
    border: solid 10px #eee;
    margin-top: 20px;
    padding: 30px;
    background: white;
}


CSS
);
?>
<? if ($this->theme->isShowBottomBlock) : ?>
    <section class="sx-bottom-second-page-block">
        <div class="row">
            <div class="col-md-9 align-self-center">
                <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('bottom-block-title'); ?>
                <div class="h4 sx-head-block">Остались вопросы?</div>
                <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>

                <?php if(\Yii::$app->skeeks->site->cmsSitePhone) : ?>
                    <p class="lead"><i class="g-color-black icon-phone g-font-size-24 g-valign-middle g-color-primary g-mr-10"></i> Звоните по телефону:
                        <a href="tel:<?= \Yii::$app->skeeks->site->cmsSitePhone->value; ?>" class="g-font-weight-400 g-color-primary--hover g-text-underline--none--hover" style="font-size: 16px;"><?= \Yii::$app->skeeks->site->cmsSitePhone->value; ?></a>
                    </p>
                <?php endif; ?>
                
                <?php if(\Yii::$app->skeeks->site->cmsSiteEmail) : ?>
                    <p class="lead">
                        <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('bottom-block-phone-icon'); ?>
                        <i class="g-color-black icon-envelope g-font-size-24 g-valign-middle g-color-primary g-mr-10"></i>
                        <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>

                        <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('bottom-block-phone-text'); ?>
                        Пишите на электронную почту:
                        <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>
                        <a href="mailto:<?= \Yii::$app->skeeks->site->cmsSiteEmail->value; ?>" class="g-font-weight-400 g-color-primary--hover g-text-underline--none--hover" style="font-size: 16px;"><?= \Yii::$app->skeeks->site->cmsSiteEmail->value; ?></a>
                    </p>
                <?php endif; ?>
                
                <p class="lead">
                    <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('bottom-block-bottom-icon'); ?>
                    <i class="g-color-black icon-question g-font-size-24 g-valign-middle g-color-primary g-mr-10"></i>
                    <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>
                    
                    <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('bottom-block-bottom'); ?>
                    Смотрите <a href="/populyarnye-voprosy" class="g-font-weight-400 g-color-primary--hover g-text-underline--none--hover">популярные вопросы</a> прямо у нас на сайте
                    <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>
                </p>
            </div>

            <div class="col-md-3 align-self-center text-md-right">
                <a class="btn btn-lg u-btn-primary sx-btn-phone" href="#sx-callback" data-toggle="modal" data-target="#sx-callback">Заказать звонок</a>
            </div>
        </div>
    </section>
<? endif; ?>
