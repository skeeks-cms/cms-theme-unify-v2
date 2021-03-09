<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.03.2015
 */
/* @var $this yii\web\View */
/* @var $model \skeeks\cms\models\forms\LoginFormUsernameOrEmail */

\skeeks\cms\themes\unify\assets\components\UnifyThemeAuthAsset::register($this);

use skeeks\cms\base\widgets\ActiveFormAjaxSubmit as ActiveForm;
use skeeks\cms\helpers\UrlHelper;

?>
<section class="g-bg-gray-light-v5 sx-auth-wrapper">
    <div class="container g-py-100">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-lg-5">
                <div class="u-shadow-v21 g-bg-white rounded g-py-40 g-px-30 sx-bg-block">

                    <header class="text-center mb-4">
                        <h2 class="h2 g-color-black g-font-weight-600"><?= $message; ?></h2>
                    </header>

                    <div class="text-center g-color-gray-dark-v5 g-font-size-13 mb-0">
                        <?= \yii\helpers\Html::a('Авторизация', UrlHelper::constructCurrent()->setRoute('cms/auth/login')->toString()) ?> |
                        <?= \yii\helpers\Html::a('Регистрация', UrlHelper::constructCurrent()->setRoute('cms/auth/register')->toString()) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

