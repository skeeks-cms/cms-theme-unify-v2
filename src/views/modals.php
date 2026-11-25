<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
?>

<?
$modal = \yii\bootstrap\Modal::begin([
    'header'       => \Yii::t('app', 'Заказ звонка'),
    'id'           => 'sx-callback',
    'toggleButton' => false,
    'size'         => \yii\bootstrap\Modal::SIZE_DEFAULT,
]);
?>
    <?= \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget::widget([
        'form_code' => 'callback',
        'namespace' => 'FormWidget-callback',
        'viewFile'  => 'with-messages'
        //'viewFile' => '@app/views/widgets/FormWidget/fiz-connect'
    ]); ?>

<? $modal::end(); ?>

<div style="display: none;"  itemscope itemtype="http://schema.org/Organization">
    <meta itemprop="name" content="<?= \yii\helpers\Html::encode(\Yii::$app->skeeks->site->name); ?>">
    <?php if(\Yii::$app->skeeks->site->cmsSitePhone) : ?>
        <meta itemprop="telephone" content="<?= \yii\helpers\Html::encode(\Yii::$app->skeeks->site->cmsSitePhone->value); ?>">
    <?php endif; ?>
    <?php if(\Yii::$app->skeeks->site->cmsSiteEmail) : ?>
        <meta itemprop="email" content="<?= \yii\helpers\Html::encode(\Yii::$app->skeeks->site->cmsSiteEmail->value); ?>">
    <?php endif; ?>
    <?php if(\Yii::$app->skeeks->site->cmsSiteAddress) : ?>
        <meta itemprop="address" content="<?= \yii\helpers\Html::encode(\Yii::$app->skeeks->site->cmsSiteAddress->value); ?>">
    <?php endif; ?>
    <link itemprop="url" href="<?= \yii\helpers\Url::home(true); ?>">
    <?php if ($this->theme->logo) : ?>
        <?php //Поисковикам нужен полный адрес картинки, а логотип в настройках темы часто относительный (/uploads/...) ?>
        <link itemprop="logo" href="<?= \yii\helpers\Html::encode(\yii\helpers\Url::to($this->theme->logo, true)); ?>">
        <link itemprop="image" href="<?= \yii\helpers\Html::encode(\yii\helpers\Url::to($this->theme->logo, true)); ?>">
    <?php endif; ?>
</div>
