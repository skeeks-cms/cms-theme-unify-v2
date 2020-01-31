<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 06.03.2015
 */
use yii\helpers\Html;
\skeeks\cms\themes\unify\admin\assets\UnifyAdminAppAsset::register($this);

$class = $this->theme->themeAssetClass;
$class::register($this);
/* @var $this \yii\web\View */
/* @var $content string */
$this->registerCss(<<<CSS
.sx-main-col {
    overflow: auto;
}
.js-side-nav {
    display: none !important;
}
CSS
);
if (\skeeks\cms\backend\helpers\BackendUrlHelper::createByParams()->setBackendParamsByCurrentRequest()->isEmptyLayout) {
    $this->theme->bodyCssClass = $this->theme->bodyCssClass . ' sx-empty';
}
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" prefix="og: http://ogp.me/ns#" class="<?= $this->theme->htmlCssClass; ?>" data-outer-spaces="<?= $this->theme->htmlCssClass; ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="icon" type="image/x-icon" href="<?= $this->theme->favicon; ?>"/>
        <?php $this->head() ?>
    </head>
    <body class="<?= $this->theme->bodyCssClass; ?>">
    <?php $this->beginBody() ?>
    <? if ($this->theme->is_show_loader) : ?>
        <div class="preloader">
            <div id="loaderImage"></div>
        </div>
    <? endif; ?>
    <main>
        <?= $this->render("@app/views/header"); ?>


        <? if ($this->theme->upa_container != \skeeks\cms\themes\unify\UnifyTheme::UPA_CONTAINER_FULL) : ?>
        <div class="container">
            <? endif; ?>

            <div class="row no-gutters g-pos-rel g-overflow-x-hidden g-min-height-100vh">
                <!-- Sidebar Nav -->


                <a class="js-side-nav u-header__nav-toggler d-flex align-self-center ml-auto" href="#!" data-hssm-class="u-side-nav--mini u-sidebar-navigation-v1--mini" data-hssm-body-class="u-side-nav-mini"
                   data-hssm-is-close-all-except-this="true" data-hssm-target="#sideNav">
                    <i class="hs-admin-align-left"></i>
                </a>
                <div id="sideNav" class="col-auto u-sidebar-navigation-v1 u-sidebar-navigation--light g-bg-gray-light-v8">
                    <? /*= $this->render("@app/views/layouts/_before-menu"); */ ?>
                    <?= $this->render("@app/views/layouts/_menu"); ?>
                    <div class="text-center g-mt-20">

                        <a class="btn btn-default btn-secondary" style="color: white;" href="<?= \yii\helpers\Url::to(['/cms/auth/logout']) ?>" data-method="post"><i class="fas fa-sign-out-alt"></i>
                            Выход
                        </a>
                    </div>
                    <? /*= $this->render("@app/views/layouts/_after-menu"); */ ?>


                </div>
                <!-- End Sidebar Nav -->
                <div class="col g-ml-45 g-ml-0--lg g-pb-65--md sx-main-col">
                    <!-- Breadcrumb-v1 -->
                    <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20 sx-hide-on-empty">
                        <?= $this->render("@app/views/layouts/_breadcrumbs"); ?>
                    </div>
                    <!-- End Breadcrumb-v1 -->

                    <!-- Statistic Card -->
                    <div class="g-pa-20">
                        <div class="sx-empty-layout-hidden-no">
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
                            <div class="">
                                <div class="panel-content-before panel-content-before-second">
                                    <? if (\Yii::$app->controller && \Yii::$app->controller instanceof \skeeks\cms\backend\controllers\IBackendModelController
                                        && \Yii::$app->controller->modelActions && count(\Yii::$app->controller->modelActions) > 1) : ?>


                                        <div class="sx-model-title" title="<?= \Yii::$app->controller->modelShowName; ?>">
                                            <?= \Yii::$app->controller->modelHeader; ?>
                                        </div>

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


                                    <? endif; ?>
                                </div>
                            </div>
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

    <? if ($this->theme->upa_container != \skeeks\cms\themes\unify\UnifyTheme::UPA_CONTAINER_FULL) : ?>
        </div>
    <? endif; ?>



        <?= $this->render("@app/views/footer"); ?>
    </main>
    <?= $this->render("@app/views/modals"); ?>
    <?= \Yii::$app->seo->countersContent; ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>