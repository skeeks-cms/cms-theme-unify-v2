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

<li class="g-mb-8">
    <a class="g-color-white-opacity-0_8" href="<?= $model->url; ?>" title="<?= $model->name; ?>">
        <?= $model->name; ?></a>
</li>