<?
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>

    <div id="contacts-section" class="sx-footer g-bg-secondary g-py-60">
        <!-- Footer Content -->
        <div class="container">
            <div class="row">
                <!-- Footer Content -->
                <div class="col-sm-6 col-lg g-mb-30 g-mb-0--lg text-center">
                    <a class="d-block g-width-100 mx-auto g-mb-30" href="<?= \yii\helpers\Url::home(); ?>" title="<?= $this->theme->title; ?>">
                        <img class="img-fluid" src="<?= $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                    </a>
                    <ul class="list-inline g-mb-20">
                        <? if ($this->theme->vk) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->vk; ?>"
                                   target="_blank"
                                >
                                    <i class="fa fa-vk"></i>
                                </a>
                            </li>
                        <? endif; ?>

                        <? if ($this->theme->youtube) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->youtube; ?>"
                                   target="_blank"
                                >
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        <? endif; ?>


                        <? if ($this->theme->instagram) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->instagram; ?>"
                                   target="_blank"
                                >
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        <? endif; ?>

                        <? if ($this->theme->facebook) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->facebook; ?>"
                                   target="_blank"
                                >
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        <? endif; ?>

                    </ul>
                </div>
                <!-- End Footer Content -->
                <!-- Footer Content -->
                <?= \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
                    'namespace'       => 'menu-footer-2',
                    'viewFile'        => '@app/views/widgets/TreeMenuCmsWidget/menu-footer',
                    'label'           => \Yii::t('skeeks/unify', 'Menu'),
                    'level'           => '1',
                    'enabledRunCache' => 'N',
                ]); ?>

                <div class="col-sm-6 col-lg">
                    <? if (\Yii::$app->user->isGuest) : ?>
                        <div class="u-heading-v2-3--bottom g-mb-20">
                            <h2 class="u-heading-v2__title h6 text-uppercase mb-0 g-color-black g-font-weight-600"><?= \Yii::t('skeeks/unify', 'Authorization'); ?></h2>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li class="g-mb-8">
                                <a class="g-color-black" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/login'); ?>" title="<?= \Yii::t('skeeks/unify', 'Sign in'); ?>">
                                    <i class="fa fa-sign-in"></i> <?= \Yii::t('skeeks/unify', 'Sign in'); ?>
                                </a>
                            </li>
                            <li class="g-mb-8">
                                <a class="g-color-black" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/register'); ?>" title="<?= \Yii::t('skeeks/unify', 'Sign up'); ?>">
                                    <i class="fas fa-user-plus"></i> <?= \Yii::t('skeeks/unify', 'Sign up'); ?>
                                </a>
                            </li>
                        </ul>
                    <? else : ?>
                        <div class="u-heading-v2-3--bottom g-mb-20">
                            <h2 class="u-heading-v2__title h6 text-uppercase mb-0 g-color-black g-font-weight-600"><?= \Yii::t('skeeks/unify', 'Personal data'); ?></h2>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li class="g-mb-8">
                                <!-- Top User -->
                                <a class="g-color-black" href="<?= \yii\helpers\Url::to(['/cms/upa-personal/update']) ?>">
                                <span class="g-pos-rel">
                                    <span class="u-badge-v2--xs u-badge--top-right g-hidden-sm-up g-bg-secondary g-mr-5"></span>
                                    <img class="g-width-30 g-width-30--md g-height-30 g-height-30--md rounded-circle" src="<?= \Yii::$app->user->identity->avatarSrc ? \Yii::$app->user->identity->avatarSrc : \skeeks\cms\helpers\Image::getCapSrc(); ?>" alt="Image description">
                                </span>
                                    <span class="g-pos-rel g-top-2">
                                    <span class="g-hidden-sm-down"><?= \Yii::$app->user->identity->displayName; ?></span>
                                </span>
                                </a>
                            </li>
                            <li class="g-mb-8">
                                <!-- Top User -->
                                <a class="g-color-black" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/logout')->setCurrentRef(); ?>" data-method="post">
                                    <i class="fas fa-sign-out-alt"></i> <?= \Yii::t('skeeks/unify', 'Logout'); ?>
                                </a>
                            </li>
                        </ul>
                        <!-- End Top User -->
                    <? endif; ?>
                </div>
                <!-- End Footer Content -->
                <!-- Footer Content -->
                <div class="col-lg-3 col-md-6">
                    <div class="u-heading-v2-3--bottom g-mb-20">
                        <h2 class="u-heading-v2__title h6 text-uppercase mb-0 g-color-black g-font-weight-600"><?= \Yii::t('skeeks/unify', 'Contacts'); ?></h2>
                    </div>
                    <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('footer-address-text'); ?>
                    <address class="g-bg-no-repeat g-font-size-12 mb-0">
                        <!-- Location -->
                        <div class="d-flex g-mb-20">
                            <div class="g-mr-10">
                              <span class="u-icon-v3 u-icon-size--xs">
                                <i class="fa fa-map-marker"></i>
                              </span>
                            </div>
                            <p class="mb-0"><?= $this->theme->address; ?></p>
                        </div>
                        <!-- End Location -->
                        <!-- Phone -->
                        <div class="d-flex g-mb-20">
                            <div class="g-mr-10">
                              <span class="u-icon-v3 u-icon-size--xs">
                                <i class="fa fa-phone"></i>
                              </span>
                            </div>
                            <a class="g-color-black" href="tel:<?= $this->theme->phone; ?>"><?= $this->theme->phone; ?></a>
                        </div>
                        <!-- End Phone -->
                        <!-- Email and Website -->
                        <div class="d-flex g-mb-20">
                            <div class="g-mr-10">
                              <span class="u-icon-v3 u-icon-size--xs">
                                <i class="fa fa-globe"></i>
                              </span>
                            </div>
                            <p class="mb-0">
                                <a class="g-color-black" href="mailto:<?= $this->theme->email; ?>"><?= $this->theme->email; ?></a>
                            </p>
                        </div>
                        <!-- End Email and Website -->
                    </address>
                    <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>
                </div>
                <!-- End Footer Content -->

            </div>
        </div>
        <!-- End Footer Content -->

    </div>


    <!-- Copyright Footer -->
    <footer class="g-bg-secondary g-color-black g-py-20 sx-footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-center text-md-left g-mb-10 g-mb-0--md">
                    <div class="d-lg-flex">
                        <small class="d-block g-font-size-default g-mr-10 g-mb-10 g-mb-0--md" style="line-height:30px;">
                            <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('copy-address-text'); ?>
                            2019 &copy; <?= \Yii::t('skeeks/unify', 'All rights reserved'); ?>. <?= $this->theme->title; ?>
                            <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>
                        </small>

                    </div>
                </div>


                <div class="col-md-4 align-self-center">
                    <div class="pull-right">
                        <a href="https://skeeks.com/" target="_blank" class="g-color-gray-dark-v4" title="<?= \Yii::t('skeeks/unify', 'Site development'); ?> - SkeekS.com">
                            <img src="<?= \skeeks\cms\themes\unify\assets\UnifyThemeAsset::getAssetUrl('img/skeeks/logo.png') ?>" alt="<?= \Yii::t('skeeks/unify', 'Site development'); ?> - SkeekS.com" width="30">
                            <span><?= \Yii::t('skeeks/unify', 'Site development'); ?> - SkeekS.com</span>
                        </a>
                        <a href="https://cms.skeeks.com/" target="_blank" class="g-color-gray-dark-v4" title="Yii2 cms">
                            <span>(Yii2 CMS)</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Copyright Footer -->

    <!-- End Footer -->
    <a class="js-go-to u-go-to-v1" href="#!" data-type="fixed" data-position='{
             "bottom": 15,
             "right": 15
           }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
        <i class="hs-icon hs-icon-arrow-top"></i>
    </a>
    <div class="u-outer-spaces-helper"></div>

<?
\skeeks\assets\unify\base\UnifyHsGoToAsset::register($this);
$this->registerJs(<<<JS
// initialization of go to
$.HSCore.components.HSGoTo.init('.js-go-to');
JS
);
?>