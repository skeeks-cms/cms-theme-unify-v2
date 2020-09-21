<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 06.03.2015
 */
use yii\helpers\Html;

//$class = $this->theme->themeAssetClass;
//$class::register($this);
/* @var $this \yii\web\View */
/* @var $content string */
if ($this->theme->body_bg_image) {
    $this->registerCss(<<<CSS
.sx-main-bg {
    background-image: url('{$this->theme->body_bg_image}');
}
CSS
    );
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
        <!--<link rel="icon" type="image/x-icon" href="<?/*= $this->theme->favicon; */?>"/>-->
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <main class="g-min-height-100vh g-flex-centered g-bg-size-cover g-bg-cover g-bg-bluegray-opacity-0_3--after g-pa-15 sx-main-bg">
        <div class="text-center g-max-width-700 g-flex-centered-item g-z-index-1 g-color-white">
            <? if ($this->theme->logo) : ?>
                <h1 class="display-3 g-mb-30"><img src="<?= $this->theme->logo; ?>" style="max-height: 150px;"/></h1>
            <? endif; ?>
            <h1 class="display-3 g-mb-30">Сайт в разработке</h1>
            <p class="g-font-size-22 g-mb-50">Добро пожаловать! Мы скоро откроемся.</p>
        </div>
    </main>

    <?php $this->endBody() ?>
    <?= \Yii::$app->seo->countersContent; ?>
    </body>
    </html>
<?php $this->endPage() ?>