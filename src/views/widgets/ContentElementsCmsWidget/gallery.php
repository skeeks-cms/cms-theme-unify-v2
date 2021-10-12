<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */
\skeeks\cms\themes\unify\assets\components\UnifyThemeSubcatalogAsset::register($this);
?>

<?/* if ($widget->enabledPjaxPagination = \skeeks\cms\components\Cms::BOOL_Y) : */?><!--
    <?/* \skeeks\cms\modules\admin\widgets\Pjax::begin(); */?>
--><?/* endif; */?>
<? echo \yii\widgets\ListView::widget([
    'dataProvider'      => $widget->dataProvider,
    'itemView'          => '_gallery-item',
    'emptyText'          => '',
    'options'           => [
        'tag'   => 'div',
        'class'   => 'row list-inline nomargin',
    ],
    'itemOptions' => [
        'tag' => false
    ],
    'layout'            => "\n{items}<div class='col-12'>{summary}</div>\n<p class=\"row\">{pager}</p>"
]); ?>

<?/* if ($widget->enabledPjaxPagination = \skeeks\cms\components\Cms::BOOL_Y) : */?><!--
    <?/* \skeeks\cms\modules\admin\widgets\Pjax::end(); */?>
--><?/* endif; */?>


