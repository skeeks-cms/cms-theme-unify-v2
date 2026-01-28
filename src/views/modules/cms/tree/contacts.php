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
<? elseif ($addresses = \Yii::$app->skeeks->site->cmsSiteAddresses) : ?>

    <section class="clearfix g-brd-bottom">

        <? $yaMap = \skeeks\cms\ya\map\widgets\YaMapWidget::begin([
            'id' => 'sx-map-partners',

            'options' =>
                [
                    'class' => 'sx-map-partners',
                    'style' => 'height: 500px;',
                ],
        ]) ?>
        <? $yaMap->setZoom(13)->setCenter()->setControlls([
            'searchControl',
            'fullscreenControl',
            'zoomControl',
        ]); ?>
        <? \skeeks\cms\ya\map\widgets\YaMapWidget::end() ?>

        <?


        $points = [];
        /**
         * @var $address \skeeks\cms\models\CmsSiteAddress
         */
        foreach ($addresses as $address) {
            if ($address->latitude && $address->longitude) {
                $coordinates[0] = (float)$address->latitude;
                $coordinates[1] = (float)$address->longitude;
                $points[] = [
                    'coordinates' => [$address->latitude, $address->longitude],
                    'phone'       => $address->phone,
                    'email'       => $address->email,
                    'address'     => \yii\helpers\Html::encode($address->value),
                    'name'        => yii\helpers\Html::encode($address->name),
                ];
            }
        }

        $js = \yii\helpers\Json::encode([
            'points' => $points,
        ]);

        $this->registerJs(<<<JS
(function(sx, $, _)
{
    sx.classes.YaPluginDealer = sx.classes.ya.plugins._Base.extend({
        _initOnReady: function () {
            var self = this;
            this.initPoint();
        },

        initPoint: function()
        {
			var self = this;
			self.MapObject.YaMap.behaviors.disable('scrollZoom');
			var center = '';
			if (this.get('points'))
			{
			    _.each(this.get('points'), function(object)
			    {
                    center = object.coordinates;
			        var ObjectPlacemark = new ymaps.Placemark(object.coordinates, {
                        objectId: object.id,
                        balloonContentHeader: object.name,
                        balloonContent: self.getObjectBalloonTemplate(object),
                        hintContent: object.name
                    }, {});
			        
                    self.MapObject.YaMap.geoObjects.add(ObjectPlacemark);
			    });
			}

			if (this.get('points').length > 1)
			{
			    _.delay(function() {
			        self.MapObject.YaMap.setBounds(self.MapObject.YaMap.geoObjects.getBounds());
			    }, 1000);
			    
			    _.delay(function() {
			        self.MapObject.YaMap.setBounds(self.MapObject.YaMap.geoObjects.getBounds());
			    }, 2000);
                
			} else
			{
                self.MapObject.YaMap.setCenter(center);

			}
        },

        getObjectBalloonTemplate: function(data)
        {
            return '<strong>Телефон:</strong> ' + data.phone + "<br />" +
                    '<strong>Email:</strong> ' + data.email + "<br />" +
                    '<strong>Адрес:</strong> ' + data.address + "<br /><br />";
        }
	});
    
    sx.yaDealer = new sx.classes.YaPluginDealer(sx.yaMaps.get('{$yaMap->id}'), {$js});
    
})(sx, sx.$, sx._);
JS
        )
        ?>

    </section>

<?php endif; ?>


