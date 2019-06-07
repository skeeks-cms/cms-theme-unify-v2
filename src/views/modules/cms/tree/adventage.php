<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>
<section class="g-mt-0 g-pb-0">
    <div class="container g-bg-white">
        <div class="row">
            <div class="col-md-9 order-md-2 g-py-20">
                <?= $this->render('@app/views/breadcrumbs', [
                    'model' => $model,
                ]) ?>
                <div class="g-color-gray-dark-v1 g-font-size-16 sx-content">
                    <?= $model->description_short; ?>
                </div>
                <?
                    $contentFaq = \skeeks\cms\models\CmsContent::find()->where(['code' => 'advantage'])->one();
                ?>
                <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                    'namespace' => 'advantage',
                    'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
                    'content_ids' => [
                        $contentFaq ? $contentFaq->id : ""
                    ],
                    'viewFile'  => '@app/views/widgets/ContentElementsCmsWidget/advantage',
                ]); ?>

                <div class="g-color-gray-dark-v1 g-font-size-16 sx-content">
                    <?= $model->description_full; ?>
                </div>


                <?
                    $contentFaq = \skeeks\cms\models\CmsContent::find()->where(['code' => 'faq'])->one();
                ?>
                <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                    'namespace' => 'ContentElementsCmsWidget-faq',
                    'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
                    'content_ids' => [
                        $contentFaq ? $contentFaq->id : ""
                    ],
                    'viewFile'  => '@app/views/widgets/ContentElementsCmsWidget/faq',
                ]); ?>


                <?= trim(\skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
                    'namespace'       => 'TreeMenuCmsWidget-sub-catalog',
                    'viewFile'        => '@app/views/widgets/TreeMenuCmsWidget/sub-catalog',
                    'treePid'         => $model->id,
                    'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
                ])); ?>

                <?
                    $contentNews = \skeeks\cms\models\CmsContent::find()->where(['code' => 'news'])->one();
                ?>
                <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                    'namespace' => 'news',
                    'content_ids' => [
                        $contentNews ? $contentNews->id : ""
                    ],
                    'viewFile'  => '@app/views/widgets/ContentElementsCmsWidget/news',
                ]); ?>

                <?
                    $contentNews = \skeeks\cms\models\CmsContent::find()->where(['code' => 'gallery'])->one();
                ?>
                <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                    'namespace' => 'gallery',
                    'content_ids' => [
                        $contentNews ? $contentNews->id : ""
                    ],
                    'viewFile'  => '@app/views/widgets/ContentElementsCmsWidget/gallery',
                ]); ?>

                <?
                    $contentNews = \skeeks\cms\models\CmsContent::find()->where(['code' => 'review'])->one();
                ?>
                <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                    'namespace' => 'review',
                    'content_ids' => [
                        $contentNews ? $contentNews->id : ""
                    ],
                    'viewFile'  => '@app/views/widgets/ContentElementsCmsWidget/review',
                ]); ?>

                <? if ($model->images) : ?>
                    <?= $this->render("@app/views/include/gallery", ['images' => $model->images]); ?>
                <? endif; ?>
                <?= $this->render("@app/views/include/bottom-block"); ?>
            </div>
            <?= $this->render("@app/views/include/col-left"); ?>
        </div>
    </div>
</section>

