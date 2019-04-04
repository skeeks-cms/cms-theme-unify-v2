<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 28.07.2016
 */
/* @var $this yii\web\View */
/* @var $availabilityFiltersHandler \skeeks\cms\shop\queryFilter\AvailabilityFiltersHandler */
/* @var $sortFiltersHandler \skeeks\cms\shop\queryFilter\sortFiltersHandler */
?>
<div class="sorting sx-filters-form">
    <div class="sort">
        <div class="lbl">
            Сортировать:
        </div>
        <div class="vals">
            <?= $sortFiltersHandler->renderVisible(); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 sx-filters-selected-wrapper">
    </div>
</div>