<section class="clearfix g-brd-bottom">
    <!-- Icons Block -->
    <div class="row no-gutters g-py-60">
        <?php if ($addresses = \Yii::$app->skeeks->site->cmsSiteAddresses) : ?>
            <div class="col-lg col-md col-sm-6 col-xs-12 g-brd-right--md g-brd-gray-light-v2">
                <!-- Icon Blocks -->
                <div class="text-center g-py-20">
            <span class="g-mb-10" style="font-size:40px;">

                <i class="icon-real-estate-027 u-line-icon-pro"></i>

              </span>
                    <h4 class="h5 g-font-weight-600 g-mb-5"><?= \Yii::t('skeeks/unify', 'Address'); ?></h4>
                    <? foreach ($addresses as $address) : ?>
                        <span class="d-block"><?= $address->value; ?></span>
                    <? endforeach; ?>

                </div>
                <!-- End Icon Blocks -->
            </div>
        <?php endif; ?>


        <div class="col-lg col-md col-sm-6 col-xs-12 g-brd-right--md g-brd-gray-light-v2">
            <!-- Icon Blocks -->
            <div class="text-center g-py-20">
            <span class="g-mb-10" style="font-size:40px;">
                <i class="icon-electronics-005 u-line-icon-pro"></i>
              </span>
                <h4 class="h5 g-font-weight-600 g-mb-5"><?= \Yii::t('skeeks/unify', 'Phone'); ?></h4>

                <?php if ($phones = \Yii::$app->skeeks->site->cmsSitePhones) : ?>
                    <? foreach ($phones as $phone) : ?>
                        <span class="d-block" style="line-height: 1.2; margin-bottom: 1rem;">
                            <a href="tel:<?= $phone->value; ?>"><?= $phone->value; ?> </a>
                            <?php if($phone->name) : ?>
                                <br/><span style="opacity: 0.6"><?php echo $phone->name; ?></span>
                            <?php endif; ?>
                        </span>
                    <? endforeach; ?>
                <?php endif; ?>
            </div>
            <!-- End Icon Blocks -->
        </div>

        <div class="col-lg col-md col-sm-6 col-xs-12 g-brd-right--md g-brd-gray-light-v2">
            <!-- Icon Blocks -->
            <div class="text-center g-py-20">
            <span class="g-mb-10" style="font-size:40px;">

                <i class="icon-communication-062 u-line-icon-pro"></i>

              </span>
                <h4 class="h5 g-font-weight-600 g-mb-5"><?= \Yii::t('app', 'Email'); ?></h4>
                <?php if ($emails = \Yii::$app->skeeks->site->cmsSiteEmails) : ?>
                    <? foreach ($emails as $email) : ?>
                        <span class="d-block"><a href="mailto:<?= $email->value; ?>"><?= $email->value; ?></a></span>
                    <? endforeach; ?>
                <?php endif; ?>


            </div>
            <!-- End Icon Blocks -->
        </div>

        <div class="col-lg col-md-6 col-sm-6 col-xs-12 g-brd-gray-light-v1 sx-schedule-col">
            <!-- Icon Blocks -->
            <div class="text-center g-py-20">
            <span class="g-mb-10" style="font-size:40px;">

                <i class="icon-hotel-restaurant-003 u-line-icon-pro"></i>

              </span>
                <h4 class="h5 g-font-weight-600 g-mb-5"><?= \Yii::t('skeeks/unify', 'Opening hours'); ?></h4>
                <?php if (\Yii::$app->skeeks->site->work_time) : ?>
                    <?php $data = \skeeks\yii2\scheduleInputWidget\ScheduleInputWidget::getWorkingData(\Yii::$app->skeeks->site->work_time); ?>
                    <? foreach ($data as $row) : ?>
                        <div>
                            <?
                            $stringDay = implode(', ', \yii\helpers\ArrayHelper::getValue($row, 'daysStrings'));
                            ?>
                            <b><?= $stringDay; ?></b> <?= \yii\helpers\ArrayHelper::getValue($row, 'startHour') ?>:<?= \yii\helpers\ArrayHelper::getValue($row, 'startMinutes') ?>
                            - <?= \yii\helpers\ArrayHelper::getValue($row, 'endHour') ?>:<?= \yii\helpers\ArrayHelper::getValue($row, 'endMinutes') ?>
                        </div>
                    <? endforeach; ?>
                <?php endif; ?>

                <!--<span class="d-block"><? /*= \Yii::t('app', $this->theme->work_time); */ ?></span>-->
            </div>
            <!-- End Icon Blocks -->
        </div>

    </div>
    <!-- End Icons Block -->
</section>

