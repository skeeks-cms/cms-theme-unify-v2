<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 06.03.2015
 */
use yii\helpers\Html;

\skeeks\cms\themes\unify\assets\UnifyThemeAsset::register($this);
/* @var $this \yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="icon" type="image/x-icon" href="<?= $this->theme->favicon; ?>"/>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <? if ($this->theme->isShowLoader) : ?>
        <div class="preloader">
            <div id="loaderImage"></div>
        </div>
    <? endif; ?>
    <main>
        <?= $this->render("@app/views/header"); ?>
        <?= $content; ?>
        <?= $this->render("@app/views/footer"); ?>
    </main>
    <?= $this->render("@app/views/modals"); ?>
    <?= \Yii::$app->seo->countersContent; ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>