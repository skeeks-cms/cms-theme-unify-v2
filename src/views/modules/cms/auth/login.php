<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.03.2015
 */
/* @var $this yii\web\View */
/* @var $controller \frontend\controllers\AuthController */
$controller = $this->context;
\skeeks\cms\themes\unify\assets\components\UnifyThemeAuthAsset::register($this);
?>
<section class="sx-auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-lg-5">
                <div class="sx-auth-wrapper">
                    <header class="text-center mb-4">
                        <h1 class="h2">Авторизация</h1>
                    </header>
                    <?php echo \skeeks\cms\themes\unify\widgets\auth\AuthWidget::widget(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

