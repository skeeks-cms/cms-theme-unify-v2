<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 13.11.2017
 */
/* @var $this yii\web\View */
/* @var $handler \skeeks\cms\queryFilters\EavFiltersHandler */
/* @var $form \yii\widgets\ActiveForm */
/* @var $code string */
$widget = $this->context;
?>
<? foreach ($handler->toArray() as $code => $value) : ?>

    <?
    $rp = $handler->getRPByCode($code);
    ?>
    <? if ($rp && in_array($rp->property_type, [
            \skeeks\cms\relatedProperties\PropertyType::CODE_NUMBER,
            \skeeks\cms\relatedProperties\PropertyType::CODE_RANGE,
        ])) : ?>
    <?
        $min = $handler->getMinValue($rp);
        $max = $handler->getMaxValue($rp);

        $val1Name = $handler->getAttributeNameRangeFrom($rp->id);
        $val1 = $handler->{$val1Name} ? $handler->{$val1Name} : $min;

        $val2Name = $handler->getAttributeNameRangeTo($rp->id);
        $val2 = $handler->{$val2Name} ? $handler->{$val2Name} : $max;

        $fromId = \yii\helpers\Html::getInputId($handler, $handler->getAttributeNameRangeFrom($rp->id));
        $toId = \yii\helpers\Html::getInputId($handler, $handler->getAttributeNameRangeTo($rp->id));
        $id = \yii\helpers\Html::getInputId($handler, $handler->getAttributeName($rp->id));

        ?>
        <? if ($min != $max
            //&& $max > 0
        ) : ?>

            <section class="filter--group <?= ($val1 != $min || $val2 != $max) ? "opened sx-filter-selected": ""?>">
                <header class="filter--group--header"><?= $rp->name; ?></header>
                <div class="filter--group--body">
                    <div class="filter--group--inner">
                        <input type="text"
                               id="<?= $id ?>"
                               class="range-slider"
                               data-no-submit="true"
                               data-type="double"
                               data-min="<?= $min ?>"
                               data-max="<?= $max ?>"
                               data-from="<?= $val1; ?>"
                               data-to="<?= $val2; ?>"
                               data-postfix=""/>


                        <div class="" style="display: none;">
                            <div class="col-md-6">
                                <?= $form->field($handler, $handler->getAttributeNameRangeFrom($rp->id))->textInput([
                                    'placeholder' => \Yii::$app->money->currencyCode,
                                    'id' => $id . '-from'
                                ])->label("От"); ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($handler, $handler->getAttributeNameRangeTo($rp->id))->textInput([
                                    'placeholder' => \Yii::$app->money->currencyCode,
                                    'id' => $id . '-to'
                                ])->label("До"); ?>
                            </div>
                        </div>

                        <? $this->registerJs(<<<JS
$('#{$id}').ionRangeSlider({
    onFinish: function (data) {
        $("#{$id}-from").val(data.from);
        $("#{$id}-to").val(data.to);
        $("#{$id}-to").change();
    }
});
JS
); ?>
                    </div>
                </div>
            </section>



            <!--<div class="sx-product-filter-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <label><?/*= $handler->getAttributeLabel($code); */?></label>
                    </div>

                    <div class="col-md-6">
                        <?/*= $form->field($handler, $handler->getAttributeNameRangeFrom($feature->id))
                            ->textInput(['placeholder' => $min])
                            ->label('От');
                        */?>
                    </div>
                    <div class="col-md-6">
                        <?/*= $form->field($handler, $handler->getAttributeNameRangeTo($feature->id))
                            ->textInput(['placeholder' => $max])
                            ->label('До');
                        */?>
                    </div>


                    <div class="row">
                        <div class="col-md-12" style="height: 40px;">
                            <?/* echo \yii\jui\Slider::widget([
                                'clientEvents' => [
                                    'change' => new \yii\web\JsExpression(<<<JS
                        function( event, ui ) {
                          $("#{$fromId}").change();
                        },
JS
    ),
                                    'slide' => new \yii\web\JsExpression(<<<JS
                        function( event, ui ) {
                            $("#{$fromId}").val(ui.values[ 0 ]);
                            $("#{$toId}").val(ui.values[ 1 ]);
                        },
JS
    ),
                                ],
                                'clientOptions' => [
                                    'range' =>  true,
                                    'min' => (float) $min,
                                    'max' => (float) $max,
                                    'values' => [(float) $val1, (float) $val2],
                                ],
                            ]); */?>
                            <!--<div id="<?/*= $id; */?>"></div>
                        </div>
                    </div>
                </div>
            </div>-->
        <? endif; ?>
    <? elseif ($rp && in_array($rp->property_type, [
            \skeeks\cms\relatedProperties\PropertyType::CODE_ELEMENT,
            \skeeks\cms\relatedProperties\PropertyType::CODE_LIST,
        ]))
        : ?>

        <? if ($options = $handler->getOprionsByRp($rp)) : ?>
            <? if (count($options) > 1) : ?>

                <?
                $code = $handler->getAttributeName($rp->id);
                $values = $handler->{$code};
                $class = '';
                if ($values) {
                    $class = 'opened sx-filter-selected';

                    $newOptions = [];
                    foreach ($values as $value)
                    {
                        $newOptions[$value] = $options[$value];
                        unset($options[$value]);
                    }
                    if ($newOptions) {
                        $options = \yii\helpers\ArrayHelper::merge($newOptions, $options);
                    }
                }

                $info = '';
                /*if ($rp->buyer_description) {
                    $info = "<i class='fa fa-question' title='{$feature->buyer_description}'></i>";
                }*/
                ?>
                <?= $form->field($handler, $code, [
                    'options'  => [
                        'class' => 'filter--group '.$class,
                        'tag'   => 'section',
                    ],
                    'template' => <<<HTML
<header class="filter--group--header">{$rp->name} {$info}</header>
<div class="filter--group--body js-scrollbar " style="max-height: 280px;">
{input}
</div>
HTML
                    ,
                ])->checkboxList(
                    $options
                    , [
                    'class' => 'sx-filters-checkbox-options filter--group--inner',
                    'item'  => function ($index, $label, $name, $checked, $value) use ($rp) {
                        $input = \yii\helpers\Html::checkbox($name, $checked, [
                            'id'    => 'filter-check-'.$rp->id."-".$index,
                            'value' => $value,
                        ]);
                        return <<<HTML
<div class="checkbox">
{$input}
<label for="filter-check-{$rp->id}-{$index}">{$label}</label>
</div>
HTML;

                    },
                ]); ?>
            <? endif; ?>
        <? endif; ?>


    <? endif; ?>

<? endforeach; ?>

