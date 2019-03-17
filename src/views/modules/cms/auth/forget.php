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

?>
<section class="g-bg-gray-light-v5">
    <div class="container g-py-50">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-lg-5">
                <div class="u-shadow-v21 g-bg-white rounded g-py-40 g-px-30">
                    <?php $form = ActiveForm::begin([
                        'validationUrl' => UrlHelper::construct('cms/auth/forget')->setSystemParam(\skeeks\cms\helpers\RequestResponse::VALIDATION_AJAX_FORM_SYSTEM_NAME)->toString(),
                        'options'       => [
                            'class' => 'reg-page',
                        ],
                    ]); ?>
                    <header class="text-center mb-4">
                        <h2 class="h2 g-color-black g-font-weight-600">Восстановление пароля</h2>
                    </header>
                    <?= $form->field($model, 'identifier', [
                        'labelOptions' => [
                            'class' => 'g-color-gray-dark-v2 g-font-weight-600 g-font-size-13',
                        ],
                    ])->textInput([
                        'class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15',
                    ]); ?>

                    <div class="mb-4">
                        <button class="btn btn-md btn-block u-btn-primary rounded g-py-13" type="submit">Отправить</button>
                    </div>

                    <div class="text-center g-color-gray-dark-v5 g-font-size-13 mb-0">
                        <?= \yii\helpers\Html::a('Авторизация', UrlHelper::constructCurrent()->setRoute('cms/auth/login')->toString()) ?> |
                        <?= \yii\helpers\Html::a('Регистрация', UrlHelper::constructCurrent()->setRoute('cms/auth/register')->toString()) ?>
                    </div>
                    <?php $form::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

