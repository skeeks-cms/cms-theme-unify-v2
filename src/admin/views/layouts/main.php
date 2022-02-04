<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
\skeeks\cms\themes\unify\admin\assets\UnifyAdminAppAsset::register($this);
\skeeks\cms\widgets\user\UserOnlineTriggerWidget::widget();

/**
 * @var $theme \skeeks\cms\themes\unify\admin\UnifyThemeAdmin;
 */
$theme = $this->theme;
$isEmpty = \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams()->setBackendParamsByCurrentRequest()->isEmptyLayout;
if ($isEmpty && \Yii::$app->getModule('debug')) {
    \Yii::$app->getModule('debug')->panels = [];
}
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!--<link rel="icon" href="<? /*= $theme->favicon */ ?>" type="image/x-icon"/>-->
        <?php $this->head() ?>
    </head>
    <body class="has-fixed-sidebar <?= $isEmpty ? "sx-empty" : ""; ?>">
    <?php $this->beginBody() ?>
    <?php if (!$isEmpty) : ?>
        <?= $this->render('@app/views/layouts/_header'); ?>
    <? endif; ?>
    <main class="sx-main">
        <?= $this->render('@app/views/layouts/_container-begin'); ?>
        <div class="row no-gutters g-pos-rel g-overflow-y-hidden g-overflow-x-hidden sx-main-wrapper">
            <!-- Sidebar Nav -->
            <?php if (!$isEmpty) : ?>
                <div id="sideNav" class="<?= $theme->slideNavClasses; ?>"> <!--js-custom-scroll g-height-100vh-->
                    <div class="js-custom-scroll u-sidebar-navigation-v1-inner">
                        <?= $this->render("@app/views/layouts/_before-menu"); ?>
                        <?= $this->render("@app/views/layouts/_menu"); ?>
                        <?= $this->render("@app/views/layouts/_after-menu"); ?>
                    </div>
                </div>
            <?php endif; ?>
            <!-- End Sidebar Nav -->
            <div class="col g-pb-65--md sx-main-col">
                <?= $this->render("@app/views/layouts/_before-content"); ?>
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
                                            echo \skeeks\cms\backend\widgets\ControllerActionsWidget::widget([
                                                'actions'            => \Yii::$app->controller->modelActions,
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

                <?= $this->render("@app/views/layouts/_footer"); ?>
            </div>
        </div>
    </main>

    <?= $this->render("@app/views/layouts/_modals"); ?>
    <?= $this->render("@app/views/layouts/_end-body"); ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>