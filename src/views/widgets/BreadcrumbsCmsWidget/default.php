<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\breadcrumbs\BreadcrumbsCmsWidget */

?>

<? if (count(\Yii::$app->breadcrumbs->parts) > 1) : ?>
    <? $count = count(\Yii::$app->breadcrumbs->parts); ?>
    <? $counter = 0; ?>
    <ul class="u-list-inline">
        <? foreach (\Yii::$app->breadcrumbs->parts as $data) : ?>
            <? $counter ++; ?>
            <? if ($counter == $count): ?>
                <li class="list-inline-item g-color-primary"><!--<span><?/*= $data['name']; */?></span>--></li>
            <? else : ?>
                <li class="list-inline-item g-mr-7">
                    <a href="<?= $data['url']; ?>" class="u-link-v5 g-color-main" title="<?= $data['name']; ?>"><?= $data['name']; ?></a>
                    <i class="fa fa-angle-right g-ml-7"></i>
                </li>
            <? endif;?>
        <? endforeach; ?>
    </ul>
<? endif;?>
