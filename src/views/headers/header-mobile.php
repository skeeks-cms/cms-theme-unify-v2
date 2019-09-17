<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
/* @see https://htmlstream.com/public/preview/unify-v2.6.1/unify-main/shortcodes/headers/classic-header--topbar-1.html */

\skeeks\assets\unify\base\UnifyHsDropdownAsset::register($this);
\skeeks\assets\unify\base\UnifyHsHeaderAsset::register($this);
\skeeks\yii2\mmenu\MenuAsset::register($this);
$this->registerCssFile('//mmenujs.com/mburger/mburger.css');
$this->registerJs(<<<JS

// initialization of HSDropdown component
  $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
    afterOpen: function(){
      $(this).find('input[type="search"]').focus();
    }
  });

$(window).on('load', function () {
    // initialization of header
    $.HSCore.components.HSHeader.init($('#js-header'));
    $.HSCore.helpers.HSHamburgers.init('.hamburger');

    // initialization of HSMegaMenu component
    $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 991
    });

    $('#dropdown-megamenu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 767
    });
    
    
    $('.sx-search-btn').click(function() {
        if ($(this).hasClass('sx-search-form-close')){
            $('.sx-search-form').animate({top: '-100px'});
            $('.sx-search-btn').removeClass('sx-search-form-close');
            return false;
        }
        else {
            $('.sx-search-form').animate({top: '0'});
            $('.sx-search-btn').addClass('sx-search-form-close');
            return false;
        }
       
    });
    
});
JS
);
$this->registerCss(<<<CSS
#sx-menu {
    z-index: 502;
}


CSS
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
            'pageScroll'    => true,
            //'slidingSubmenus'   =>  false,
            'navbar'    => [
                'title' => 'Меню',
            ],
            //'setSelected'   =>  true,
            'offCanvas' => [
                'position' => "right"
            ],
            'extensions' =>
                [
                    "fx-menu-slide", "shadow-page", "shadow-panels", "position-right", "pagedim-black", "theme-dark"
                    /*
                    'shadow-page',
                    'shadow-panels',
                    "fx-menu-slide",
                    "fx-panels-slide-0",
                    "border-none", "fullscreen", "position-right"*/
                ],
            'dragOpen' => true,
            'drag' => [
                'page' =>
                    [
                        'open' => true,
                    ],
                'panels' =>
                    [
                        'close' => true,
                    ]
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

        <div class="u-header__section u-header__section--dark g-py-0 sx-main-menu-wrapper" data-header-fix-moment-exclude="g-py-10" data-header-fix-moment-classes="g-py-0">
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
                    <a href="<?= \yii\helpers\Url::home(); ?>" title="<?= $this->theme->title; ?>" class="navbar-brand d-block d-sm-none">
                        <img src="<?= $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                    </a>
                    <!-- End Logo -->
                    <div class="d-inline-block g-pos-abs g-top-15 g-right-110 g-pos-rel--lg g-top-0--lg g-right-0--lg g-valign-middle g-ml-30 g-ml-0--lg sx-search-btn-block">
                        <a href="#" class="sx-search-btn g-font-size-20"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                    <?= @$content; ?>
                </div>
            </nav>
        </div>
    </header>
    <div  class="sx-search-form" style="top: -100px;">
        <form action="/search" method="get" style="margin-bottom: 0px;">
            <div class="row">
                <div class="col-sm-10 col-9">
                    <label for="search" class="sr-only">Поиск</label>
                    <input placeholder="Поиск..." for="search" type="text" class="form-control rounded-0 form-control-md"
                           name="<?= \Yii::$app->cmsSearch->searchQueryParamName; ?>"
                           value="<?= \Yii::$app->cmsSearch->searchQuery; ?>"/>
                </div>
                <div class="col-sm-2 g-pl-10 col-3">
                    <button type="submit" class="btn btn-md btn-secondary sx-btn-search rounded-0">Найти</button>
                </div>
            </div>
        </form>
    </div>
    <!-- End Header -->
