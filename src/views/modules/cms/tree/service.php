<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
\Yii::$app->view->theme->bodyCssClass = 'sx-transparent-header';

$this->registerCss(<<<CSS



CSS
);
?>

<section id="sx-pcallback-block" class="sx-pcallback-block g-pt-80 g-pb-80 g-bg-black lazy g-bg-cover g-bg-img-hero g-flex-centered sx-bg-black-50--after" style="background-position: center;"
         data-bg="<?php echo \common\themes\app\assets\AppThemeAsset::getAssetUrl('img/bg/4.jpg'); ?>">
    <div class="container g-z-index-1">
        <div class="row ">
            <div class="col-md-6">
                <div class="h1 sx-parking-title g-mb-25 g-color-white" data-animation="fadeInLeft" data-animation-delay="0" data-animation-duration="500">
                    Оставьте заявку
                </div>

                <div class="sx-parking-second-big-text g-color-white     g-mb-25" style="max-width: 764px;" data-animation="fadeInRight" data-animation-delay="0" data-animation-duration="500">
                    По любым вопросам: продажа или попкупка любого объекта, ипотека и все что связано с недвижимостью. Заполняйте эту форму!
                </div>

                <div class="sx-parking-second-big-text g-color-white     g-mb-25" style="max-width: 764px;" data-animation="fadeInRight" data-animation-delay="0" data-animation-duration="500">
                    1. Оставьте заявку на сайте →
                </div>

                <div class="sx-parking-second-big-text g-color-white g-mb-25" style="max-width: 764px;" data-animation="fadeInRight" data-animation-delay="0" data-animation-duration="500">
                    2. Наш менеджер перезвонит вам в течение 15 минут и проконсультирует вас
                </div>

            </div>
            <div class="col-md-6 my-auto">
                <div class="g-color-black sx-form-callback" style="background: white; padding: 30px; font-weight: 600;">
                    <!--<div class="sx-parking-second-big-text g-mb-10">Ваша заявка</div>-->
                    <?= \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget::widget([
                        'form_code' => 'feedback',
                        'namespace' => 'FormWidget-feedback',
                        'viewFile'  => 'with-messages'
                        //'viewFile' => '@app/views/widgets/FormWidget/fiz-connect'
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</section>
