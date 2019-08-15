<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */
?>

<? echo \yii\widgets\ListView::widget([
    'dataProvider' => $widget->dataProvider,
    'itemView' => '_widget-item',
    'emptyText' => '',
    'options' =>
        [
            'tag' => false
        ],
    'itemOptions' => [
        'tag' => 'div',
        'class' => 'item row g-mb-20'
    ],
    'pager'        => [
        'class' => \skeeks\cms\themes\unify\widgets\ScrollAndSpPager::class
    ],
    'layout' => "<div class=\"row\"><div class=\"col-md-12\">{summary}</div></div>
<div class=\"no-gutters list-view\">{items}</div>
<div class=\"row\"><div class=\"col-md-12\">{pager}</div></div>"
]) ?>
