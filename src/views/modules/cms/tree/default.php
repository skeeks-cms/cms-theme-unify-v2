<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>

<?php echo $this->render("@app/views/include/_content-image", ['model' => $model]); ?>

<section class="sx-contant-page" id="sx-page-<?php echo $model->id; ?>">
    <div class="container sx-container g-bg-white">
        <div class="row">
            <? if ($this->theme->tree_content_layout == 'col-left') : ?>
            <div class=" order-md-2 sx-content-col-main">
                <? endif; ?>
                <? if ($this->theme->tree_content_layout == 'col-right') : ?>
                <div class="sx-content-col-main">
                    <? endif; ?>
                    <? if ($this->theme->tree_content_layout == 'no-col') : ?>
                    <div class="col-md-12 g-py-20">
                        <? endif; ?>
                        <? if ($this->theme->tree_content_layout == 'col-left-right') : ?>
                        <div class="col-md-7  order-md-2 g-py-20">
                            <? endif; ?>

                            <? if (!$this->theme->is_image_body_begin) : ?>
                                <?= $this->render('@app/views/breadcrumbs', [
                                    'model' => $model,
                                ]); ?>
                            <? endif; ?>

                            <div class="sx-content sx-content-text">
                                <?= $model->description_full; ?>
                            </div>

                            <?
                            $contentFaq = \skeeks\cms\models\CmsContent::find()->where(['code' => 'faq'])->one();
                            ?>
                            <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                                'namespace'       => 'ContentElementsCmsWidget-faq',
                                'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
                                'content_ids'     => [
                                    $contentFaq ? $contentFaq->id : "",
                                ],
                                'viewFile'        => '@app/views/widgets/ContentElementsCmsWidget/faq',
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
                                'pageSize'    => 12,
                                'namespace'   => 'news',
                                'content_ids' => [
                                    $contentNews ? $contentNews->id : "",
                                ],
                                'viewFile'    => '@app/views/widgets/ContentElementsCmsWidget/'. ($this->theme->news_list_view ? $this->theme->news_list_view : "news"),
                            ]); ?>

                            <?
                            $contentNews = \skeeks\cms\models\CmsContent::find()->where(['code' => 'gallery'])->one();
                            ?>
                            <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                                'namespace'   => 'gallery',
                                'content_ids' => [
                                    $contentNews ? $contentNews->id : "",
                                ],
                                'viewFile'    => '@app/views/widgets/ContentElementsCmsWidget/gallery',
                            ]); ?>

                            <?
                            $contentNews = \skeeks\cms\models\CmsContent::find()->where(['code' => 'review'])->one();
                            ?>
                            <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                                'namespace'   => 'review',
                                'content_ids' => [
                                    $contentNews ? $contentNews->id : "",
                                ],
                                'viewFile'    => '@app/views/widgets/ContentElementsCmsWidget/review',
                            ]); ?>

                            <? if ($model->images) : ?>
                                <?= $this->render("@app/views/include/gallery", ['images' => $model->images]); ?>
                            <? endif; ?>
                            <?= $this->render("@app/views/include/bottom-block"); ?>
                        </div>


                        <? if ($this->theme->tree_content_layout == 'col-left') : ?>
                            <?= $this->render("@app/views/include/col-left"); ?>
                        <? endif; ?>
                        <? if ($this->theme->tree_content_layout == 'col-right') : ?>
                            <?= $this->render("@app/views/include/col-left"); ?>
                        <? endif; ?>
                        <? if ($this->theme->tree_content_layout == 'no-col') : ?>

                        <? endif; ?>
                        <? if ($this->theme->tree_content_layout == 'col-left-right') : ?>
                            <?= $this->render("@app/views/include/col-left"); ?>
                        <? endif; ?>


                    </div>
                </div>
</section>

