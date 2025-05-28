<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */

$this->registerCss(<<<CSS
.sx-news .sx-item {
    color: var(--text-color);
}
.sx-news .sx-title {
    line-height: 1.1;
}
.sx-news .sx-date {
    opacity: 0.7;
}
.sx-news .item {
    margin-bottom: 2rem;
}
.sx-news .sx-img-wrapper img {
    border-radius: var(--base-radius);
}
.sx-news .sx-img-wrapper {
    border-radius: var(--base-radius);
}
.sx-news .sx-img-wrapper {
    margin-bottom: 0.5rem;
}
CSS
);
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
        'class'   => 'sx-news',
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


