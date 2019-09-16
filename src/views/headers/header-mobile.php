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
    
});
JS
);
$this->registerCss(<<<CSS
#sx-menu {
    z-index: 502;
}
.mburger {
    --mb-button-size: 60px;
    --mb-bar-width: 0.6;
    --mb-bar-height: 4px;
    --mb-bar-spacing: 10px;
    --mb-cross-timeout: 0.4s;
    background: 0 0;
    border: none;
    border-radius: 0;
    color: inherit;
    display: inline-block;
    position: relative;
    box-sizing: border-box;
    height: var(--mb-button-size);
    padding: 0 0 0 var(--mb-button-size);
    margin: 0;
    line-height: var(--mb-button-size);
    vertical-align: middle;
    appearance: none;
    outline: 0;
    cursor: pointer;
}
.mburger {
    width: 50px;
    height: 50px;
    --mb-bar-height: 2px;
}
.mburger b {
    display: block;
    position: absolute;
    left: calc(var(--mb-button-size) * ((1 - var(--mb-bar-width))/ 2));
    width: calc(var(--mb-button-size) * var(--mb-bar-width));
    height: var(--mb-bar-height);
    border-radius: calc(var(--mb-bar-height)/ 2);
    background: currentColor;
    color: inherit;
    opacity: 1;
}
.mburger b:nth-of-type(1) {
    bottom: calc(50% + var(--mb-bar-spacing));
    transition: bottom .2s ease,transform .2s ease;
}
.mburger--collapse b:nth-of-type(2) {
    top: calc(50% - (var(--mb-bar-height)/ 2));
    transition: top .2s ease,opacity 0s ease;
    transition-delay: .3s,.3s;
}
.mburger--collapse b:nth-of-type(3) {
    top: calc(50% + var(--mb-bar-spacing));
    transition: top .2s ease,transform .2s ease;
}
.mm-wrapper_opened .mburger--collapse b:nth-of-type(2) {
    top: calc(50% + var(--mb-bar-spacing));
    opacity: 0;
    transition-delay: calc(var(--mb-cross-timeout) + 0s),calc(var(--mb-cross-timeout) + .2s);
}
.mm-wrapper_opened .mburger--collapse b:nth-of-type(3) {
    top: calc(50% - (var(--mb-bar-height)/ 2));
    transform: rotate(-45deg);
    transition-delay: calc(var(--mb-cross-timeout) + .3s),calc(var(--mb-cross-timeout) + .3s);
}
.mburger--collapse b:nth-of-type(1) {
    transition: bottom .2s ease,margin .2s ease,transform .2s ease;
    transition-delay: .2s,0s,0s;
}

CSS
);
?>

<!-- Header -->
<!--u-header--sticky-top-->
<header id="js-header" class="u-shadow-v19 u-header <?= $this->theme->is_header_sticky ? "u-header--sticky-top" : ""; ?> u-header--toggle-section u-header--change-appearance" data-header-fix-moment="0">
    <!-- Top Bar -->

    <div class="u-header__section u-header__section--dark g-py-0 sx-main-menu-wrapper" data-header-fix-moment-exclude="g-py-10" data-header-fix-moment-classes="g-py-0">
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
            <div class="container">
                <!-- Responsive Toggle Button -->
                <a class="mburger mburger--collapse" href="#sx-menu">
                    <b></b>
                    <b></b>
                    <b></b>
                </a>
                <!-- End Responsive Toggle Button -->
                <? $items[] = [
                    'label' => 'Главная',
                    'url' => \yii\helpers\Url::home(),
                    'icon' => 'glyphicon glyphicon-home'
                ];

                $models = \skeeks\cms\models\CmsTree::find()->where(['level' => 1])->active()
                    //->andWhere(['active' => 'Y'])
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
                        'slidingSubmenus'   =>  false,
                        'navbar'    => [
                            'title' => false
                        ],
                        'offCanvas' => [
                            'position' => "right"
                        ],
                        'extensions' =>
                            [
                                "pagedim-black",
                                "position-right",
                                "pagedim-black",
                            ],
                        //'dragOpen' => true,
                        'drag' => [
                            'page' =>
                                [
                                    'open' => true,
                                    //'node' => 'body'
                                ],
                            'panels' =>
                                [
                                    'close' => true,
                                ]
                        ],
                        'navbars' =>
                        [
                                'position' => 'bottom',
                                'content' => [
                                    '<a href="tel:'. $this->theme->phone .'" class="g-color-white g-color-white--hover">
                            '. $this->theme->phone .'
                        </a>
                                    <a href="mailto:'. $this->theme->email .'" class="g-color-white g-color-white--hover">
                '. $this->theme->email .'
                        </a>'
                            ]

                        ],
                        [
                                'position' => 'top',
                                'content' => [
                                    '<form action="/search" method="get">
                                        <input placeholder="Поиск..." for="search" type="text" class="form-control rounded-0 form-control-md"
                                                                           name="'. \Yii::$app->cmsSearch->searchQueryParamName .'"
                                                                           value="'. \Yii::$app->cmsSearch->searchQuery .'"/>
                                                                           <button type="submit" class="btn btn-md btn-secondary sx-btn-search rounded-0">Найти</button>
</form>'
                            ]

                        ],


                    ],

                    'items' => $items,
                ]); ?>
                </div>
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
<!-- End Header -->
