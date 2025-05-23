<!-- Footer -->
<footer id="footer" class="u-footer--bottom-sticky">
    <div class="row align-items-center">
        <!-- Footer Nav -->
        <!-- End Footer Nav -->

        <!-- Footer Socials -->
        <div class="col-md-4 g-mb-10 g-mb-0--md">
            <? if (\Yii::$app->user->can('rbac/admin-permission') && \Yii::$app->controller instanceof \skeeks\cms\IHasPermissions) : ?>
                <a class="text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#sx-permisson-modal" data-toggle="modal">
                    <i class="fas fa-exclamation-circle"></i>
                    <!--<i class="hs-admin-align-right g-absolute-centered"></i>-->
                </a>
            <? endif; ?>
        </div>

        <div class="col-md-4 g-mb-10 g-mb-0--md text-center my-auto">


            <ul class="list-inline g-font-size-16 text-center mb-0 my-auto">
                <li class="list-inline-item g-mx-10">
                    <a href="https://www.facebook.com/skeekscom" class="g-color-facebook g-color-secondary--hover" target="_blank">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                </li>
                <li class="list-inline-item g-mx-10">
                    <a href="https://www.youtube.com/channel/UC26fcOT8EK0Rr80WSM44mEA" class="g-color-youtube g-color-secondary--hover" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                </li>
                <li class="list-inline-item g-mx-10">
                    <a href="https://github.com/skeeks-cms/cms" class="g-color-black g-color-secondary--hover" target="_blank">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
                <li class="list-inline-item g-mx-10">
                    <a href="https://vk.com/skeeks_com" class="g-color-vk g-color-secondary--hover" target="_blank">
                        <i class="fab fa-vk"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Footer Socials -->

        <!-- Footer Copyrights -->
        <div class="col-md-4  text-md-right text-md-right">

            <ul class="list-inline text-center text-md-right mb-0" style="margin-right: 1rem;">
                <li class="list-inline-item">
                    <a class="g-color-gray-dark-v6 g-color-secondary--hover" target="_blank" href="<?= \Yii::$app->cms->homePage; ?>">

                        <img src="<?= \Yii::$app->cms->logo(); ?>" style="max-height: 30px;"/>
                        &copy; <?= \Yii::$app->formatter->asDate(time(), "php:Y"); ?>
                        <?= \Yii::$app->cms->cmsName; ?>
                    </a>
                </li>
                <!--<li class="list-inline-item">
                    <a class="g-color-gray-dark-v6 g-color-secondary--hover" href="<? /*= \yii\helpers\Url::home(); */ ?>">Главная</a>
                </li>
                <li class="list-inline-item">
                    <span class="g-color-gray-dark-v6">|</span>
                </li>

                <li class="list-inline-item">
                    <a class="g-color-gray-dark-v6 g-color-secondary--hover" href="<? /*= \yii\helpers\Url::to(['/cms/tree/view', 'dir' => 'about']); */ ?>">
                        О компании
                    </a>-->


            </ul>


            <!--<small class="d-block g-font-size-default">&copy; 2019 Skeeks.com</small>-->

        </div>
        <!-- End Footer Copyrights -->
    </div>
</footer>
<!-- End Footer -->