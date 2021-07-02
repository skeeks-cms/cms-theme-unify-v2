<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 13.11.2017
 */
/* @var $this yii\web\View */
/* @var $form \yii\widgets\ActiveForm */
/* @var $code string */
$widget = $this->context;
$id = \yii\helpers\Html::getInputId($handler, 'value');
?>
<div class="sx-hidden-filters">
    <?= $form->field($handler, 'value')->textInput([
        'data-value' => 'sx-sort',
    ]) ?>
</div>

<div class="dropdown sx-filter sx-inline-filter sx-filter-selected">
    <a href="#" class="dropdown-toggle btn btn-default sx-inline-btn" data-toggle="dropdown" style="">
        <?php echo $handler->valueAsText; ?>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <? foreach ($handler->getSortOptions() as $code => $name) : ?>
            <a class="dropdown-item sx-select-sort sx-filter-action" href="#" data-filter="#<?php echo $id; ?>" data-filter-value="<?php echo $code; ?>"><?php echo $name; ?></a>
        <? endforeach; ?>
    </div>
</div>
