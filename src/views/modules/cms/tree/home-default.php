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
    'enabledCurrentTree' => 'N',
    'orderBy' => 'priority',
    'order' => SORT_ASC,
    'enabledRunCache'    => \skeeks\cms\components\Cms::BOOL_N,
    'content_ids'        => [
        $content ? $content->id : "",
    ],
    'viewFile'           => '@app/views/widgets/ContentElementsCmsWidget/slider-revo',
]); ?>


<? if ($model->description_full) : ?>
    <div class="container sx-content">
        <header class="g-mt-50">
            <?=$model->description_full; ?>
        </header>
    </div>
<? endif; ?>

<?= trim(\skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
    'namespace'       => 'home-sub-catalog',
    'viewFile'        => '@app/views/widgets/TreeMenuCmsWidget/home-sub-catalog',
    'treeParentCode'  => "services",
    'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
])); ?>


<section class="promo-4 noborder g-bg-secondary g-pt-20 g-pb-20">
    <div class="container">

        <?
        $contentFaq = \skeeks\cms\models\CmsContent::find()->where(['code' => 'advantage'])->one();
        ?>
        <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
            'enabledPaging'       => 'N',
            'namespace'       => 'advantage',
            'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_Y,
            'content_ids'     => [
                $contentFaq ? $contentFaq->id : "",
            ],
            'viewFile'        => '@app/views/widgets/ContentElementsCmsWidget/advantage',
        ]); ?>

    </div>
</section>


<section class="promo-4 noborder g-bg-secondary g-pt-20 g-pb-20">
    <div class="container">
        <?= $this->render("@app/views/include/bottom-block"); ?>
    </div>
</section>
<? if (!\Yii::$app->mobileDetect->isMobile) : ?>
<section class="promo-4 noborder p-y-0">
    <?= $this->theme->yandex_map; ?>
</section>
<? endif; ?>