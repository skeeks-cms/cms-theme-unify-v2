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

<? echo \yii\widgets\ListView::widget([
    'dataProvider'      => $widget->dataProvider,
    'itemView'          => '_news-masonry-item',
    'emptyText'          => '',
    'options'           =>
    [
        'tag'   => 'div',
        'class'   => 'masonry-grid row g-mb-70',
    ],
    'itemOptions' => [
        'tag' => false
    ],
    'layout'            => "<div class=\"row\">{items}</div>"
])?>

<?/* if ($widget->enabledPjaxPagination = \skeeks\cms\components\Cms::BOOL_Y) : */?><!--
    <?/* \skeeks\cms\modules\admin\widgets\Pjax::end(); */?>
--><?/* endif; */?>


