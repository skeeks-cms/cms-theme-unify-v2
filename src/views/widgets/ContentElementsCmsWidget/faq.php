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

<? if ($elements = $widget->dataProvider->query->all()) : ?>
    <span itemscope itemtype="https://schema.org/FAQPage">
    <div id="accordion" class="u-accordion u-accordion-color-primary" role="tablist" aria-multiselectable="true">
        <? foreach ($elements as $model) : ?>
            <!-- Card -->
            <div class="card g-brd-none rounded g-mb-20 g-bg-secondary" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div id="accordion-heading-<?= $model->id; ?>" class="g-pa-0" role="tab">
                    <h5 class="mb-0">

                        <a class="collapsed d-flex justify-content-between u-shadow-v19 g-color-main g-text-underline--none--hover rounded g-px-30 g-py-20"
                           href="#accordion-body-<?= $model->id; ?>"
                           data-toggle="collapse"
                           data-parent="#accordion"
                           aria-expanded="false"
                           aria-controls="accordion-body-01"

                        >

                            <span itemprop="name">
                            <?= $model->name; ?>
                                </span>

                            <span class="u-accordion__control-icon g-color-primary">

                          <i class="fas fa-angle-down"></i>

                          <i class="fas fa-angle-up"></i>

                        </span>

                        </a>

                    </h5>
                </div>
                <div id="accordion-body-<?= $model->id; ?>" class="collapse" role="tabpanel" aria-labelledby="accordion-heading-<?= $model->id; ?>" data-parent="#accordion"
                     itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"
                >
                    <div class="u-accordion__body g-color-gray-dark-v4 g-pa-30">
                        <span itemprop="text">
                        <?= $model->description_short; ?>
                        </span>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        <? endforeach; ?>
    </div>
    </span>
<? endif; ?>

