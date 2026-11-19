<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\widgets\auth;

use skeeks\cms\themes\unify\widgets\auth\assets\AuthAsset;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AuthWidget extends Widget
{
    public $viewFile = 'auth';

    public $options = [];

    public $clientOptions = [];

    public $action = "auth-by-phone";

    /**
     * @var bool разрешить авторизацию по email
     */
    public $is_allow_auth_by_email = null;

    /**
     * @var null Всегда отправлять проверочный код. Не использовать постоянный пароль.
     */
    public $auth_submit_code_always = null;

    /**
     * @var bool показывать обязательную галочку согласия на обработку персональных данных
     * в первом шаге входа (телефон или email): по нему же проходит регистрация (152-ФЗ).
     * null — по настройке сайта «Галочка согласия при входе и регистрации» в
     * «Правовой информации» (по умолчанию включена).
     */
    public $is_show_consent = null;

    /**
     * Обязательная галочка согласия для формы первого шага.
     *
     * @param string $key уникальная часть id в пределах виджета
     * @return string
     */
    public function renderConsent($key)
    {
        if (!\Yii::$app->has('legal') || !method_exists(\Yii::$app->legal, 'getConsentCheckboxText')) {
            return '';
        }
        $show = $this->is_show_consent;
        if ($show === null) {
            $show = isset(\Yii::$app->legal->is_auth_consent) ? (bool) \Yii::$app->legal->is_auth_consent : true;
        }
        if (!$show) {
            return '';
        }

        $id = $this->id."-consent-".$key;

        if (method_exists(\Yii::$app->legal, 'renderConsentCheckbox')) {
            return \Yii::$app->legal->renderConsentCheckbox($id);
        }

        return Html::tag('div',
            Html::checkbox('legal_consent', false, ['id' => $id, 'value' => 1, 'required' => true, 'class' => 'sx-legal-consent-input'])
            .' '.Html::tag('label', \Yii::$app->legal->consentCheckboxText, ['for' => $id, 'class' => 'sx-legal-consent-label']),
            ['class' => 'form-group sx-legal-consent']
        );
    }

    public function init()
    {
        Html::addCssClass($this->options, "sx-auth-widget");

        $this->options['id'] = $this->id;

        if ($this->is_allow_auth_by_email === null) {
            $this->is_allow_auth_by_email = (int)\Yii::$app->cms->is_allow_auth_by_email;
        }
        if ($this->auth_submit_code_always === null) {
            $this->auth_submit_code_always = (int)\Yii::$app->cms->auth_submit_code_always;
        }

        $this->clientOptions['id'] = $this->id;
        $this->clientOptions['url-generate-callcheck-phone-code'] = Url::to(['/cms/auth/generate-callcheck-phone-code']);
        $this->clientOptions['url-generate-phone-code'] = Url::to(['/cms/auth/generate-phone-code']);
        $this->clientOptions['url-generate-email-code'] = Url::to(['/cms/auth/generate-email-code']);

        if (\Yii::$app->cms->smsProvider) {
            $this->action = "auth-by-phone";
        } elseif (\Yii::$app->cms->callcheckProvider) {
            $this->action = "auth-by-callcheck-phone";
        } else {
            $this->action = "auth-by-email";
        }


        $this->clientOptions['action'] = $this->action;

        return parent::init();
    }

    /**
     * @return string
     */
    public function run()
    {
        AuthAsset::register($this->view);

        return $this->render($this->viewFile, [
            'widget' => $this,
        ]);
    }
}