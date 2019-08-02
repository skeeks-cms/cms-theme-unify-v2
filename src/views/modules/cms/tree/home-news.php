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
<?
$content = \skeeks\cms\models\CmsContent::find()->where(['code' => 'slide'])->one();
?>
<?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
    'namespace'          => 'home-slider',
    'enabledCurrentTree' =>  \skeeks\cms\components\Cms::BOOL_N,
    'orderBy'            => 'priority',
    'order'              => SORT_ASC,
    'enabledRunCache'    => \skeeks\cms\components\Cms::BOOL_Y,
    'content_ids'        => [
        $content ? $content->id : "",
    ],
    'viewFile'           => '@app/views/widgets/ContentElementsCmsWidget/slider-revo',
]); ?>

<? if ($model->description_full) : ?>
    <div class="container">
        <header class="g-mt-20">
            <?=$model->description_full; ?>
        </header>
    </div>
<? endif; ?>

<section class="promo-4 noborder g-bg-secondary g-pt-20 g-pb-20">
    <div class="container">

        <?
        $contentNews = \skeeks\cms\models\CmsContent::find()->where(['code' => 'news'])->one();
        ?>
        <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
            'namespace'   => 'home-news',
            'enabledPaging'       =>  \skeeks\cms\components\Cms::BOOL_N,
            'enabledRunCache'                =>  \skeeks\cms\components\Cms::BOOL_Y,
            'limit'       => 12,
            'content_ids' => [
                $contentNews ? $contentNews->id : "",
            ],
            'viewFile'    => '@app/views/widgets/ContentElementsCmsWidget/'.$this->theme->news_list_view,
        ]); ?>

    </div>
</section>

