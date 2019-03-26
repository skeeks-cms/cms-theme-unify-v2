<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget */
/* @var $trees  \skeeks\cms\models\Tree[] */
?>

<ul class="navbar-nav text-uppercase g-font-weight-600 ml-auto u-nav-hover-v1" data-splitted-breakpoint="992">
    <? if ($trees = $widget->activeQuery->all()) : ?>
        <? foreach ($trees as $key => $tree) : ?>
            <?= $this->render("_one-menu-top", [
                "widget"        => $widget,
                "model"         => $tree,
            ]); ?>
        <? endforeach; ?>
    <? endif; ?>
</ul>
