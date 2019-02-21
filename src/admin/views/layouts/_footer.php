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

            <small class="d-block g-font-size-default">&copy; 2019 Skeeks.com</small>

        </div>
        <!-- End Footer Copyrights -->
    </div>
</footer>
<!-- End Footer -->