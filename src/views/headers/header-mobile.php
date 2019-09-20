<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
/* @see https://htmlstream.com/public/preview/unify-v2.6.1/unify-main/shortcodes/headers/classic-header--topbar-1.html */
$this->registerJs(<<<JS
    /* Перемещаем модальное окно в конец body. */
    $('.modal').on('shown.bs.modal', function (e) {
        $(this).appendTo("body")
    });
    
JS
);
?>
<? $items = [
];

$models = \skeeks\cms\models\CmsTree::find()->where(['level' => 1])->active()
    //->andWhere(['active' => 'Y'])
    ->orderBy(['priority'   =>  SORT_ASC])
    ->all();
if ($models)
{
    foreach ($models as $model)
    {
        $tmpItems = [];
        if ($model->children)
        {
            foreach ($model->getChildren()->active()->all() as $child)
            {
                if ($child->active = "Y")
                {
                    $tmpItems[] = [
                        'label' => $child->name,
                        'url' => $child->url,
                    ];


                }
            }
        }

        $data = [
            'label' => $model->name,
            'url' => $model->url,
        ];

        if ($tmpItems)
        {
            $data['items'] = $tmpItems;
        }

        $items[] = $data;
    }

}

?>

<div style="display: none; ">
    <?= skeeks\yii2\mmenu\Menu::widget([
        'id'    => 'sx-menu',
        'clientOptions'    => [
            //'slidingSubmenus'   =>  false,
            'navbar'    => [
                'title' => 'Меню',
            ],
            //'setSelected'   =>  true,
            'offCanvas' => [
                'position' => "right",
                'pageSelector' => "#mm-0"
            ],
            'extensions' =>
                [
                    "fx-panels-slide-100","position-right","theme-dark"
                    /*
                    'shadow-page',
                    'shadow-panels',
                    "fx-menu-slide",
                    "fx-panels-slide-0",
                    "border-none", "fullscreen", "position-right"*/
                ],
            'dragOpen' => [
                'open' => true,
                'pageNode'  =>  "#mm-0"
            ],

            'navbars' =>
                [
                    "position" => "bottom",
                    'content' => [
                        '<a href="tel:'. $this->theme->phone .'" class="g-color-white g-color-white--hover">
                            '. $this->theme->phone .'
                        </a>
                                    <a href="mailto:'. $this->theme->email .'" class="g-color-white g-color-white--hover">
                '. $this->theme->email .'
                        </a>'
                    ]
                ]
        ],

        'items' => $items,
    ]); ?>

</div>

    <!-- Header -->
    <!--u-header--sticky-top-->
    <header id="js-header" class="u-shadow-v19 u-header <?= $this->theme->is_header_sticky ? "u-header--sticky-top" : ""; ?> u-header--toggle-section u-header--change-appearance" data-header-fix-moment="0">
        <!-- Top Bar -->

        <div class="u-header__section g-py-0 sx-main-menu-wrapper" data-header-fix-moment-exclude="g-py-0" data-header-fix-moment-classes="g-py-0">
            <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
                <div class="container">
                            <!-- Responsive Toggle Button -->
                            <a href="#sx-menu" class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-0 g-right-0">
                        <span class="hamburger">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </span>
                            </a>
                            <!-- End Responsive Toggle Button -->

                            <!-- Logo -->
                            <a href="<?= \yii\helpers\Url::home(); ?>" title="<?= $this->theme->title; ?>" class="navbar-brand d-block">
                                <img src="<?= $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                            </a>
                            <!-- End Logo -->
                            <? if (\Yii::$app->view->theme->is_show_search_block) : ?>
                            <div class="d-inline-block g-pos-abs g-top-0 g-pt-0 g-right-110 sx-search-btn-block">
                                <a href="#" class="sx-search-btn"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </div>
                            <? endif; ?>
                            <?= @$content; ?>
                </div>
            </nav>
        </div>
        <? if (\Yii::$app->view->theme->is_show_search_block) :
            $this->registerJs(<<<JS
    
               $('body').on('click','.sx-search-btn', function() {
                    if ($(this).hasClass('sx-search-form-close')){
                        $('.sx-search-form').animate({top: '-100px'});
                        $('.sx-search-btn').removeClass('sx-search-form-close');
                        return false;
                    }
                    else {
                        $('.sx-search-form').animate({top: '100%'});
                        $('.sx-search-btn').addClass('sx-search-form-close');
                        return false;
                    }
                   
                });
    
JS
            );

            ?>
        <div  class="sx-search-form" style="top: -100px;">
            <form action="/search" method="get" class="g-mb-0">
                <div class="container">
                    <div class="row">
                            <div class="input-group">
                                <input placeholder="Поиск..." type="text" class="form-control rounded-0 form-control-md" name="<?= \Yii::$app->cmsSearch->searchQueryParamName; ?>"
                                       value="<?= \Yii::$app->cmsSearch->searchQuery; ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-md btn-secondary rounded-0 sx-btn-search" type="submit">Найти</button>
                                </div>
                            </div>

                    </div>
                </div>
            </form>
        </div>
        <? endif; ?>
    </header>

    <!-- End Header -->
