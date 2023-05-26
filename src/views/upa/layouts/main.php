<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 06.03.2015
 */
use yii\helpers\Html;
//\skeeks\cms\themes\unify\admin\assets\UnifyAdminAppAsset::register($this);
//\skeeks\cms\themes\unify\assets\UnifyDefaultAsset::register($this);
/* @var $this \yii\web\View */
/* @var $content string */
$this->registerCss(<<<CSS
.sx-main-col {
    overflow: auto;
}
.js-side-nav {
    display: none !important;
}
.container-full-width .sx-container {
    max-width: 100%;
}
CSS
);
$isEmpty = \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams()->setBackendParamsByCurrentRequest()->isEmptyLayout;
\skeeks\cms\themes\unify\assets\UnifyThemeUpaAsset::register($this);

if (\skeeks\cms\backend\helpers\BackendUrlHelper::createByParams()->setBackendParamsByCurrentRequest()->isEmptyLayout) {
    $this->theme->bodyCssClass = $this->theme->bodyCssClass.' sx-empty';
}
/*$this->theme->bodyCssClass .= " ".$this->theme->upa_container;*/
$this->theme->bodyCssClass .= " sx-upa-body";

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" prefix="og: http://ogp.me/ns#" class="<?= $this->theme->htmlCssClass; ?>" data-outer-spaces="<?= $this->theme->htmlCssClass; ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!--<link rel="icon" type="image/x-icon" href="<? /*= $this->theme->favicon; */ ?>"/>-->
        <?php $this->head() ?>
    </head>
    <?php
        $bodyClasses = $this->theme->bodyCssClass;
        if (\Yii::$app->mobileDetect->isMobile) {
            $bodyClasses = $bodyClasses . " sx-mobile-layout";
        }
    ?>
    <?php if($bodyClasses) : ?>
        <body class="<?= $bodyClasses; ?>">
    <?php else : ?>
        <body>
    <?php endif; ?>
    <?php $this->beginBody() ?>
    
    <div class="sx-main-wrapper"><!--Нужен для mmenu-->
        <main>


            <?php if (!$isEmpty) : ?>
                <?= $this->render("@app/views/header"); ?>
            <? endif; ?>


            <section class="sx-main-section">
            <div class="container sx-container">

                <div class="sx-main-wrapper-row">
                    <?php if (!$isEmpty && !\Yii::$app->user->isGuest) : ?>

                        <div id="sideNav" class="col-auto u-sidebar-navigation-v1 u-sidebar-navigation--light sx-bg-secondary">
                            <? /*= $this->render("@app/views/layouts/_before-menu"); */ ?>
                            <?= $this->render("@app/views/layouts/_menu"); ?>

                            <a class="btn btn-default btn-block" href="<?= \yii\helpers\Url::to(['/cms/auth/logout']) ?>" data-method="post">
                                <i class="icon-logout"></i>
                                Выход
                            </a>

                            <!--<div class="text-center g-mt-20">

                                <a class="btn btn-default" href="<?/*= \yii\helpers\Url::to(['/cms/auth/logout']) */?>" data-method="post">
                                    <i class="icon-logout"></i>
                                    Выход
                                </a>
                            </div>-->
                            <? /*= $this->render("@app/views/layouts/_after-menu"); */ ?>
                        </div>
                    <? endif; ?>

                    <!-- End Sidebar Nav -->
                    <div class="col sx-main-col">
                        <!-- Statistic Card -->
                        <div class="sx-content-wrapper">
                            <div class="sx-content-actions">
                                <? if (!\skeeks\cms\backend\helpers\BackendUrlHelper::createByParams()->setBackendParamsByCurrentRequest()->isNoActions) : ?>
                                    <? if (\Yii::$app->controller && \Yii::$app->controller instanceof \skeeks\cms\backend\IHasInfoActions
                                        && \Yii::$app->controller->actions) : ?>
                                        <?
                                        echo \skeeks\cms\backend\widgets\ControllerActionsWidget::currentWidget([
                                            'options'            => [
                                                //'class' => 'nav justify-content-center u-nav-v4-1 u-nav-primary sx-main-page-nav',
                                                'class' => 'nav u-nav-v7-1 u-nav-primary sx-main-page-nav',
                                                'style' => 'font-size: 16px;',
                                            ],
                                            'itemWrapperOptions' => [
                                                'class' => 'nav-item',
                                            ],
                                            'itemOptions'        => [
                                                'class' => 'nav-link',
                                            ],
                                        ]);
                                        ?>
                                    <? endif; ?>
                                <? endif; ?>
                            </div>

                            <? if (\Yii::$app->controller && \Yii::$app->controller instanceof \skeeks\cms\backend\controllers\IBackendModelController
                        && \Yii::$app->controller->modelActions && count(\Yii::$app->controller->modelActions) > 1) : ?>

                        <? if (!\skeeks\cms\backend\helpers\BackendUrlHelper::createByParams()->setBackendParamsByCurrentRequest()->isNoModelActions) : ?>

                            <div class="sx-content-model-actions">
                                <div class="panel-content-before panel-content-before-second">
                                    <? if (\Yii::$app->controller && \Yii::$app->controller instanceof \skeeks\cms\backend\controllers\IBackendModelController
                                        && \Yii::$app->controller->modelActions && count(\Yii::$app->controller->modelActions) > 1) : ?>


                                        <div class="sx-model-title" title="<?= \Yii::$app->controller->modelShowName; ?>">
                                            <?= \Yii::$app->controller->modelHeader; ?>
                                        </div>

                                        <div class="js-scrollbar sx-nav-model-wrapper" data-axis="x">
                                            <?
                                            $modelActions = \Yii::$app->controller->modelActions;
                                            \yii\helpers\ArrayHelper::remove($modelActions, "delete");
                                            \yii\helpers\ArrayHelper::remove($modelActions, "copy");

                                            echo \skeeks\cms\backend\widgets\ControllerActionsWidget::widget([
                                                'actions'            => $modelActions,
                                                'activeId'           => \Yii::$app->controller->action->id,
                                                'options'            => [
                                                    'class' => 'nav nav-tabs sx-nav-with-bg sx-mgr-6 sx-nav-model',
                                                ],
                                                'itemWrapperOptions' => [
                                                    'class' => 'nav-item',
                                                ],
                                                'itemOptions'        => [
                                                    'class' => 'nav-link',
                                                ],
                                            ]);
                                            ?>
                                        </div>


                                    <? endif; ?>
                                </div>
                            </div>
                        <? endif; ?>
                        <div class="tab-content">
                            <section>
                                <?= $content; ?>
                            </section>
                        </div>
                    <? else : ?>
                        <section>
                            <?= $content; ?>
                        </section>
                    <? endif; ?>


                            <!--</div>-->
                            <!-- End Statistic Card -->
                        </div>
                        <!-- End Statistic Card -->
                        <!--</div>
                    </div>-->

                    </div>
                </div>

                    </div>
            </section>

            <?php if(!$isEmpty) : ?>
                <?= $this->render("@app/views/footer"); ?>
            <?php endif; ?>

        </main>
    </div>
    <?= $this->render("@app/views/modals"); ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>