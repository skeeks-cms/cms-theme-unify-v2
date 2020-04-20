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


<div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
    <div class="u-heading-v2-3--bottom g-mb-20">
        <div class="u-heading-v2__title h6 sx-footer-title mb-0"><?= $widget->label; ?></div>
    </div>

    <nav class="text-uppercase1">
        <ul class="list-unstyled g-mt-minus-10 mb-0">

            <? if ($trees = $widget->activeQuery->all()) : ?>
                <? foreach ($trees as $tree) : ?>
                    <?= $this->render("_one-footer", [
                        "widget" => $widget,
                        "model"  => $tree,
                    ]); ?>
                <? endforeach; ?>
            <? endif; ?>


        </ul>
    </nav>
</div>

