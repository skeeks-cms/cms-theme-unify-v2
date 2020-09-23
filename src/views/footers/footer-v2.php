<?
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
\skeeks\cms\themes\unify\assets\components\UnifyThemeFooterAsset::register($this);
?>
<div id="contacts-section" class="sx-footer g-py-60">
    <!-- Footer Content -->
    <div class="container sx-container">
        <div class="row">
            <!-- Footer Content -->
            <div class="col-sm-6 col-lg g-mb-30 g-mb-0--lg text-center">
                <a class="d-block g-width-200 mx-auto g-mb-30" href="<?= \yii\helpers\Url::home(); ?>" title="<?= $this->theme->title; ?>">
                    <img class="img-fluid" src="<?= $this->theme->footer_logo ? $this->theme->footer_logo : $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                </a>
                <ul class="list-inline g-mb-20">
                    <?php if ($socials = \Yii::$app->skeeks->site->cmsSiteSocials) : ?>
                        <?php foreach ($socials as $social) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $social->url; ?>"
                                   target="_blank"
                                >
                                    <i class="fab fa-<?= $social->social_type; ?>"></i>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- End Footer Content -->
            <!-- Footer Content -->
            <? if (\Yii::$app->mobileDetect->isDesktop) : ?>
                <?= \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
                    'namespace'       => 'menu-footer-2',
                    'viewFile'        => '@app/views/widgets/TreeMenuCmsWidget/menu-footer',
                    'label'           => \Yii::t('skeeks/unify', 'Menu'),
                    'level'           => '1',
                    'enabledRunCache' => 'Y',
                ]); ?>
            <? endif; ?>

            <div class="col-sm-6 col-lg">
                <? if (\Yii::$app->user->isGuest) : ?>
                    <div class="u-heading-v2-3--bottom g-mb-20">
                        <div class="u-heading-v2__title h6 mb-0 sx-footer-title"><?= \Yii::t('skeeks/unify', 'Authorization'); ?></div>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="g-mb-8">
                            <a class="g-color-black" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/login'); ?>" title="<?= \Yii::t('skeeks/unify', 'Sign in'); ?>">
                                <i class="fas fa-sign-in"></i> <?= \Yii::t('skeeks/unify', 'Sign in'); ?>
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
                        <div class="u-heading-v2__title h6 mb-0 sx-footer-title"><?= \Yii::t('skeeks/unify', 'Personal data'); ?></div>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="g-mb-8">
                            <!-- Top User -->
                            <a class="" href="<?= \yii\helpers\Url::to(['/cms/upa-personal/update']) ?>">
                                <span class="g-pos-rel">
                                    <span class="u-badge-v2--xs u-badge--top-right g-hidden-sm-up g-bg-secondary g-mr-5"></span>
                                    <img class="g-width-30 g-width-30--md g-height-30 g-height-30--md rounded-circle"
                                         src="<?= \Yii::$app->user->identity->avatarSrc ? \Yii::$app->user->identity->avatarSrc : \skeeks\cms\helpers\Image::getCapSrc(); ?>" alt="Image description">
                                </span>
                                <span class="g-pos-rel g-top-2">
                                    <span class="g-hidden-sm-down"><?= \Yii::$app->user->identity->displayName; ?></span>
                                </span>
                            </a>
                        </li>
                        <li class="g-mb-8">
                            <!-- Top User -->
                            <a class="" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/logout')->setCurrentRef(); ?>" data-method="post">
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
                    <div class="u-heading-v2__title h6 mb-0 sx-footer-title"><?= \Yii::t('skeeks/unify', 'Contacts'); ?></div>
                </div>
                <?
                $widget = \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('footer-address-text');
                $widget->descriptor->name = 'Блок с адресом';
                ?>
                <address class="g-bg-no-repeat g-font-size-12 mb-0">
                    <?php if ($addresses = \Yii::$app->skeeks->site->cmsSiteAddresses) : ?>
                        <? foreach ($addresses as $address) : ?>
                            <div class="d-flex g-mb-20">
                                <div class="g-mr-10">
                                  <span class="u-icon-v3 u-icon-size--xs">
                                    <i class="fas fa-map-marker"></i>
                                  </span>
                                </div>
                                <p class="mb-0"><?= $address->value; ?></p>
                            </div>
                        <? endforeach; ?>
                    <?php endif; ?>

                    <?php if ($phones = \Yii::$app->skeeks->site->cmsSitePhones) : ?>
                        <? foreach ($phones as $phone) : ?>
                            <!-- Phone -->
                            <div class="d-flex g-mb-20">
                                <div class="g-mr-10">
                                  <span class="u-icon-v3 u-icon-size--xs">
                                    <i class="fas fa-phone"></i>
                                  </span>
                                </div>
                                <a class="" href="tel:<?= $phone->value; ?>"><?= $phone->value; ?></a>
                            </div>
                            <!-- End Phone -->
                        <? endforeach; ?>
                    <?php endif; ?>


                    <?php if ($emails = \Yii::$app->skeeks->site->cmsSiteEmails) : ?>
                        <? foreach ($emails as $email) : ?>
                            <div class="d-flex g-mb-20">
                                <div class="g-mr-10">
                                      <span class="u-icon-v3 u-icon-size--xs">
                                        <i class="fas fa-globe"></i>
                                      </span>
                                </div>
                                <p class="mb-0">
                                    <a class="" href="mailto:<?= $email->value; ?>"><?= $email->value; ?></a>
                                </p>
                            </div>
                        <? endforeach; ?>
                    <?php endif; ?>
                </address>
                <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>
            </div>
            <!-- End Footer Content -->

        </div>
    </div>
    <!-- End Footer Content -->

</div>
<?= $this->render('@app/views/include/footer-copyright'); ?>
