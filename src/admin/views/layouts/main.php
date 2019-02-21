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
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="icon" href="<?= $theme->favicon ?>" type="image/x-icon"/>
        <?php $this->head() ?>
    </head>
    <body class="<?= \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams()->setBackendParamsByCurrentRequest()->isEmptyLayout ? "sx-empty" : ""; ?>">
    <?php $this->beginBody() ?>
    <?= $this->render('@app/views/header'); ?>
    <main class="container-fluid px-0 g-pt-65">
        <?= $this->render('@app/views/container-begin'); ?>

        <? if (\skeeks\cms\backend\BackendComponent::getCurrent() instanceof \skeeks\hosting\backend\HostingVpsBackend) : ?>
            <div class="row no-gutters g-pos-rel g-overflow-x-hidden g-bg-gray-light-v4">
                <ul id="sideNavMenu" class="u-sidebar-navigation-v1-menu u-side-nav--top-level-menu mb-0">
                    <li class="u-sidebar-navigation-v1-menu-item u-side-nav--top-level-menu-item
                    ">
                        <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 sx-menu-link-pink"
                           href="<?= \yii\helpers\Url::to(['/hosting/upa-hosting/index']) ?>"
                        >
                    <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                    <i class="fas fa-arrow-left"></i>
                    </span>
                            <span class="media-body align-self-center">Все VPS аккаунты</span>
                        </a>
                    </li>
                </ul>
                <?
                \skeeks\hosting\assets\Vps2Asset::register($this);
                $vpsJs = \yii\helpers\Json::encode([
                    'id'           => \Yii::$app->hostingVpsBackend->vps->id,
                    'backendStart' => \yii\helpers\Url::to(['/hosting/hosting-vps/start']),
                    'backendStop'  => \yii\helpers\Url::to(['/hosting/hosting-vps/stop']),
                ]);
                $this->registerJs(<<<JS
(function(sx, $, _)
{
    sx.Vps = new sx.classes.Vps({$vpsJs});
})(sx, sx.$, sx._);
JS
                );
                ?>
                <? if (\Yii::$app->hostingVpsBackend->vps->status == \skeeks\hosting\models\HostingVps::STATUS_RUNNING) : ?>
                    <div class="text-center" style="
    /*background: #cdffcd;*/
    padding: 10px;
