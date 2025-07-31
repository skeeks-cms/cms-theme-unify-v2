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

<?/* if ($widget->enabledPjaxPagination = \skeeks\cms\components\Cms::BOOL_Y) : */?><!--
    <?/* \skeeks\cms\modules\admin\widgets\Pjax::begin(); */?>
--><?/* endif; */?>
<? if ($widget->dataProvider->query->count()) : ?>
<div class="sx-section">
    <div class="container">
<? echo \yii\widgets\ListView::widget([
    'dataProvider'      => $widget->dataProvider,
    'itemView'          => '_advantage-item',
    'emptyText'          => '',
    'options'           =>
    [
        'tag'   => 'div',
        'class'   => 'row no-gutters g-mt-20 g-mb-20',
    ],
    'itemOptions' => [
        'tag' => false
    ],
    'layout'            => "\n{items}"
])?>
        </div>
</div>
<? endif; ?>

<?/* if ($widget->enabledPjaxPagination = \skeeks\cms\components\Cms::BOOL_Y) : */?><!--
    <?/* \skeeks\cms\modules\admin\widgets\Pjax::end(); */?>
--><?/* endif; */?>


