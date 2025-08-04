<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
/* @see https://htmlstream.com/public/preview/unify-v2.6.1/unify-main/shortcodes/headers/classic-header--topbar-1.html */
\skeeks\assets\unify\base\UnifyHsHamburgersAsset::register($this);
\skeeks\assets\unify\base\UnifyHsMegamenuAsset::register($this);

\skeeks\cms\themes\unify\assets\components\UnifyThemeHeaderMobileAsset::register($this);

$this->registerJs(<<<JS
    /* Перемещаем модальное окно в конец body. */
    /* Это не работает нормально когда включено mmenu! Лучше так не делать! */
    $('.modal').on('shown.bs.modal', function (e) {
        //$(this).appendTo("body")
    });
    
    $(function() {
        setTimeout(function() {
            $(".mm-title").attr("href", "#"); 
        }, 500);
        $(".mm-title").attr("href", "#"); 
    });
    
JS
);
?>
<? $items = [
];

$models = \skeeks\cms\models\CmsTree::find()->cmsSite()->andWhere(['level' => 1])->active()
    //->andWhere(['active' => 'Y'])
    ->orderBy(['priority' => SORT_ASC])
    ->all();
if ($models) {
    foreach ($models as $model) {
        $tmpItems = [];
        if ($model->children) {
            foreach ($model->getChildren()->active()->all() as $child) {
                if ($child->isActive) {


                    $tmpItems2 = [];
                    /**
                     * @var $child \skeeks\cms\models\CmsTree
                     */
                    if ($child->activeChildren) {
                        foreach ($child->activeChildren as $subchild) {
                            $tmpItems2[] = [
                                'label' => $subchild->name,
                                'url'   => $subchild->url,
                            ];
                        }
                    }

                    if ($tmpItems2) {
                        $tmpItems[] = [
                            'label' => $child->name,
                            'url'   => $child->url,
                            'items' => $tmpItems2,
                        ];
                    } else {
                        $tmpItems[] = [
                            'label' => $child->name,
                            'url'   => $child->url,
                        ];
                    }
                }
            }
        }

        $data = [
            'label' => $model->name,
            'url'   => $model->url,
        ];

        if ($tmpItems) {
            $data['items'] = $tmpItems;
        }

        $items[] = $data;
    }

}

?>

<div style="display: none; ">
    <?= skeeks\yii2\mmenu\Menu::widget([
        'id'            => 'sx-menu',
        'clientOptions' => [
            //'slidingSubmenus'   =>  false,
            'navbar'     => [
                'title' => 'Меню',
            ],
            //'setSelected'   =>  true,
            'offCanvas'  => [
                'position'     => "right",
                'pageSelector' => "#mm-0",
            ],
            'extensions' =>
                [
                    "fx-panels-slide-100",
                    "position-right",
                    "theme-dark"
                    /*
                    'shadow-page',
                    'shadow-panels',
                    "fx-menu-slide",
                    "fx-panels-slide-0",
                    "border-none", "fullscreen", "position-right"*/
                ],
            'dragOpen'   => [
                'open'     => true,
                'pageNode' => "#mm-0",
            ],

            'navbars' =>
                [
                    "position" => "bottom",
                    'content'  => [
                        \Yii::$app->skeeks->site->cmsSitePhone ? '<a href="tel:'.\Yii::$app->skeeks->site->cmsSitePhone->value.'" class="g-color-white g-color-white--hover">
                            '.\Yii::$app->skeeks->site->cmsSitePhone->value.'
                        </a>' : "",
                    ],
                ],
        ],

        'items' => $items,
    ]); ?>

</div>

<!-- Header -->
<!--u-header--sticky-top-->
<header id="js-header" class="u-shadow-v19 u-header u-header--toggle-section u-header--change-appearance" data-header-fix-moment="0">
    <!-- Top Bar -->

    <div class="u-header__section g-py-0 sx-main-menu-wrapper" data-header-fix-moment-exclude="g-py-0" data-header-fix-moment-classes="g-py-0">
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
            <div class="container">
                <div class="sx-menu-mobile-top">
                    <!-- Logo -->
                    <a href="<?= \yii\helpers\Url::home(); ?>" aria-label="<?= \Yii::$app->skeeks->site->name; ?>" title="<?= \Yii::$app->skeeks->site->name; ?>" class="navbar-brand d-block">
                        <img src="<?= $this->theme->mobile_logo ? $this->theme->mobile_logo : $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                    </a>
                    <?php if(\Yii::$app->cms->cmsSite->cmsSitePhone) : ?>
                        <a href="tel:<?= \Yii::$app->cms->cmsSite->cmsSitePhone->value; ?>" class="sx-mobile-phone-top">
                            <?= \Yii::$app->cms->cmsSite->cmsSitePhone->value; ?>
                        </a>
                    <?php endif; ?>
                    <div class="float-right sx-header-menu-right">
                        <!-- End Logo -->
                        <? if (\Yii::$app->view->theme->is_show_search_block) : ?>
                            <?php echo $this->render("@app/views/headers/_header-search"); ?>
                        <? endif; ?>
                        <?= @$content; ?>
                        <? if ($this->theme->is_header_auth) : ?>
                            <?php echo $this->render("@app/views/headers/_header-auth"); ?>
                        <? endif; ?>
                        <!-- Responsive Toggle Button -->

                        <!-- End Responsive Toggle Button -->
                    </div>
                    <a href="#sx-menu" class="navbar-toggler btn g-px-0 g-valign-middle" aria-label="Меню" title="Меню">
                        <span class="hamburger">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

</header>

<!-- End Header -->
