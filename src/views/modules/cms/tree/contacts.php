<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */

\skeeks\assets\unify\base\UnifyIconLineProAsset::register($this);
?>
<!-- Promo Block -->
<? if ($this->theme->yandex_map) : ?>
    <section>
        <!-- Parallax Image -->
        <div style="height: 400px; overflow: hidden;">
            <div class="row">
                <?= $this->theme->yandex_map; ?>
            </div>
        </div>
        <!-- End Parallax Image -->

    </section>
<? endif; ?>

<section class="clearfix g-brd-bottom">
    <!-- Icons Block -->
    <div class="row no-gutters g-py-60">
        <div class="col-lg col-md-6 col-sm-6 col-xs-12 g-brd-right--md g-brd-gray-light-v2">
            <!-- Icon Blocks -->
            <div class="text-center g-pa-20">
            <span class="u-icon-v1 u-icon-size--xl g-mb-10">

                <i class="icon-real-estate-027 u-line-icon-pro"></i>

              </span>
                <h4 class="h5 g-font-weight-600 g-mb-5"><?= \Yii::t('skeeks/unify', 'Address'); ?></h4>
                <span class="d-block"><?= $this->theme->address; ?></span>
            </div>
            <!-- End Icon Blocks -->
        </div>

        <div class="col-lg col-md-6 col-sm-6 col-xs-12 g-brd-right--md g-brd-gray-light-v2">
            <!-- Icon Blocks -->
            <div class="text-center g-py-20">
            <span class="u-icon-v1 u-icon-size--xl g-mb-10">
                <i class="icon-electronics-005 u-line-icon-pro"></i>
              </span>
                <h4 class="h5 g-font-weight-600 g-mb-5"><?= \Yii::t('skeeks/unify', 'Phone'); ?></h4>
                <span class="d-block"><a href="tel:<?= $this->theme->phone; ?>"><?= $this->theme->phone; ?> </a></span>
                <? if ($this->theme->phone_second) : ?>
                    <span class="d-block"><a href="tel:<?= $this->theme->phone_second; ?>"><?= $this->theme->phone_second; ?> </a></span>
                <? endif; ?>
                <? if ($this->theme->phone_third) : ?>
                    <span class="d-block"><a href="tel:<?= $this->theme->phone_third; ?>"><?= $this->theme->phone_third; ?> </a></span>
                <? endif; ?>
            </div>
            <!-- End Icon Blocks -->
        </div>

        <div class="col-lg col-md-6 col-sm-6 col-xs-12 g-brd-right--md g-brd-gray-light-v2">
            <!-- Icon Blocks -->
            <div class="text-center g-py-20">
            <span class="u-icon-v1 u-icon-size--xl g-mb-10">

                <i class="icon-communication-062 u-line-icon-pro"></i>

              </span>
                <h4 class="h5 g-font-weight-600 g-mb-5"><?= \Yii::t('app', 'Email'); ?></h4>
                <span class="d-block"><a href="mailto:<?= $this->theme->email; ?>"><?= $this->theme->email; ?></a></span>
            </div>
            <!-- End Icon Blocks -->
        </div>

        <div class="col-lg col-md-6 col-sm-6 col-xs-12 g-brd-gray-light-v1">
            <!-- Icon Blocks -->
            <div class="text-center g-py-20">
            <span class="u-icon-v1 u-icon-size--xl g-mb-10">

                <i class="icon-hotel-restaurant-003 u-line-icon-pro"></i>

              </span>
                <h4 class="h5 g-font-weight-600 g-mb-5"><?= \Yii::t('skeeks/unify', 'Working time'); ?></h4>
                <span class="d-block"><?= $this->theme->work_time; ?></span>
            </div>
            <!-- End Icon Blocks -->
        </div>

    </div>
    <!-- End Icons Block -->
</section>

