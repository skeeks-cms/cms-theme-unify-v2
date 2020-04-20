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
        $title = isset($model->seoName) ? $model->seoName : $model->username;
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
    <div class="g-bg-cover__inner sx-breadcrumbs-wrapper">
        <? if (count(\Yii::$app->breadcrumbs->parts) > 1) : ?>
            <? $count = count(\Yii::$app->breadcrumbs->parts); ?>
            <? $counter = 0; ?>
            <ul class="u-list-inline" itemscope itemtype="http://schema.org/BreadcrumbList">
                <? foreach (\Yii::$app->breadcrumbs->parts as $data) : ?>
                    <? $counter++; ?>
                    <? if ($counter == $count): ?>
                        <? if ($isShowLast) : ?>
                            <li class="list-inline-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <span itemprop="name"><?= $data['name']; ?></span>
                                <link itemprop="item" href="<?= $data['url']; ?>">
                                <meta itemprop="position" content="<?= $counter; ?>" />
                            </li>
                        <? endif; ?>
                    <? else : ?>
                        <li class="list-inline-item g-mr-7" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="<?= $data['url']; ?>" class="u-link-v5 sx-main-text-color g-color-primary--hover g-text-underline--none--hover" title="<?= $data['name']; ?>"><?= $data['name']; ?></a>
                            <i class="fas fa-angle-right g-ml-7"></i>
                            <meta itemprop="name" content="<?= $data['name']; ?>">
                            <meta itemprop="position" content="<?= $counter; ?>" />
                        </li>
                    <? endif; ?>
                <? endforeach; ?>
            </ul>
        <? endif; ?>
        <? if ($isShowH1) : ?>
            <header class="g-mb-0">
                <h1 class="sx-breadcrumbs-h1"><?= $title; ?></h1>
            </header>
        <? endif; ?>
    </div>
</section>