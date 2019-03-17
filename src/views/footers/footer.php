<?
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>
<footer class="g-bg-black g-color-white-opacity-0_8 text-center g-pt-60 g-pb-40 sx-no-print">
    <!-- Footer Content -->
    <div class="container">
        <div class="row">
            <!-- Footer Content -->
            <div class="col-sm-6 col-lg g-mb-30 g-mb-0--lg">
                <a class="d-block g-width-100 mx-auto g-mb-30" href="<?= \yii\helpers\Url::home(); ?>" title="<?= $this->theme->title; ?>">
                    <img class="img-fluid" src="<?= $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                </a>

                <ul class="list-inline g-mb-20">


                    <li class="list-inline-item g-mx-5">
                        <a class="u-icon-v2 u-icon-size--sm g-font-size-16 g-color-white-opacity-0_8 g-color-white--hover g-bg-primary--hover g-brd-white-opacity-0_2 g-brd-primary--hover rounded-circle"
                           href="https://vk.com/skeeks_com"
                           target="_blank"
                        >
                            <i class="fa fa-vk"></i>
                        </a>
                    </li>

                    <li class="list-inline-item g-mx-5">
                        <a class="u-icon-v2 u-icon-size--sm g-font-size-16 g-color-white-opacity-0_8 g-color-white--hover g-bg-primary--hover g-brd-white-opacity-0_2 g-brd-primary--hover rounded-circle"
                           href="https://www.youtube.com/c/skeeks"
                           target="_blank"
                        >
                            <i class="fa fa-youtube"></i>
                        </a>
                    </li>

                    <li class="list-inline-item g-mx-5">
                        <a class="u-icon-v2 u-icon-size--sm g-font-size-16 g-color-white-opacity-0_8 g-color-white--hover g-bg-primary--hover g-brd-white-opacity-0_2 g-brd-primary--hover rounded-circle"
                           href="https://www.instagram.com/skeeks_com/"
                           target="_blank"
                        >
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-5">
                        <a class="u-icon-v2 u-icon-size--sm g-font-size-16 g-color-white-opacity-0_8 g-color-white--hover g-bg-primary--hover g-brd-white-opacity-0_2 g-brd-primary--hover rounded-circle"
                           href="https://www.facebook.com/skeekscom"
                           target="_blank"
                        >
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Footer Content -->

            <!-- Footer Content -->
            <!--<div class="col-sm-6 col-lg g-mb-30 g-mb-0--lg">
                <? /*= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                    'namespace'          => 'ContentElementsCmsWidget-footer',
                    'enabledRunCache'    => \skeeks\cms\components\Cms::BOOL_Y,
                    'viewFile'           => '@template/widgets/ContentElementsCmsWidget/articles-footer',
                    'label'              => 'Публикации',
                    'enabledCurrentTree' => \skeeks\cms\components\Cms::BOOL_N,
                    'limit'              => 4,
                ]) */ ?>

            </div>-->
            <!-- End Footer Content -->

            <!-- Footer Content -->
            <div class="col-sm-6 col-lg">
                <?= \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
                    'namespace' => 'menu-footer-2',
                    'viewFile'  => '@app/views/widgets/TreeMenuCmsWidget/menu-footer',
                    'label'     => \Yii::t('app', 'Menu'),
                    'level'     => '1',
                ]); ?>
            </div>

            <div class="col-sm-6 col-lg">


                <? if (\Yii::$app->user->isGuest) : ?>

                    <h2 class="h6 g-color-white text-uppercase g-font-weight-600 g-mb-20">Авторизация</h2>

                    <ul class="list-unstyled mb-0">
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/login'); ?>" title="Вход">
                                <i class="fa fa-sign-in"></i> Вход
                            </a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/register'); ?>" title="Регистрация">
                                <i class="fas fa-user-plus"></i> Регистрация
                            </a>
                        </li>
                    </ul>
                <? else : ?>

                    <h2 class="h6 g-color-white text-uppercase g-font-weight-600 g-mb-20">Личные данные</h2>

                    <ul class="list-unstyled mb-0">

                        <li class="g-mb-8">
                            <!-- Top User -->
                            <a class="g-color-white-opacity-0_8 " href="<?= \yii\helpers\Url::to(['/upa-home']) ?>">
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
                            <a class="g-color-white-opacity-0_8" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/logout')->setCurrentRef(); ?>" data-method="post">
                                <i class="fas fa-sign-out-alt"></i> Выход
                            </a>
                        </li>

                    </ul>
                    <!-- End Top User -->
                <? endif; ?>
            </div>
            <!-- End Footer Content -->

            <!-- Footer Content -->
            <div class="col-sm-6 col-lg">
                <h2 class="h6 g-color-white text-uppercase g-font-weight-600 g-mb-20"><?= \Yii::t('app', 'Contacts'); ?></h2>
                <address class="md-margin-bottom-40">
                    <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('text-footer-address'); ?>
                    Москва, Зеленоград, 2005-29 <br/>
                    Россия, Москва <br/>
                    Телефон: <a href="tel:+74950057926">(+7 495) 005-79-26</a> <br/>
                    Email: <a href="mailto:info@skeeks.com" class="">info@skeeks.com</a>
                    <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>
                </address>
            </div>
            <!-- End Footer Content -->
        </div>
    </div>
    <!-- End Footer Content -->

    <hr class="g-brd-white-opacity-0_2 g-my-20">

    <!-- Copyright -->
    <div class="container">
        <div class="col-md-12">
            <div class="g-font-size-default pull-left">© 2019 <?= \Yii::t('app', "All rights reserved"); ?>
            </div>
        </div>
    </div>
    <!-- End Copyright -->
</footer>
<!-- End Footer -->
<a class="js-go-to u-go-to-v1" href="#!" data-type="fixed" data-position='{
             "bottom": 15,
             "right": 15
           }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
    <i class="hs-icon hs-icon-arrow-top"></i>
</a>
<div class="u-outer-spaces-helper"></div>

<?
$this->registerJs(<<<JS
// initialization of go to
$.HSCore.components.HSGoTo.init('.js-go-to');
JS
);
?>