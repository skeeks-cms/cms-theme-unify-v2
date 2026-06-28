<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
/**
 * @var $theme \skeeks\cms\themes\unify\admin\UnifyThemeAdmin;
 */
$theme = $this->theme;
\skeeks\cms\themes\unify\admin\assets\UnifyAdminHeaderAsset::register($this);
?>
<?
$langs = \skeeks\cms\models\CmsLang::find()->active()->all();
$quickCreateItems = [
    ['label' => 'Задачу', 'icon' => 'fas fa-tasks', 'url' => \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams(['/cms/admin-cms-task/create'])->enableEmptyLayout()->enableNoActions()->url],
    ['label' => 'Компанию', 'icon' => 'fas fa-building', 'url' => \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams(['/cms/admin-cms-company/create'])->enableEmptyLayout()->enableNoActions()->url],
    ['label' => 'Клиента', 'icon' => 'fas fa-user', 'url' => \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams(['/cms/admin-user/create'])->enableEmptyLayout()->enableNoActions()->url],
    ['label' => 'Сделку', 'icon' => 'fas fa-handshake', 'url' => \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams(['/cms/admin-cms-deal/create'])->enableEmptyLayout()->enableNoActions()->url],
    ['label' => 'Счет', 'icon' => 'fas fa-file-invoice', 'url' => \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams(['/cms/admin-cms-bill/create'])->enableEmptyLayout()->enableNoActions()->url],
    ['label' => 'Платеж', 'icon' => 'fas fa-credit-card', 'url' => \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams(['/shop/admin-payment/create'])->enableEmptyLayout()->enableNoActions()->url],
];
$this->registerJs(<<<JS
(function(sx, $)
{
    $(document).on('click', '[data-sx-quick-create-url]', function(event) {
        event.preventDefault();

        var url = $(this).attr('data-sx-quick-create-url');
        if (!url) {
            return false;
        }

        if (sx.classes && sx.classes.backend && sx.classes.backend.widgets && sx.classes.backend.widgets.Action) {
            new sx.classes.backend.widgets.Action({
                url: url,
                isOpenNewWindow: true
            }).go();
        } else {
            window.location.href = url;
        }

        return false;
    });
})(sx, sx.$);
JS
);
?>
<header id="js-header" class="sx-header sx-header--sticky-top">
    <div class="<?= $theme->headerClasses; ?>">
        <nav class="navbar no-gutters">
            <div class="col-auto d-flex flex-nowrap sx-header-logo-toggler">
                <a href="<?= $theme->logoHref; ?>" class="navbar-brand d-flex align-self-center g-hidden-xs-down">
                    <? if ($theme->logoSrc) : ?>
                        <img class="default-logo" src="<?= $theme->logoSrc; ?>" alt="<?= $theme->logoTitle; ?>">
                    <? endif; ?>
                    <?= $theme->logoTitle; ?>
                </a>
            </div>

            <div class="col-auto d-flex sx-breadcrumbs-wrapper">
                <?/*= $this->render("@app/views/layouts/_breadcrumbs"); */?>
            </div>


            <div class="col-auto d-flex ml-auto sx-right-col">
                <div class="sx-btn-backend-header dropdown sx-header-quick-create">
                    <a href="#" data-toggle="dropdown" title="Быстро добавить" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-plus g-absolute-centered"></i>
                    </a>
                    <div class="dropdown-menu sx-header-quick-create__menu dropdown-menu-right">
                        <? foreach ($quickCreateItems as $quickCreateItem) : ?>
                            <a class="dropdown-item sx-header-quick-create__item" href="#" data-sx-quick-create-url="<?= \yii\helpers\Html::encode($quickCreateItem['url']); ?>">
                                <i class="<?= \yii\helpers\Html::encode($quickCreateItem['icon']); ?>"></i>
                                <span><?= \yii\helpers\Html::encode($quickCreateItem['label']); ?></span>
                            </a>
                        <? endforeach; ?>
                    </div>
                </div>
                <div class="sx-btn-backend-header">
                    <a href="#" data-sx-quick-access-toggle data-sx-quick-access-tab="users" title="Сотрудники">
                        <i class="fas fa-users g-absolute-centered"></i>
                    </a>
                </div>
                <div class="sx-btn-backend-header">
                    <a href="#" data-sx-quick-access-toggle data-sx-quick-access-tab="favorites" title="Избранное">
                        <i class="fas fa-star g-absolute-centered"></i>
                    </a>
                </div>
                <?php if (\Yii::$app->skeeks->site->cmsSiteMainDomain || (!\Yii::$app->skeeks->site->cmsSiteMainDomain && Yii::$app->skeeks->site->is_default)) : ?>
                    <div class="sx-btn-backend-header">
                        <a
                                href="<?= \Yii::$app->skeeks->site->url; ?>"
                                target="_blank"
                                title="<?= \Yii::t('skeeks/cms', 'To main page of site') ?>"
                        >
                            <!--<span class="u-badge-v1 g-top-7 g-right-7 g-width-18 g-height-18 g-bg-primary g-font-size-10 g-color-white rounded-circle p-0">7</span>-->
                            <i class="fas fa-external-link-alt g-absolute-centered"></i>
                        </a>
                    </div>
                <?php endif; ?>
                <? if (\Yii::$app->user->can('cms/admin-cache')) : ?>
                    <?
                    $clearCacheOptions = \yii\helpers\Json::encode([
                        'backend' => \skeeks\cms\helpers\UrlHelper::construct(['/cms/admin-cache/invalidate'])->enableAdmin()->toString(),
                    ]);

                    $this->registerJs(<<<JS
(function(sx, $, _)
{
  
    sx.classes.ClearCache = sx.classes.Component.extend({

        execute: function(code)
        {
            this.ajaxQuery = sx.ajax.preparePostQuery(this.get('backend'), {
                'code' : code
            });

            var Handler = new sx.classes.AjaxHandlerStandartRespose(this.ajaxQuery, {
                'enableBlocker'                      : true,
                'blockerSelector'                    : 'body',
            });

            this.ajaxQuery.execute();
        }
    });

    sx.ClearCache = new sx.classes.ClearCache({$clearCacheOptions});

})(sx, sx.$, sx._);
JS
                    );
                    ?>
                    <div class="sx-btn-backend-header">
                        <a
                                href="#" onclick="sx.ClearCache.execute(); return false;"
                                title="<?= \Yii::t('skeeks/cms', 'Clear cache and temporary files') ?>"
                        >
                            <!--<span class="u-badge-v1 g-top-7 g-right-7 g-width-18 g-height-18 g-bg-primary g-font-size-10 g-color-white rounded-circle p-0">7</span>-->
                            <i class="fas fa-sync g-absolute-centered"></i>
                        </a>
                    </div>

                    <!--<li class="sx-left-border dropdown visible-md visible-lg visible-sm visible-xs">
                    <a href="#" onclick="sx.ClearCache.execute(); return false;" style="width: auto;" data-sx-widget="tooltip-b" data-original-title="<? /*=\Yii::t('skeeks/cms','Clear cache and temporary files')*/ ?>"><i class="glyphicon glyphicon-refresh"></i></a>
                </li>-->
                <? endif; ?>

                <? if (\Yii::$app->user->can('cms/admin-settings')) : ?>

                    <div class="sx-btn-backend-header">
                        <a
                                href="<?= \yii\helpers\Url::to(['/cms/admin-settings']); ?>"
                                title="<?= \Yii::t('skeeks/cms', 'Project settings') ?>"
                        >
                            <!--<span class="u-badge-v1 g-top-7 g-right-7 g-width-18 g-height-18 g-bg-primary g-font-size-10 g-color-white rounded-circle p-0">7</span>-->
                            <i class="hs-admin-settings g-absolute-centered"></i>
                        </a>
                    </div>

                <? endif; ?>


                <? if (count($langs) > 1) : ?>
                    <?
                    $langOptions = \yii\helpers\Json::encode([
                        'backend' => \skeeks\cms\helpers\UrlHelper::construct(['/cms/admin-ajax/set-lang'])->enableAdmin()->toString(),
                    ]);

                    $this->registerJs(<<<JS
(function(sx, $, _)
{
    sx.classes.ChangeLang = sx.classes.Component.extend({

        setLang: function(code)
        {
            this.ajaxQuery = sx.ajax.preparePostQuery(this.get('backend'), {
                'code' : code
            });

            var Handler = new sx.classes.AjaxHandlerStandartRespose(this.ajaxQuery, {
                'enableBlocker'                      : true,
                'blockerSelector'                    : 'body',
            });

            Handler.bind('success', function()
            {
                window.location.reload();
            });

            this.ajaxQuery.execute();
        }
    });
    
    sx.ChangeLang = new sx.classes.ChangeLang({$langOptions});

})(sx, sx.$, sx._);
JS
                    );
                    ?>
                    <!-- Top User -->
                    <div class="col-auto d-flex sx-lang-col">
                        <div class="dropdown">
                            <a class="d-block dropdown-toggle" href="#" data-toggle="dropdown">
                                <!--<span class="g-pos-rel">
                                 <img class="g-width-20 g-width-20 g-height-20 g-height-20 rounded-circle g-mr-5--sm sx-avatar"
                                      src="<? /*= \Yii::$app->admin->cmsLanguage->image ? \Yii::$app->admin->cmsLanguage->image->src : \skeeks\cms\helpers\Image::getCapSrc(); */ ?>"
                                 >
                            </span>-->
                                <span class="g-pos-rel g-top-2">
                                    <span class="g-hidden-sm-down"><?= \Yii::$app->admin->cmsLanguage->name; ?></span>
                                </span>
                            </a>

                            <!-- Top User Menu -->
                            <ul id="sx-lang-menu" class="dropdown-menu">


                                <? foreach ($langs as $lang) : ?>

                                    <li>
                                        <a class="media" href="#" onclick="sx.ChangeLang.setLang('<?= $lang->code; ?>'); return false;">
                                            <!--<span class="d-flex align-self-center g-mr-12">

                                                <? /* if ($lang->image) : */ ?>
                                                    <img class="pull-right" height="20" style="" src="<? /*= $lang->image->src; */ ?>"/>
                                                <? /* else: */ ?>
                                                    <img class="pull-right" height="20" style="" src="<? /*= \skeeks\cms\helpers\Image::getCapSrc(); */ ?>"/>
                                                <? /* endif; */ ?>

                                            </span>-->
                                            <span class="media-body align-self-center">
                                            [<?= $lang->code; ?>]&nbsp;<?= $lang->name; ?>
                                            </span>
                                        </a>
                                    </li>
                                <? endforeach; ?>


                            </ul>
                            <!-- End Top User Menu -->
                        </div>
                    </div>
                    <!-- End Top User -->
                <? endif; ?>


                <!-- Top User -->
                <div class="col-auto d-flex sx-user-profile-col">
                    <div class="sx-header-user-profile dropdown">
                        <a class="d-block dropdown-toggle" href="#" data-toggle="dropdown">
                            <span class="g-pos-rel">
                                <img class="rounded-circle sx-avatar"
                                     src="<?= \Yii::$app->user->identity->avatarSrc ? \Yii::$app->user->identity->avatarSrc : \skeeks\cms\helpers\Image::getCapSrc(); ?>" alt="Image description">
                            </span>
                            <span class="g-pos-rel g-top-2">
                                <span class="g-hidden-sm-down"><?= \Yii::$app->user->identity->shortDisplayName; ?></span>
                            </span>
                        </a>

                        <!-- Top User Menu -->
                        <ul class="dropdown-menu">

                            <li>
                                <a class="media" href="<?= \yii\helpers\Url::to(['/cms/admin-profile/update']); ?>">
                                    <span class="d-flex align-self-center sx-i-w">
                                      <i class="hs-admin-user"></i>
                                    </span>
                                    <span class="media-body align-self-center"><?= \Yii::t('skeeks/cms', 'Profile') ?></span>
                                </a>
                            </li>

                            <li>
                                <a class="media" href="<?= \skeeks\cms\helpers\UrlHelper::construct('/admin/admin-auth/lock')->setCurrentRef(); ?>" data-method="post">
                                    <span class="d-flex align-self-center sx-i-w">
                                      <i class="fas fa-lock"></i>
                                    </span>
                                    <span class="media-body align-self-center"><?= \Yii::t('skeeks/cms', 'To block'); ?></span>
                                </a>
                            </li>

                            <li>
                                <a class="media" href="<?= \skeeks\cms\helpers\UrlHelper::construct('/cms/auth/logout')->setCurrentRef(); ?>" data-method="post">
                                    <span class="d-flex align-self-center sx-i-w">
                                      <i class="hs-admin-shift-right"></i>
                                    </span>
                                    <span class="media-body align-self-center">Выход</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
