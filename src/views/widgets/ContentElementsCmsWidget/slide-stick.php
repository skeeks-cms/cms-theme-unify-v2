<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget */
$query = $widget->dataProvider->query;
\skeeks\cms\themes\unify\assets\components\UnifyThemeStickAsset::register($this);
?>
<? if ($query->count()) : ?>

    <? if ($widget->label) : ?>
        <div class="text-center mx-auto g-max-width-600 g-mb-20">
            <h2 class="g-color-gray-dark-v2 mb-4"><?= $widget->label; ?></h2>
            <!--<p class="lead">We want to create a range of beautiful, practical and modern outerwear that doesn't cost the earth – but let's you still live life in style.</p>-->
        </div>
    <? endif; ?>

    <? echo \yii\widgets\ListView::widget([
        'dataProvider' => $widget->dataProvider,
        'itemView'     => 'slide-stick-item',
        'emptyText'    => '',
        'options'      => [
            'class' => 'js-carousel sx-stick sx-stick-slider-home-v2',
            'tag'   => 'div',
            'data'  => [
                'slidesToShow' => 1,
                'infinite' => "true",
                'autoplay' => "true",
                'autoplaySpeed' => 6000,
                "arrows-classes" => "g-color-primary--hover sx-arrows sx-color-silver",
                "arrow-left-classes" => "hs-icon hs-icon-arrow-left sx-left d-none d-sm-block",
                "arrow-right-classes" => "hs-icon hs-icon-arrow-right sx-right d-none d-sm-block",
            ],
        ],
        'itemOptions'  => [
            'tag' => false,
        ],
        'layout'       => '{items}',
    ]) ?>

<? endif; ?>