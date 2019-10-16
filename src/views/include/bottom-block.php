<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>
<? if ($this->theme->isShowBottomBlock) : ?>
    <section class="g-brd-around g-brd-10 g-brd-gray-light-v4 g-pa-30 g-mt-20 g-bg-white">
        <div class="row">
            <div class="col-md-9 align-self-center">
                <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('bottom-block-title'); ?>
                <h3 class="h4">Остались вопросы?</h3>
                <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>

                <p class="lead g-mb-20 g-mb-0--md"><i class="g-color-black icon-phone g-font-size-24 g-valign-middle g-color-primary g-mr-10"></i> Звоните по телефону:
                    <a href="tel:<?= $this->theme->phone; ?>" class="g-font-weight-400 g-color-primary--hover g-text-underline--none--hover" style="font-size: 16px;"><?= $this->theme->phone; ?></a>
                </p>
                <p class="lead g-mb-20 g-mb-0--md"><i class="g-color-black icon-envelope g-font-size-24 g-valign-middle g-color-primary g-mr-10"></i> Пишите по электронной почте:
                    <a href="mailto:<?= $this->theme->email; ?>" class="g-font-weight-400 g-color-primary--hover g-text-underline--none--hover" style="font-size: 16px;"><?= $this->theme->email; ?></a>
                </p>
                <p class="lead g-mb-20 g-mb-0--md"><i class="g-color-black icon-question g-font-size-24 g-valign-middle g-color-primary g-mr-10"></i>
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
