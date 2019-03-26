<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.03.2015
 */
/* @var $this yii\web\View */
/* @var $model \skeeks\cms\models\forms\LoginFormUsernameOrEmail */

use skeeks\cms\base\widgets\ActiveFormAjaxSubmit as ActiveForm;
use skeeks\cms\helpers\UrlHelper;

$this->registerCss(<<<CSS
.auth-clients {
    padding-left: 0px;
}
CSS
);
?>
<section class="g-bg-gray-light-v5">
    <div class="container g-py-50">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-lg-5">
                <div class="u-shadow-v21 g-bg-white rounded g-py-40 g-px-30">
                    <?php $form = ActiveForm::begin([
                        'action' => UrlHelper::construct('cms/auth/register-by-email')->toString(),
                        'validationUrl' => UrlHelper::construct('cms/auth/register-by-email')->setSystemParam(\skeeks\cms\helpers\RequestResponse::VALIDATION_AJAX_FORM_SYSTEM_NAME)->toString(),
                        'options' => [
                            'class' => 'reg-page'
                        ],
                        'afterValidateCallback' => <<<JS
            function(jForm, ajaxQuery)
            {
                var handler = new sx.classes.AjaxHandlerStandartRespose(ajaxQuery, {
                    'blockerSelector' : '#' + jForm.attr('id'),
                    'enableBlocker' : true,
                });

                handler.bind('success', function()
                {
                    _.delay(function()
                    {
                        $('#sx-login').click();
                    }, 2000);
                });
            }
JS

                    ]); ?>
                    <header class="text-center mb-4">
                        <h2 class="h2 g-color-black g-font-weight-600">Регистрация</h2>
                    </header>
                    <?= $form->field($model, 'email', [
                        'labelOptions' => [
                            'class' => 'g-color-gray-dark-v2 g-font-weight-600 g-font-size-13',
                        ],
                    ])->textInput([
                        'class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15',
                    ]); ?>

                    <div class="mb-4">
                        <button class="btn btn-md btn-block u-btn-primary rounded g-py-13" type="submit">Зарегистрироваться</button>
                    </div>
                    <div class="text-center">
                        <? if (isset(\Yii::$app->authClientCollection) && \Yii::$app->authClientCollection->clients) : ?>
                            <?= yii\authclient\widgets\AuthChoice::widget([
                                'baseAuthUrl' => ['/authclient/auth/client'],
                                'popupMode'   => true,
                            ]) ?>
                        <? endif; ?>
                    </div>
                    <div class="text-center g-color-gray-dark-v5 g-font-size-13 mb-0">
                        Уже есть аккаунт? <a href="<?= UrlHelper::constructCurrent()->setRoute('cms/auth/login')->toString(); ?>" class="color-green">Вход</a>
                    </div>
                    <?php $form::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
















