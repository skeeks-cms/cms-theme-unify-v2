<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>
<!-- Promo Block -->
<section>
    <!-- Parallax Image -->
    <div style="height: 500px;">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3c54488d4f32ae571f2430a060822efc953527a3b093179c979cefdc898476ad&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=false"></script>
    </div>
    <!-- End Parallax Image -->

</section>
<section class="clearfix g-brd-bottom">
    <!-- Icons Block -->
    <div class="row no-gutters g-py-60">
        <div class="col-lg col-md-6 col-sm-6 col-xs-12 g-brd-right--md g-brd-gray-light-v2">
            <!-- Icon Blocks -->
            <div class="text-center g-py-20">
            <span class="u-icon-v1 u-icon-size--xl g-mb-10">

                <i class="icon-real-estate-027 u-line-icon-pro"></i>

              </span>
                <h4 class="h5 g-font-weight-600 g-mb-5">Адрес</h4>
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
                <h4 class="h5 g-font-weight-600 g-mb-5">Телефон</h4>
                <span class="d-block"><a href="tel:<?= $this->theme->phone; ?>"><?= $this->theme->phone; ?> </a></span>
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
                <h4 class="h5 g-font-weight-600 g-mb-5">Рабочее время</h4>
                <span class="d-block"><?= \Yii::t('app', 'Понедельник - Пятница: 10:00 - 19:00'); ?></span>
            </div>
            <!-- End Icon Blocks -->
        </div>

    </div>
    <!-- End Icons Block -->
</section>

