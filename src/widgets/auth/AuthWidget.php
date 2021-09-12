<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\widgets\auth;

use skeeks\cms\helpers\RequestResponse;
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

    public function init()
    {
        Html::addCssClass($this->options, "sx-auth-widget");

        $this->options['id'] = $this->id;

        $this->clientOptions['id'] = $this->id;
        $this->clientOptions['url-generate-phone-code'] = Url::to(['/cms/auth/generate-phone-code']);
        $this->clientOptions['url-generate-email-code'] = Url::to(['/cms/auth/generate-email-code']);

        if (!\Yii::$app->cms->smsProvider) {
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