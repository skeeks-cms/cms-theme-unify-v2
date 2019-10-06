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
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" prefix="og: http://ogp.me/ns#">
    <head>
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

    $this->registerCss(<<<CSS
        
/*************************
*******Preloader CSS*********
**************************/
.sx-preloader {
  display: table;
  background: #1e1e1e;
  z-index: 999999;
  position: fixed;
  height: 100%;
  width: 100%;
  left: 0;
  top: 0;
}

.sx-loader-image {
  display: table-cell;
  vertical-align: middle;
  overflow: hidden;
  text-align: center;
}

CSS
    );
    ?>
    <div class="sx-preloader">
        <div class="sx-loader-image"></div>
    </div>
    <div>
        <main>
            <? /*= $this->render("@app/views/header"); */ ?>
            <?= $content; ?>
            <? /*= $this->render("@app/views/footer"); */ ?>
        </main>
    </div>
    <div class="text-center">
        <a href="https://cms.skeeks.com" style="color: #a5a5a5;" target="_blank" data-sx-widget="tooltip" title="<?= \Yii::t('skeeks/cms', 'Go to site {cms}', ['cms' => 'SkeekS CMS']) ?>">
            SkeekS CMS
        </a>
        | <a href="https://skeeks.com" style="color: #a5a5a5;" target="_blank" data-sx-widget="tooltip" title="<?= \Yii::t('skeeks/cms', 'Go to site of the developer') ?>">SkeekS.com</a>

    </div>
    <? /*= $this->render("@app/views/modals"); */ ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>