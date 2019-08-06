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

$absoluteBaseUrl = \yii\helpers\Url::base(true);

?>
<section class="g-pb-0">
    <div class="g-bg-cover__inner sx-breadcrumbs-wrapper" >
        <? if (count(\Yii::$app->breadcrumbs->parts) > 1) : ?>
            <? $count = count(\Yii::$app->breadcrumbs->parts); ?>
            <? $counter = 0; ?>
            <ul class="u-list-inline" itemscope itemtype="http://schema.org/BreadcrumbList">
                <? foreach (\Yii::$app->breadcrumbs->parts as $data) : ?>
                    <? $counter++; ?>
                    <? if ($counter == $count): ?>
                        <? if ($isShowLast) : ?>
                            <li class="list-inline-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <span><?= $data['name']; ?></span>
                                <meta itemprop="item" content="<?=  $absoluteBaseUrl.$data['url']; ?>">
                                <meta itemprop="name" content="<?= $data['name']; ?>">
                                <meta itemprop="position" content="<?=$counter;?>" />
                            </li>
                        <? endif; ?>
                    <? else : ?>
                        <li class="list-inline-item g-mr-7" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <meta itemprop="item" content="<?=  $absoluteBaseUrl.$data['url']; ?>">
                            <meta itemprop="name" content="<?= $data['name']; ?>">
                            <a href="<?= $data['url']; ?>" class="u-link-v5 g-color-main" title="<?= $data['name']; ?>"><?= $data['name']; ?></a>
                            <i class="fa fa-angle-right g-ml-7"></i>
                            <meta itemprop="position" content="<?=$counter;?>" />
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