">

                        <?= \yii\helpers\Html::button('<i class="fa fa-power-off"></i> Выключить VPS', [
                            'class'   => 'btn btn-sm u-btn-inset u-btn-inset--rounded u-btn-primary g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10',
                            'onclick' => 'sx.Vps.stop(); return false;',
                        ]); ?>
                    </div>
                <? else : ?>
                    <div class="text-center" style="
                            /*margin-bottom: 20px;
    background: #ff00004f;*/
    padding: 10px;">

                        <?= \yii\helpers\Html::button('<i class="fa fa-play"></i> Включить VPS', [
                            'class'   => 'btn btn-sm u-btn-inset u-btn-inset--rounded u-btn-teal g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10',
                            'onclick' => 'sx.Vps.start(); return false;',
                        ]); ?>
                    </div>
                <? endif; ?>

            </div>

        <? elseif (\skeeks\cms\backend\BackendComponent::getCurrent()->id != 'upaBackend') : ?>
            <div class="row no-gutters g-pos-rel g-overflow-x-hidden g-bg-gray-light-v4 sx-hide-on-empty">
                <ul id="sideNavMenu" class="u-sidebar-navigation-v1-menu u-side-nav--top-level-menu mb-0">
                    <li class="u-sidebar-navigation-v1-menu-item u-side-nav--top-level-menu-item
                    ">
                        <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 sx-menu-link-pink"
                           href="<?= \yii\helpers\Url::to(['/upa-home']) ?>"
                        >
                    <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                    <i class="fas fa-arrow-left"></i>
                    </span>
                            <span class="media-body align-self-center">Личный кабинет</span>
                        </a>
                    </li>
                </ul>
            </div>
        <? endif; ?>

        <div class="row no-gutters g-pos-rel g-overflow-x-hidden g-min-height-100vh">
            <!-- Sidebar Nav -->
            <div id="sideNav" class="<?= $theme->slideNavClasses; ?>">
                <?= $this->render("@app/views/layouts/_admin-menu"); ?>

                <? if (\skeeks\cms\backend\BackendComponent::getCurrent()->id == 'crmBackend') : ?>

                    <div class="text-center g-mt-20 g-mb-20 sx-schedule-left-block">
                        <?= \skeeks\crm\widgets\ScheduleBtnWidget::widget(); ?>
                    </div>

                    <? if (\Yii::$app->user->identity->isWorkNow) : ?>

                        <? if (\Yii::$app->user->identity->crmTaskInWork) : ?>
                            <div class="text-center g-mt-20 g-mb-20 g-pt-10 g-pl-10 g-pr-10 g-pb-10 sx-schedule-left-block g-bg-in-work" style="
    overflow: hidden;
    line-height: 21px;
    text-align: left !important;">
                                <? /*= Html::a(\Yii::$app->user->identity->crmTaskInWork->asText, \Yii::$app->user->identity->crmTaskInWork->url); */ ?><!--
                                --><? /*= \skeeks\crm\widgets\TaskStatusWidget::widget(['task' => \Yii::$app->user->identity->crmTaskInWork]); */ ?>
                                <?= \skeeks\crm\widgets\TaskViewWidget::widget(['task' => \Yii::$app->user->identity->crmTaskInWork]); ?>
                            </div>
                        <? else : ?>
                            <div class="text-center g-mt-20 g-mb-20 g-pt-10 g-pl-10 g-pr-10 g-pb-10 sx-schedule-left-block g-bg-darkred">
                                <?= Html::a("Включите задачу!", \yii\helpers\Url::to(['/crm/work-crm-task']), ['style' => 'color: white;']); ?>
                            </div>
                        <? endif; ?>

                    <? endif; ?>


                    <div class="sx-left-block-workers">

                        <? $this->registerJs(<<<JS
                        $("body").on('click', ".sx-show-workers", function() {
                            $('.sx-left-block-workers-list-hide').toggle();
                            $(this).tooltip('hide');
                            $(this).hide();
                            return false;
                        });
JS
                        ); ?>

                        <? $userIds = []; ?>
                        <? if ($users = \common\models\User::findByAuthAssignments(\Yii::$app->crm->employee_auth_assignment)
                            //->joinWith("notEndCrmScheduleByDate as notEndCrmScheduleByDate")
                            ->joinWith("crmSchedulesByDate as crmSchedulesByDate")
                            ->andWhere(["is not", "crmSchedulesByDate.id", null])
                            ->all()
                        ) : ?>
                            <div class="sx-left-block-workers-list col-md-12 g-color-gray-dark-v6">
                                <h6><a href="<?= \yii\helpers\Url::to(['/crm/crm-user']); ?>">Сотрудники</a></h6>
                                <? foreach ($users as $user) : ?>
                                    <div class="card g-pa-10 g-mb-5">
                                        <? $userIds[] = $user->id; ?>
                                        <?= \skeeks\crm\widgets\WorkerViewWidget::widget(['user' => $user]); ?>
                                    </div>
                                <? endforeach; ?>
                            </div>
                        <? endif; ?>


                        <? /*
                        if ($users = \common\models\User::findByAuthAssignments('work')
                            ->andWhere(["not in", \common\models\User::tableName().".id", $userIds])
                            ->all()
                        ) : */ ?><!--
                            <div class="text-center">
                                <a href="#" class="sx-show-workers" data-toggle="tooltip" data-placement="right">Показать всех</a>
                            </div>

                            <div class="sx-left-block-workers-list sx-left-block-workers-list-hide col-md-12">
                                <? /* foreach ($users as $user) : */ ?>
                                    <div class="card g-pa-10 g-mb-5">
                                        <? /*= \skeeks\crm\widgets\WorkerViewWidget::widget(['user' => $user]); */ ?>
                                    </div>
                                <? /* endforeach; */ ?>
                            </div>
                        --><? /* endif; */ ?>



                        <?
                        $subquery = \skeeks\crm\models\CrmTaskSchedule::find()
                            ->select([
                                \skeeks\crm\models\CrmTaskSchedule::tableName().".*",
                                "crmTask.crm_project_id as crm_project_id",
                            ])
                            ->joinWith("crmTask as crmTask")
                            ->orderBy([\skeeks\crm\models\CrmTaskSchedule::tableName().".created_at" => SORT_DESC]);

                        $projects = \skeeks\crm\models\CrmProject::find()
                            ->joinWith('crmTasks as crmTasks')
                            //->joinWith('crmTasks.crmTaskSchedules as crmTaskSchedules')
                            ->leftJoin(['crmTaskSchedules' => $subquery], ['crmTaskSchedules.crm_project_id' => new \yii\db\Expression(\skeeks\crm\models\CrmProject::tableName().".id")])
                            ->where(['crmTaskSchedules.cms_user_id' => \Yii::$app->user->id])
                            ->orderBy([
                                'crmTaskSchedules.date'       => SORT_DESC,
                                'crmTaskSchedules.start_time' => SORT_DESC,
                            ])
                            ->groupBy(\skeeks\crm\models\CrmProject::tableName().".id")
                            ->limit(6)
                            ->all();
                        /*print_r($projects->createCommand()->rawSql);die;*/

                        ?>
                        <? if ($projects) : ?>
                            <div class="sx-left-block-workers g-color-gray-dark-v6">
                                <div class="sx-left-block-workers-list col-md-12">
                                    <h6><a href="<?= \yii\helpers\Url::to(['/crm/crm-project']); ?>">Последние проекты</a></h6>
                                    <? foreach ($projects as $project) : ?>
                                        <div class="card g-pa-10 g-mb-5">
                                            <?= \skeeks\crm\widgets\ProjectViewWidget::widget(['project' => $project]); ?>
                                        </div>
                                    <? endforeach; ?>
                                </div>
                            </div>
                        <? endif; ?>


                    </div>
                <? endif; ?>


            </div>
            <!-- End Sidebar Nav -->


            <div class="col g-ml-45 g-ml-0--lg g-pb-65--md sx-main-col">
                <!-- Breadcrumb-v1 -->
                <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20 sx-hide-on-empty">
                    <!--<div class="row">-->
                    <? $controller = \Yii::$app->controller; ?>
                    <? if ($controller && $controller instanceof \skeeks\cms\backend\IHasBreadcrumbs && $controller->breadcrumbsData) : ?>
                        <ul class="u-list-inline g-color-gray-dark-v6">

                            <li class="list-inline-item g-mr-10">
                                <a class="u-link-v5 g-color-gray-dark-v6 g-color-secondary--hover g-valign-middle" href="<?= \yii\helpers\Url::to(['/upa-home']) ?>">Рабочий стол</a>
                                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
                            </li>

                            <? if (\skeeks\cms\backend\BackendComponent::getCurrent()->id == 'hostingVpsBackend') : ?>
                                <li class="list-inline-item g-mr-10">
                                    <a class="u-link-v5 g-color-gray-dark-v6 g-color-secondary--hover g-valign-middle" href="<?= \yii\helpers\Url::to(['/hosting/upa-hosting/index']) ?>">Мои VPS</a>
                                    <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
                                </li>
                                <li class="list-inline-item g-mr-10">
                                    <a class="u-link-v5 g-color-gray-dark-v6 g-color-secondary--hover g-valign-middle" href="
                                    <?= \yii\helpers\Url::to(['/hosting/hosting-vps/index']) ?>">VPS <?= \Yii::$app->hostingVpsBackend->vps->id; ?></a>
                                    <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
                                </li>
                            <? elseif (\skeeks\cms\backend\BackendComponent::getCurrent()->id == 'crmBackend') : ?>
                                <li class="list-inline-item g-mr-10">
                                    <a class="u-link-v5 g-color-gray-dark-v6 g-color-secondary--hover g-valign-middle" href="<?= \yii\helpers\Url::to(['/work/crm-portal']) ?>">Кабинет сотрудника</a>
                                    <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
                                </li>
                            <? endif; ?>

                            <? $total = count($controller->breadcrumbsData); ?>
                            <? $counter = 0; ?>
                            <? foreach ($controller->breadcrumbsData as $row) : ?>
                                <? $counter++; ?>
                                <? if ($counter == $total) : ?>
                                    <li class="list-inline-item g-mr-10">
                                        <a class="u-link-v5 g-color-gray-dark-v6 g-color-secondary--hover g-valign-middle" href="<?= \yii\helpers\ArrayHelper::getValue($row,
                                            'url'); ?>"><?= \yii\helpers\ArrayHelper::getValue($row, 'label'); ?></a>
                                    </li>
                                <? else : ?>
                                    <li class="list-inline-item g-mr-10">
                                        <a class="u-link-v5 g-color-gray-dark-v6 g-color-secondary--hover g-valign-middle" href="<?= \yii\helpers\ArrayHelper::getValue($row,
                                            'url'); ?>"><?= \yii\helpers\ArrayHelper::getValue($row, 'label'); ?></a>
                                        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
                                    </li>
                                <? endif; ?>

                            <? endforeach; ?>
                        </ul>
                    <? endif; ?>
                </div>
                <!-- End Breadcrumb-v1 -->


                <!--<div class="g-bg-lightblue-v10-opacity-0_5 g-pa-20">
                    <div class="row">-->

                <!-- Statistic Card -->
                <div class="g-pa-20">
                    <!-- Statistic Card -->
                    <!--<div class="card g-brd-gray-light-v7 u-card-v1 g-pa-15 g-pa-25-30--md g-mb-30">-->
                    <!--<div class="card g-brd-gray-light-v7 g-pa-15 g-pa-25-30--md g-mb-30">-->
                    <!--<header class="media g-mb-30">
                        <h3 class="d-flex align-self-center text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0">Project statistics</h3>

                        <div class="media-body d-flex justify-content-end">
                            <a class="d-flex align-items-center hs-admin-panel u-link-v5 g-font-size-20 g-color-gray-light-v3 g-color-secondary--hover g-ml-5 g-ml-30--md" href="#!"></a>
                        </div>
                    </header>-->


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

                <!-- Footer -->
                <footer id="footer" class="u-footer--bottom-sticky g-bg-white g-color-gray-dark-v6 g-brd-top g-brd-gray-light-v7 g-pa-20">
                    <div class="row align-items-center">
                        <!-- Footer Nav -->
                        <div class="col-md-4 g-mb-10 g-mb-0--md">
                            <ul class="list-inline text-center text-md-left mb-0">
                                <li class="list-inline-item">
                                    <a class="g-color-gray-dark-v6 g-color-secondary--hover" href="<?= \yii\helpers\Url::home(); ?>">Главная</a>
                                </li>
                                <li class="list-inline-item">
                                    <span class="g-color-gray-dark-v6">|</span>
                                </li>

                                <li class="list-inline-item">
                                    <a class="g-color-gray-dark-v6 g-color-secondary--hover" href="<?= \yii\helpers\Url::to(['/cms/tree/view', 'dir' => 'about']); ?>">
                                        О компании
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!-- End Footer Nav -->

                        <!-- Footer Socials -->
                        <div class="col-md-4 g-mb-10 g-mb-0--md">
                            <ul class="list-inline g-font-size-16 text-center mb-0">
                                <li class="list-inline-item g-mx-10">
                                    <a href="https://www.facebook.com/skeekscom" class="g-color-facebook g-color-secondary--hover">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item g-mx-10">
                                    <a href="https://www.youtube.com/channel/UC26fcOT8EK0Rr80WSM44mEA" class="g-color-youtube g-color-secondary--hover">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item g-mx-10">
                                    <a href="https://github.com/skeeks-cms/cms" class="g-color-black g-color-secondary--hover">
                                        <i class="fa fa-github"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item g-mx-10">
                                    <a href="https://vk.com/skeeks_com" class="g-color-vk g-color-secondary--hover">
                                        <i class="fa fa-vk"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Footer Socials -->

                        <!-- Footer Copyrights -->
                        <div class="col-md-4 text-center text-md-right">


                            <? if (\Yii::$app->user->can('rbac/admin-permission') && \Yii::$app->controller instanceof \skeeks\cms\IHasPermissions) : ?>
                                <a class="text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#sx-permisson-modal" data-toggle="modal">
                                    <i class="fa fa-exclamation-circle"></i>
                                    <!--<i class="hs-admin-align-right g-absolute-centered"></i>-->
                                </a>
                            <? endif; ?>

                            <small class="d-block g-font-size-default">&copy; 2018 Skeeks.com</small>

                        </div>
                        <!-- End Footer Copyrights -->
                    </div>
                </footer>
                <!-- End Footer -->
            </div>
        </div>
    </main>
    <? if (\Yii::$app->user->can('rbac/admin-permission') && \Yii::$app->controller instanceof \skeeks\cms\IHasPermissions) : ?>
        <!--<div style="display: none; z-index: -100000;">-->
        <?= \skeeks\cms\backend\widgets\ModalPermissionWidget::widget([
            'id'                   => 'sx-permisson-modal',
            'controller'           => \Yii::$app->controller,
            'toggleButton'         => false,
            'standartToggleButton' => false,
        ]); ?>
        <!--</div>-->
    <? endif; ?>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript"> (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter35310795 = new Ya.Metrika({id: 35310795, clickmap: true, trackLinks: true, accurateTrackBounce: true, webvisor: true, trackHash: true});
                } catch (e) {
                }
            });
            var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () {
                n.parentNode.insertBefore(s, n);
            };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";
            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks"); </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/35310795" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript> <!-- /Yandex.Metrika counter -->

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>