<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
/* @var $model \skeeks\cms\models\CmsTree */
if (!$model->meta_title) {
    $this->title = $this->theme->title;
}
?>
<? if ($this->theme->isBoxed) : ?>
<div class="container">
<div class="col-md-12">
<? endif; ?>
<?
    $content = \skeeks\cms\models\CmsContent::find()->where(['code' => 'slide'])->one();
?>
<?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
    'namespace' => 'home-slider',
    'enabledCurrentTree' => 'N',
    'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
    'content_ids' => [
        $content ? $content->id : ""
    ],
    'viewFile'  => '@app/views/widgets/ContentElementsCmsWidget/slider-revo',
]); ?>
<? if ($this->theme->isBoxed) : ?>
</div>
</div>
<? endif; ?>
