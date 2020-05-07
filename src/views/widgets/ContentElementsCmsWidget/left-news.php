<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */
?>

<? /* if ($widget->enabledPjaxPagination = \skeeks\cms\components\Cms::BOOL_Y) : */ ?><!--
    <? /* \skeeks\cms\modules\admin\widgets\Pjax::begin(); */ ?>
--><? /* endif; */ ?>

<? if ($widget->dataProvider->query->count()) : ?>

    <div class="g-bg-secondary  g-mb-20">

            <div class="u-heading-v3-1 g-mb-10">
                <h2 class="h5 u-heading-v3__title sx-col-left-title g-brd-primary"><?= $widget->label; ?></h2>
            </div>

            <? echo \yii\widgets\ListView::widget([
                'dataProvider' => $widget->dataProvider,
                'itemView'     => '_left-news-item',
                'emptyText'    => '',
                'options'      =>
                    [
                        'tag' => 'div',
                    ],
                'itemOptions'  => [
                    'tag' => false,
                ],
                'layout'       => "\n{items}",
            ]); ?>

    </div>
<? endif; ?>


<? /* if ($widget->enabledPjaxPagination = \skeeks\cms\components\Cms::BOOL_Y) : */ ?><!--
    <? /* \skeeks\cms\modules\admin\widgets\Pjax::end(); */ ?>
--><? /* endif; */ ?>


