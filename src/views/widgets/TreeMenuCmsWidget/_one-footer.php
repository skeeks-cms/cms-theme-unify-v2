<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget */
/* @var $model   \skeeks\cms\models\Tree */
?>

<li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
    <h4 class="h6 g-pr-20 mb-0">

        <a class="g-color-black" href="<?= $model->url; ?>" title="<?= $model->name; ?>">
            <i class="fa fa-angle-right"></i>
            <?= $model->name; ?></a>
    </h4>
</li>