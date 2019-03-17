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


<ul class="list-unstyled mb-0">

    <? if ($trees = $widget->activeQuery->all()) : ?>
        <? foreach ($trees as $tree) : ?>
            <?= $this->render("_one-footer", [
                "widget" => $widget,
                "model"  => $tree,
            ]); ?>
        <? endforeach; ?>
    <? endif; ?>


</ul>


