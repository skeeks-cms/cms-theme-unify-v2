<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */

\skeeks\assets\unify\base\UnifyIconLineProAsset::register($this);
\skeeks\cms\themes\unify\assets\VanillaLazyLoadAsset::register($this);

$this->registerCss(<<<CSS
.address-item {
    display: flex;
}
.sx-contacts-v2 {
    min-height: 70vh;
}

.sx-address-list {
    height: 70vh;
    overflow-y: auto;
}

.sx-map {
    height: 70vh;
    border-radius: var(--base-radius);
    overflow: hidden;
}

.sx-section {
    padding: var(--base-padding);
}

.address-item {
    background: var(--second-bg-color);
    border-radius: var(--base-radius);
    padding: 1.5rem;
    margin-bottom: 1rem;
    display: flex;
}

.address-item .sx-info {
    width: 100%;
}
.address-item .sx-image img {
    border-radius: var(--base-radius);
}
.sx-time {
    font-weight: bold;
}

@media (max-width: 768px) {
    
    .sx-address-list {
        height: auto;
    }
}

CSS
);

\skeeks\assets\unify\base\UnifyHsScrollbarAsset::register($this);
?>


<section class="sx-section sx-contacts-v2">
    <div class="">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="sx-address-list js-scrollbar">
                <?php if ($addresses = \Yii::$app->skeeks->site->cmsSiteAddresses) : ?>
                    <? foreach ($addresses as $address) : ?>
                        <?
                            $phone = $address->phone;
                            if (!$phone) {
                                $phone = \Yii::$app->skeeks->site->cmsSitePhone;
                            }
                            $email = $address->email;
                            if (!$email) {
                                $email = \Yii::$app->skeeks->site->cmsSiteEmail;
                            }
                            
                            $name = $address->name;
                            if (!$name) {
                                $name = $address->name;
                            }
                        ?>
                        <div class="address-item">
                            <div class="sx-info">
                                <div class="sx-title h3"><?php echo $name; ?></div>
                                <?php if($name != $address->value) : ?>
                                    <div class="sx-address"><?php echo $address->value; ?></div>
                                <?php endif; ?>
                                
                                <?php if($address->cmsSiteAddressPhones) : ?>
                                    <? foreach ($address->cmsSiteAddressPhones as $addressPhone) : ?>
                                        <div class="sx-phone">
                                            <a href="tel:<?php echo $addressPhone->value; ?>"><?php echo $addressPhone->value; ?></a>
                                            <?php if($addressPhone->name) : ?>
                                                (<?php echo $addressPhone->name; ?>)
                                            <?php endif; ?>

                                        </div>
                                    <? endforeach; ?>
                                <?php endif; ?>
                                
                                <?php if($address->cmsSiteAddressEmails) : ?>
                                    <? foreach ($address->cmsSiteAddressEmails as $addressEmail) : ?>
                                        <div class="sx-email">
                                            <a href="mailto:<?php echo $addressEmail->value; ?>"><?php echo $addressEmail->value; ?></a>
                                            <?php if($addressEmail->name) : ?>
                                                (<?php echo $addressEmail->name; ?>)
                                            <?php endif; ?>
                                        </div>
                                    <? endforeach; ?>
                                <?php endif; ?>
                                
                                <?php /*if($email) : */?><!--
                                    <div class="sx-email"><a href="mailto:<?php /*echo $email; */?>"><?php /*echo $email; */?></a></div>
                                --><?php /*endif; */?>
                                
                                <?php if ($address->work_time) : ?>
                                    <?php $data = \skeeks\yii2\scheduleInputWidget\ScheduleInputWidget::getWorkingData($address->work_time); ?>
                                    <? foreach ($data as $row) : ?>
                                        <div class="sx-worktime">
                                            <?
                                            $stringDay = implode(', ', \yii\helpers\ArrayHelper::getValue($row, 'daysStrings'));
                                            ?>
                                            <?= $stringDay; ?> <span class="sx-time"><?= \yii\helpers\ArrayHelper::getValue($row, 'startHour') ?>:<?= \yii\helpers\ArrayHelper::getValue($row, 'startMinutes') ?>
                                                - <?= \yii\helpers\ArrayHelper::getValue($row, 'endHour') ?>:<?= \yii\helpers\ArrayHelper::getValue($row, 'endMinutes') ?></span>
                                        </div>
                                    <? endforeach; ?>
                                <?php endif; ?>
                                            
                            </div>
                            <div class="sx-image">
                                <img class="img-fluid lazy" style="aspect-ratio: 1/1; width: 100%;" src="<?php echo \Yii::$app->cms->image1px; ?>" data-src="<?php echo \Yii::$app->imaging->thumbnailUrlOnRequest($address->cmsImage ? $address->cmsImage->src : \skeeks\cms\helpers\Image::getCapSrc(),
                                new \skeeks\cms\components\imaging\filters\Thumbnail([
                                    'w' => 231,
                                    'h' => 231,
                                    'm' => \Imagine\Image\ManipulatorInterface::THUMBNAIL_OUTBOUND,
                                ])
                            ); ?>">
                            </div>
                        </div>
                    <? endforeach; ?>
                <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <? if ($this->theme->yandex_map) : ?>
                    <section>
                        <!-- Parallax Image -->
                        <div style="overflow: hidden;">
                            <div class="row">
                                <?= $this->theme->yandex_map; ?>
                            </div>
                        </div>
                        <!-- End Parallax Image -->
                    </section>
                <? elseif ($addresses = \Yii::$app->skeeks->site->cmsSiteAddresses) : ?>

                    <section class="clearfix g-brd-bottom">

                        <? $yaMap = \skeeks\cms\ya\map\widgets\YaMapWidget::begin([
                            'id' => 'sx-map',

                            'options' =>
                                [
                                    'class' => 'sx-map',
                                    //'style' => 'height: 500px;',
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
                                
                                
                                $phone = $address->phone;
                                if (!$phone) {
                                    $phone = \Yii::$app->skeeks->site->cmsSitePhone;
                                }
                                $email = $address->email;
                                if (!$email) {
                                    $email = \Yii::$app->skeeks->site->cmsSiteEmail;
                                }
                                
                                $name = $address->name;
                                if (!$name) {
                                    $name = $address->name;
                                }
                                
                                
                                $data = \skeeks\yii2\scheduleInputWidget\ScheduleInputWidget::getWorkingData($address->work_time);
                                $workTime = [];
                                /*foreach ($data as $row) {
                                    $stringDay = implode(', ', \yii\helpers\ArrayHelper::getValue($row, 'daysStrings'));
                                    $workTime[] = $stringDay . 
                                }*/
                                
                        
                                $points[] = [
                                    'coordinates' => [$address->latitude, $address->longitude],
                                    'phone'       => $phone,
                                    'email'       => $email,
                                    'address'     => \yii\helpers\Html::encode($address->value),
                                    'name'        => yii\helpers\Html::encode($name),
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
            </div>
        </div>
    </div>
</section>

