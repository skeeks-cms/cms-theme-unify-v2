<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 06.03.2015
 */
use yii\helpers\Html;

\skeeks\cms\themes\unify\admin\assets\UnifyAdminUnauthorizedAsset::register($this);
//\skeeks\cms\themes\unify\assets\UnifyThemeAsset::register($this);
/* @var $this \yii\web\View */
/* @var $content string */
$theme = $this->theme;
$themeMode = $theme->normalizedThemeMode;
$themeModeStorageKey = (string) $theme->themeModeStorageKey;
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html
        lang="<?= Yii::$app->language ?>"
        prefix="og: http://ogp.me/ns#"
        data-sx-theme="<?= Html::encode($themeMode === 'dark' ? 'dark' : 'light') ?>"
        data-sx-theme-mode="<?= Html::encode($themeMode) ?>"
        data-sx-theme-storage-key="<?= Html::encode($themeModeStorageKey) ?>"
    >
    <head>
        <?= $this->render('@skeeks/cms/backend/views/layouts/_theme-mode-bootstrap', ['theme' => $theme]) ?>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!--<link rel="icon" type="image/x-icon" href="<? /*= $this->theme->favicon; */ ?>"/>-->
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <?
    $this->registerJs(<<<JS
$(".sx-preloader").fadeOut();
JS
    );

    ?>
    <div class="sx-preloader">
        <div class="sx-loader-image"></div>
    </div>
    <div class="sx-main-wrapper">
        <main>
            <? /*= $this->render("@app/views/header"); */ ?>
            <?= $content; ?>
            <? /*= $this->render("@app/views/footer"); */ ?>
            <div class="text-center sx-unauthorized-footer">
                <a href="https://cms.skeeks.com" target="_blank" data-sx-widget="tooltip" title="<?= \Yii::t('skeeks/cms', 'Go to site {cms}', ['cms' => 'SkeekS CMS']) ?>">
                    SkeekS CMS
                </a>
                | <a href="https://skeeks.com" target="_blank" data-sx-widget="tooltip" title="<?= \Yii::t('skeeks/cms', 'Go to site of the developer') ?>">SkeekS.com</a>
        
            </div>
        </main>
    </div>
    
    <? /*= $this->render("@app/views/modals"); */ ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
