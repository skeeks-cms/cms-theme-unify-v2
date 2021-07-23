<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */


$layout = "{items}";
if ($widget->enabledPaging == \skeeks\cms\components\Cms::BOOL_Y) {
    $layout = "<div class=\"row\">{items}</div><div class=\"row\"><div class=\"col-sm-12\">{summary}{pager}</div></div>";
}
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
        'class'   => 'masonry-grid',
    ],
    'itemOptions' => [
        'tag' => false
    ],
    'layout'       => '
<div class="row list-view">{items}</div>
<div class="row"><div class="col-md-12">{pager}</div></div>',
    'pager'        => [
        'class' => \skeeks\cms\themes\unify\widgets\ScrollAndSpPager::class
    ],
])?>

<?/* if ($widget->enabledPjaxPagination = \skeeks\cms\components\Cms::BOOL_Y) : */?><!--
    <?/* \skeeks\cms\modules\admin\widgets\Pjax::end(); */?>
--><?/* endif; */?>


