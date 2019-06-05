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
    <div class="container">
        <div class="row">
            <div class="col-md-9 order-md-2 g-py-20">
                <?= $this->render('@app/views/breadcrumbs', [
                    'model' => $model,
                ]) ?>
                <div class="g-color-gray-dark-v1 g-font-size-16 sx-content">
                    <?= $model->description_full; ?>
                </div>

                <?= trim(\skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
                'namespace'       => 'TreeMenuCmsWidget-sub-catalog',
                'viewFile'        => '@app/views/widgets/TreeMenuCmsWidget/sub-catalog',
                'treePid'         => $model->id,
                'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
            ])); ?>

                <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                    'namespace' => 'news',
                    'viewFile'  => '@app/views/widgets/ContentElementsCmsWidget/news',
                ]); ?>
                <? if ($model->images) : ?>
                    <?= $this->render("@app/views/include/gallery", ['images' => $model->images]); ?>
                <? endif; ?>
            </div>
            <?= $this->render("@app/views/include/col-left"); ?>
        </div>
    </div>
</section>

