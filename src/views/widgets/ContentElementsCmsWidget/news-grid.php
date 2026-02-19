<? 
\skeeks\cms\themes\unify\assets\VanillaLazyLoadAsset::register($this);
echo \yii\widgets\ListView::widget([
    'dataProvider'      => $widget->dataProvider,
    'itemView'          => '_news-grid-item',
    'emptyText'          => '',
    'options'           =>
    [
        'tag'   => 'div',
        'class'   => 'sx-news-grid sx-news',
    ],
    'itemOptions' => [
        'tag' => false,
    ],
    //'layout'            => "\n{items}{summary}\n<p class=\"row\">{pager}</p>",
    'layout'       => '
<div class="row list-view">{items}</div>
<div class="row"><div class="col-md-12">{pager}</div></div>',
    /*'pager'        => [
        'class' => \skeeks\cms\themes\unify\widgets\ScrollAndSpPager::class
    ],*/
]);
?>