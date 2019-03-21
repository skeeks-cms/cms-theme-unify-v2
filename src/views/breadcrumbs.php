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
if (!isset($isShowH1)) {
    $isShowH1 = true;
}
if (!isset($isShowLast)) {
    $isShowLast = false;
}
?>
<section class="g-pb-0">
    <div class="g-bg-cover__inner">
        <? if (count(\Yii::$app->breadcrumbs->parts) > 1) : ?>
            <? $count = count(\Yii::$app->breadcrumbs->parts); ?>
            <? $counter = 0; ?>
            <ul class="u-list-inline">
                <? foreach (\Yii::$app->breadcrumbs->parts as $data) : ?>
                    <? $counter++; ?>
                    <? if ($counter == $count): ?>
                        <? if ($isShowLast) : ?>
                            <li class="list-inline-item">
                                <span><?= $data['name']; ?></span>
                            </li>
                        <? endif; ?>
                    <? else : ?>
                        <li class="list-inline-item g-mr-7">
                            <a href="<?= $data['url']; ?>" class="u-link-v5 g-color-main" title="<?= $data['name']; ?>"><?= $data['name']; ?></a>
                            <i class="fa fa-angle-right g-ml-7"></i>
                        </li>
                    <? endif; ?>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
        <? if ($isShowH1) : ?>
            <header class="g-mb-0">
                <h1 class="h1 g-color-gray-dark-v2 g-font-weight-600"><?= $title; ?></h1>
            </header>
        <? endif; ?>
    </div>
</section>