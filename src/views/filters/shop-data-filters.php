<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 13.11.2017
 */
/* @var $this yii\web\View */
/* @var $handler \skeeks\cms\shop\queryFilter\ShopDataFiltersHandler */
/* @var $widget \skeeks\cms\eavqueryfilter\CmsEavQueryFilterHandler */
/* @var $form \yii\widgets\ActiveForm */
/* @var $code string */
$widget = $this->context;
?>


<? if ($options = $handler->getBrandOptions()) : ?>
    <? if (count($options) > 0) : ?>

        <?
        $values = $handler->brand_id;
        $class = '';

        if ($values) {
            $class = 'opened sx-filter-selected';

            $newOptions = [];
            foreach ($values as $value) {
                $newOptions[$value] = \yii\helpers\ArrayHelper::getValue($options, $value);
                unset($options[$value]);
            }
            if ($newOptions) {
                $options = \yii\helpers\ArrayHelper::merge($newOptions, $options);
            }
        }

        $info = '';
        //$info = "<i class='far fa-question-circle' data-toggle='tooltip' title='{$rp->hint}'></i>";

        $searchOptions = "";
        if (count($options) > 3) {
            $searchOptions = <<<HTML
<div class="filter-search__input js-filter-search-hide" style="display: none;">
    <input type="text" class="form-control" placeholder="Введите название">
</div>
HTML;

        }

        ?>

        <?
        $classCss = 'js-scrollbar-native';
        if (\Yii::$app->mobileDetect->isMobile) {
            $classCss = 'js-scrollbar-native';
        } else {
            $classCss = 'js-scrollbar-native';
        }
        echo $form->field($handler, "brand_id", [
            'options'  => [
                'class' => 'filter--group sx-filter '.$class,
                'tag'   => 'section',
            ],
            'template' => <<<HTML
<header class="filter--group--header">Бренд {$info}</header>
<div>
    <div class="filter--group--body">
        {$searchOptions}
        <div class="{$classCss}">
        {input}
        </div>
    </div>
    <div class="sx-btn-apply-wrapper">
        <button type="submit" class="btn btn-primary">Применить</button>
    </div>
</div>
HTML
            ,
        ])->checkboxList(
            $options
            , [
            'class' => 'sx-filters-checkbox-options filter--group--inner',
            'item'  => function ($index, $label, $name, $checked, $value) {
                $input = \yii\helpers\Html::checkbox($name, $checked, [
                    'id'    => 'filter-check-brand_id-'.$index,
                    'value' => $value,
                ]);
                return <<<HTML
<div class="checkbox">
{$input}
<label for="filter-check-brand_id-{$index}">{$label}</label>
</div>
HTML;

            },
        ]); ?>
    <? endif; ?>
<? endif; ?>



<? if ($options = $handler->getCountryOptions()) : ?>
    <? if (count($options) > 0) : ?>

        <?
        $values = $handler->country;
        $class = '';

        if ($values) {
            $class = 'opened sx-filter-selected';

            $newOptions = [];
            foreach ($values as $value) {
                $newOptions[$value] = \yii\helpers\ArrayHelper::getValue($options, $value);
                unset($options[$value]);
            }
            if ($newOptions) {
                $options = \yii\helpers\ArrayHelper::merge($newOptions, $options);
            }
        }

        $info = '';
        //$info = "<i class='far fa-question-circle' data-toggle='tooltip' title='{$rp->hint}'></i>";

        $searchOptions = "";
        if (count($options) > 3) {
            $searchOptions = <<<HTML
<div class="filter-search__input js-filter-search-hide" style="display: none;">
    <input type="text" class="form-control" placeholder="Введите название">
</div>
HTML;

        }

        ?>

        <?
        $classCss = 'js-scrollbar-native';
        if (\Yii::$app->mobileDetect->isMobile) {
            $classCss = 'js-scrollbar-native';
        } else {
            $classCss = 'js-scrollbar-native';
        }
        echo $form->field($handler, "country", [
            'options'  => [
                'class' => 'filter--group sx-filter '.$class,
                'tag'   => 'section',
            ],
            'template' => <<<HTML
<header class="filter--group--header">Страна {$info}</header>
<div>
    <div class="filter--group--body">
        {$searchOptions}
        <div class="{$classCss}">
        {input}
        </div>
    </div>
    <div class="sx-btn-apply-wrapper">
        <button type="submit" class="btn btn-primary">Применить</button>
    </div>
</div>
HTML
            ,
        ])->checkboxList(
            $options
            , [
            'class' => 'sx-filters-checkbox-options filter--group--inner',
            'item'  => function ($index, $label, $name, $checked, $value) {
                $input = \yii\helpers\Html::checkbox($name, $checked, [
                    'id'    => 'filter-check-country-'.$index,
                    'value' => $value,
                ]);
                return <<<HTML
<div class="checkbox">
{$input}
<label for="filter-check-country-{$index}">{$label}</label>
</div>
HTML;

            },
        ]); ?>
    <? endif; ?>
<? endif; ?>


