<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
if (!@$title) {
    if ($model) {
        $title = $model->name ? $model->name : $model->username;
    }
}
?>
<section class="g-pb-0">
    <div class="g-bg-cover__inner">
        <?= \skeeks\cms\cmsWidgets\breadcrumbs\BreadcrumbsCmsWidget::widget([
            'viewFile' => '@app/views/widgets/BreadcrumbsCmsWidget/default',
        ]); ?>
        <header class="g-mb-0">
            <h1 class="h1 g-color-gray-dark-v2 g-font-weight-600"><?= $title; ?></h1>
        </header>
    </div>
</section>