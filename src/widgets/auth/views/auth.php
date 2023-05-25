<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
use skeeks\cms\base\widgets\ActiveFormAjaxSubmit as ActiveForm;
/**
 * @var $this yii\web\View
 * @var $widget \skeeks\cms\themes\unify\widgets\auth\AuthWidget
 */
/*if ($controller->getSessionAuthPhone() && $controller->getSessionAuthIsActual()) {
    $act = "sx-auth-phone-tmp-code";
}*/

$js = \yii\helpers\Json::encode($widget->clientOptions);

$this->registerJs(<<<JS
    new sx.classes.Auth({$js});
JS
);
?>

<?php echo \yii\helpers\Html::beginTag("div", $widget->options); ?>


    <div class="sx-auth-action" data-action="auth-by-callcheck-phone">
        <?php $form = ActiveForm::begin([
            'action'               => \yii\helpers\Url::to(['/cms/auth/auth-by-callcheck-phone']),
            'enableClientValidation' => false,
            'enableAjaxValidation' => false,
            'clientCallback'       => new \yii\web\JsExpression(<<<JS
    function (ActiveFormAjaxSubmit) {
        ActiveFormAjaxSubmit.on('success', function(e, response) {
            if (response.data.type == 'password') {
                var jAuthWidget = ActiveFormAjaxSubmit.jForm.closest(".sx-auth-widget");
                
                $("[data-action=auth-by-callcheck-phone-password] .sx-phone", jAuthWidget).val(response.data.phone);
                
                jAuthWidget.trigger("action", {
                    'action' : 'auth-by-callcheck-phone-password'
                });
            } else if (response.data.type == 'tmp-phone-code') {
                var jAuthWidget = ActiveFormAjaxSubmit.jForm.closest(".sx-auth-widget");
                
                $("[data-action=auth-by-callcheck-phone-code] .sx-phone", jAuthWidget).val(response.data.phone);
                
                jAuthWidget.trigger("action", {
                    'action' : 'auth-by-callcheck-phone-code',
                    'left-time': response.data['left-repeat']
                });
            }
            
        });
    }
JS
            ),
        ]); ?>
        <div class="form-group">
            
            
            <div class="input-group">
                <input type="text" id="sx-phone" class="form-control sx-phone" name="phone" placeholder="Ваш телефон">
                <button class="btn btn-primary sx-btn-submit" type="submit">Продолжить</button>
            </div>
            
        </div>
        <!--<div class="mb-4">
            <button class="btn btn-md btn-block btn-primary sx-btn-submit" type="submit">Продолжить</button>
        </div>-->
        <?php $form::end(); ?>
        <div class="text-center">
            <a href="#" class="sx-trigger-action sx-dashed" data-action="auth-by-email">Войти по email</a>
        </div>
    </div>
    <div class="sx-auth-action" data-action="auth-by-callcheck-phone-password">
        <?php $form = ActiveForm::begin([
            'action'               => \yii\helpers\Url::to(['/cms/auth/auth-by-callcheck-phone-password']),
            'enableAjaxValidation' => false,
            'clientCallback'       => new \yii\web\JsExpression(<<<JS
    function (ActiveFormAjaxSubmit) {
        ActiveFormAjaxSubmit.on('success', function(e, response) {
            console.log(response);
            
        });
    }
JS
            ),
        ]); ?>
        <div class="form-group" style="display: none;">
            <input type="text" class="form-control sx-phone" name="phone" placeholder="Ваш телефон">
        </div>

        <div class="form-group">
            <div class="input-group">
                <input type="password" class="form-control" name="password" value="" placeholder="Ваш пароль">
                <button class="btn btn-primary sx-btn-submit" type="submit">Войти</button>
            </div>
        </div>

       <!-- <div class="mb-4">
            <button class="btn btn-md btn-block btn-primary sx-btn-submit" type="submit">Продолжить</button>
        </div>-->
        <?php $form::end(); ?>

        <div class="text-center form-group">
            <a href="#" class="btn btn-md btn-default btn-block sx-callcheck-phone-code-trigger">Я не помню пароль</a>
        </div>
        <div class="text-center">
            <a href="#" class="sx-trigger-action sx-dashed" data-action="auth-by-callcheck-phone">Войти с другим телефоном</a>
        </div>
    </div>
    <div class="sx-auth-action" data-action="auth-by-callcheck-phone-code">
        <?php $form = ActiveForm::begin([
            'action'               => \yii\helpers\Url::to(['/cms/auth/auth-by-callcheck-phone-code']),
            'enableAjaxValidation' => false,
        ]); ?>

        <input type="hidden" name="phone" class="sx-phone" />
        <div class="form-group field-sx-phone">
            <input type="text"
                   name="phone_code"
                   placeholder="Последние 4 циры номера"
                   class="form-control"
            />
        </div>
        <div class="mb-4">
            <button class="btn btn-md btn-block btn-primary sx-btn-submit" type="submit">Войти</button>
        </div>
        <?php $form::end(); ?>

        <div class="text-center sx-callcheck-info">
            Сейчас мы Вам позвоним! Вы должны указать 4 последние цифры входящего номера телефона.
        </div>
        <div class="text-center sx-callcheck-phone-trigger-wrapper">
            <span class="sx-phone-code-wait">Позвонить еще раз, через: <span class="sx-left-time"></span> сек.</span>
            <a href="#" class="sx-dashed sx-callcheck-phone-code-trigger">Позвонить еще раз</a>
        </div>

        <div class="text-center">
            <a href="#" class="sx-trigger-action sx-dashed" data-action="auth-by-callcheck-phone">Войти с другим телефоном</a>
        </div>
    </div>


    <div class="sx-auth-action" data-action="auth-by-phone">
        <?php $form = ActiveForm::begin([
            'action'               => \yii\helpers\Url::to(['/cms/auth/auth-by-phone']),
            'enableClientValidation' => false,
            'enableAjaxValidation' => false,
            'clientCallback'       => new \yii\web\JsExpression(<<<JS
    function (ActiveFormAjaxSubmit) {
        ActiveFormAjaxSubmit.on('success', function(e, response) {
            if (response.data.type == 'password') {
                var jAuthWidget = ActiveFormAjaxSubmit.jForm.closest(".sx-auth-widget");
                
                $("[data-action=auth-by-phone-password] .sx-phone", jAuthWidget).val(response.data.phone);
                
                jAuthWidget.trigger("action", {
                    'action' : 'auth-by-phone-password'
                });
            } else if (response.data.type == 'tmp-phone-code') {
                var jAuthWidget = ActiveFormAjaxSubmit.jForm.closest(".sx-auth-widget");
                
                $("[data-action=auth-by-phone-sms-code] .sx-phone", jAuthWidget).val(response.data.phone);
                
                jAuthWidget.trigger("action", {
                    'action' : 'auth-by-phone-sms-code',
                    'left-time': response.data['left-repeat']
                });
            }
            
        });
    }
JS
            ),
        ]); ?>
        <div class="form-group">
            <input type="text" id="sx-phone" class="form-control sx-phone" name="phone" placeholder="Ваш телефон">
        </div>
        <div class="mb-4">
            <button class="btn btn-md btn-block btn-primary sx-btn-submit" type="submit">Продолжить</button>
        </div>
        <?php $form::end(); ?>
        <div class="text-center">
            <a href="#" class="sx-trigger-action sx-dashed" data-action="auth-by-email">Войти по email</a>
        </div>
    </div>

    <div class="sx-auth-action" data-action="auth-by-phone-password">
        <?php $form = ActiveForm::begin([
            'action'               => \yii\helpers\Url::to(['/cms/auth/auth-by-phone-password']),
            'enableAjaxValidation' => false,
            'clientCallback'       => new \yii\web\JsExpression(<<<JS
    function (ActiveFormAjaxSubmit) {
        ActiveFormAjaxSubmit.on('success', function(e, response) {
            console.log(response);
            
        });
    }
JS
            ),
        ]); ?>
        <div class="form-group" style="display: none;">
            <input type="text" class="form-control sx-phone" name="phone" placeholder="Ваш телефон">
        </div>
        
        <div class="form-group">
            <div class="input-group">
                <input type="password" class="form-control" name="password" value="" placeholder="Ваш пароль">
                <button class="btn btn-primary sx-btn-submit" type="submit">Войти</button>
            </div>
        </div>
        
        <!--<div class="mb-4">
            <button class="btn btn-md btn-block btn-primary sx-btn-submit" type="submit">Продолжить</button>
        </div>-->
        <?php $form::end(); ?>

        <div class="text-center">
            <a href="#" class="sx-dashed sx-phone-code-trigger">Выслать одноразовый SMS код</a>
        </div>
        <div class="text-center">
            <a href="#" class="sx-trigger-action sx-dashed" data-action="auth-by-phone">Войти с другим телефоном</a>
        </div>
    </div>

    <div class="sx-auth-action" data-action="auth-by-phone-sms-code">
        <?php $form = ActiveForm::begin([
            'action'               => \yii\helpers\Url::to(['/cms/auth/auth-by-phone-sms-code']),
            'enableAjaxValidation' => false,
        ]); ?>

        <input type="hidden" name="phone" class="sx-phone" />
        <div class="form-group field-sx-phone">
            <input type="text"
                   name="phone_code"
                   placeholder="Проверочный код из SMS"
                   class="form-control"
            />
        </div>
        <div class="mb-4">
            <button class="btn btn-md btn-block btn-primary sx-btn-submit" type="submit">Войти</button>
        </div>
        <?php $form::end(); ?>

        <div class="text-center sx-phone-trigger-wrapper">
            <span class="sx-phone-code-wait">Выслать код повторно, через: <span class="sx-left-time"></span> сек.</span>
            <a href="#" class="sx-dashed sx-phone-code-trigger">Выслать одноразовый SMS код</a>
        </div>

        <div class="text-center">
            <a href="#" class="sx-trigger-action sx-dashed" data-action="auth-by-phone">Войти с другим телефоном</a>
        </div>

    </div>

    <div class="sx-auth-action" data-action="auth-by-email">
        <?php $form = ActiveForm::begin([
            'action'               => \yii\helpers\Url::to(['/cms/auth/auth-by-email']),
            'enableClientValidation' => false,
            'enableAjaxValidation' => false,
            'clientCallback'       => new \yii\web\JsExpression(<<<JS
    function (ActiveFormAjaxSubmit) {
        ActiveFormAjaxSubmit.on('success', function(e, response) {
            if (response.data.type == 'password') {
                var jAuthWidget = ActiveFormAjaxSubmit.jForm.closest(".sx-auth-widget");
                
                $("[data-action=auth-by-email-password] .sx-email", jAuthWidget).val(response.data.email);
                
                jAuthWidget.trigger("action", {
                    'action' : 'auth-by-email-password'
                });
            } else if (response.data.type == 'tmp-email-code') {
                var jAuthWidget = ActiveFormAjaxSubmit.jForm.closest(".sx-auth-widget");
                
                $("[data-action=auth-by-phone-email-code] .sx-email", jAuthWidget).val(response.data.phone);
                
                jAuthWidget.trigger("action", {
                    'action' : 'auth-by-email-code',
                    'left-time': response.data['left-repeat']
                });
            }
            
        });
    }
JS
            ),
        ]); ?>

        <div class="form-group">
            
            <div class="input-group">
                <input type="text" id="sx-email" class="form-control sx-email" name="email" placeholder="Ваш email">
                <button class="btn btn-primary sx-btn-submit" type="submit">Продолжить</button>
            </div>
            
        </div>
        <!--<div class="mb-4">
            <button class="btn btn-md btn-block btn-primary sx-btn-submit" type="submit">Продолжить</button>
        </div>-->
        <?php $form::end(); ?>
        <?php if(\Yii::$app->cms->callcheckProvider) : ?>
            <div class="text-center">
                <a href="#" class="sx-trigger-action sx-dashed" data-action="auth-by-callcheck-phone">Войти по телефону</a>
            </div>
        <?php elseif(\Yii::$app->cms->smsProvider) : ?>
            <div class="text-center">
                <a href="#" class="sx-trigger-action sx-dashed" data-action="auth-by-phone">Войти по телефону</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="sx-auth-action" data-action="auth-by-email-password">
        <?php $form = ActiveForm::begin([
            'action'               => \yii\helpers\Url::to(['/cms/auth/auth-by-email-password']),
            'enableAjaxValidation' => false,
            'clientCallback'       => new \yii\web\JsExpression(<<<JS
    function (ActiveFormAjaxSubmit) {
        ActiveFormAjaxSubmit.on('success', function(e, response) {
            console.log(response);
            
        });
    }
JS
            ),
        ]); ?>
        <div class="form-group" style="display: none;">
            <input type="text" class="form-control sx-email" name="email" placeholder="Ваш телефон">
        </div>

        <div class="form-group">
            <div class="input-group">
                <input type="password" class="form-control" name="password" value="" placeholder="Ваш пароль">
                <button class="btn btn-primary sx-btn-submit" type="submit">Войти</button>
            </div>
        </div>

        <?php $form::end(); ?>
        
        <div class="form-group text-center">
            <a href="#" class="btn btn-default btn-block sx-email-code-trigger">Я не помню пароль</a>
        </div>
        <div class="text-center">
            <a href="#" class="sx-trigger-action sx-dashed" data-action="auth-by-email">Войти с другим email</a>
        </div>
    </div>

    <div class="sx-auth-action" data-action="auth-by-email-code">
        <?php $form = ActiveForm::begin([
            'action'               => \yii\helpers\Url::to(['/cms/auth/auth-by-email-code']),
            'enableAjaxValidation' => false,
        ]); ?>

        <input type="hidden" name="phone" class="sx-email" />
        <div class="form-group">
            <input type="text"
                   name="email_code"
                   placeholder="Проверочный код из Email"
                   class="form-control"
            />
        </div>
        <div class="mb-4">
            <button class="btn btn-md btn-block btn-primary sx-btn-submit" type="submit">Войти</button>
        </div>
        <?php $form::end(); ?>

        <div class="text-center sx-email-trigger-wrapper">
            <span class="sx-email-code-wait">Выслать код повторно, через: <span class="sx-left-time"></span> сек.</span>
            <a href="#" class="sx-dashed sx-email-code-trigger">Выслать одноразовый код на email</a>
        </div>
        <div class="text-center">
            <a href="#" class="sx-trigger-action sx-dashed" data-action="auth-by-email">Войти с другим email</a>
        </div>

    </div>

    <div class="text-center">
        <? if (isset(\Yii::$app->authClientCollection) && \Yii::$app->authClientCollection->clients) : ?>
            <?= yii\authclient\widgets\AuthChoice::widget([
                'baseAuthUrl' => ['/authclient/auth/client'],
                'popupMode'   => true,
            ]) ?>
        <? endif; ?>
    </div>
<?php echo \yii\helpers\Html::endTag("div"); ?>