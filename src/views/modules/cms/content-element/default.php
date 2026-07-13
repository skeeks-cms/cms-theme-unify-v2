<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */

if (@$isShowMainImage !== false) {
    $isShowMainImage = true;
}

$articleBodyId = "sx-article-body-" . (int) $model->id;
$articleTocId = "sx-article-toc-" . (int) $model->id;

$this->registerCss(<<<CSS
.sx-article-with-toc {
    display: flex;
    align-items: flex-start;
    gap: 1.875rem;
}

.sx-article-body {
    min-width: 0;
    flex: 1 1 auto;
    overflow: auto;
}

.sx-article-toc-col {
    flex: 0 0 17.5rem;
    max-width: 17.5rem;
    position: sticky;
    top: 6.25rem;
    align-self: flex-start;
}

.doc-toc {
    position: static;
    padding: 1rem 0.75rem;
    border-radius: 0.5rem;
    background: #f7f7f7;
    max-height: calc(100vh - 7.5rem);
    overflow-y: auto;
}

.toc-toggle {
    display: none;
    padding: 0;
    border: 0;
    background: none;
    color: inherit;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
}

.toc-body {
    position: relative;
}

.toc-marker {
    position: absolute;
    top: 0;
    left: 0;
    width: 0.1875rem;
    border-radius: 0.125rem;
    background: var(--primary-color);
    transition: transform .25s ease, height .25s ease;
}

.toc-list {
    padding: 0;
    margin: 0;
    list-style: none;
}

.toc-list li {
    margin: 0.625rem 0;
}

.toc-level-3 {
    padding-left: 1rem;
}

.toc-level-4 {
    padding-left: 2rem;
}

.toc-level-5,
.toc-level-6 {
    padding-left: 3rem;
}

.doc-toc a {
    display: block;
    padding-left: 0.625rem;
    color: var(--text-color);
    font-size: 1rem;
    line-height: 1.1;
    text-decoration: none;
}

.doc-toc a.active {
    color: var(--primary-color);
}

@media (max-width: 61.9375rem) {
    .sx-article-with-toc {
        display: block;
    }

    .sx-article-toc-col {
        max-width: none;
        position: static;
    }

    .doc-toc {
        position: fixed;
        right: 1rem;
        bottom: 1rem;
        left: 1rem;
        top: auto;
        z-index: 1000;
        max-height: none;
        overflow-y: visible;
    }

    .toc-toggle {
        display: block;
    }

    .toc-body {
        display: none;
        max-height: 50vh;
        margin-top: 0.625rem;
        overflow-y: auto;
    }

    .doc-toc.open .toc-body {
        display: block;
    }
}
CSS
);

$this->registerJs(<<<JS
(function ($) {
    if (!$.fn.docToc) {
        $.fn.docToc = function (options) {
            var settings = $.extend({
                content: '.sx-content',
                headers: 'h2, h3, h4, h5, h6',
                header: '.u-header',
                mobileWidth: 992,
                scrollOffset: 10,
                title: '\u041e\u0433\u043b\u0430\u0432\u043b\u0435\u043d\u0438\u0435',
                scrollDuration: 400
            }, options);

            return this.each(function () {
                var toc = $(this);
                var doc = $(settings.content);
                var headers = doc.find(settings.headers).filter(function () {
                    return $.trim($(this).text()).length > 0;
                });
                var header = $(settings.header);
                var index = 0;
                var isInitialLoad = true;
                var initialHash = window.location.hash;

                if (!headers.length) {
                    toc.removeClass('is-ready open').empty();
                    return;
                }

                function headerOffset() {
                    return header.outerHeight() || 0;
                }

                toc
                    .addClass('doc-toc is-ready')
                    .html(
                        '<button class="toc-toggle" type="button">' + settings.title + '</button>' +
                        '<div class="toc-body">' +
                            '<div class="toc-marker"></div>' +
                            '<ul class="toc-list"></ul>' +
                        '</div>'
                    );

                var body = toc.find('.toc-body');
                var list = toc.find('.toc-list');
                var marker = toc.find('.toc-marker');

                headers.each(function () {
                    var h = $(this);
                    var level = parseInt(this.tagName.replace('H', ''), 10);
                    var id = h.attr('id');

                    if (!id) {
                        id = 'toc-' + index++;
                        h.attr('id', id);
                    }

                    $('<li/>', {
                        'class': 'toc-level-' + level
                    }).append($('<a/>', {
                        href: '#' + id,
                        text: h.text()
                    })).appendTo(list);
                });

                function findLinkById(id) {
                    return toc.find('a').filter(function () {
                        return $(this).attr('href') === '#' + id;
                    });
                }

                function moveMarker(active) {
                    if (!active || !active.length) {
                        return;
                    }

                    marker.css({
                        transform: 'translateY(' + (active.offset().top - body.offset().top) + 'px)',
                        height: active.outerHeight()
                    });
                }

                function keepActiveVisible(active) {
                    var overflowY = toc.css('overflow-y');

                    if (!active || !active.length || (overflowY !== 'auto' && overflowY !== 'scroll')) {
                        return;
                    }

                    var tocRect = toc[0].getBoundingClientRect();
                    var activeRect = active[0].getBoundingClientRect();
                    var edge = 12;

                    if (activeRect.top < tocRect.top + edge) {
                        toc.scrollTop(toc.scrollTop() - (tocRect.top + edge - activeRect.top));
                    } else if (activeRect.bottom > tocRect.bottom - edge) {
                        toc.scrollTop(toc.scrollTop() + (activeRect.bottom - tocRect.bottom + edge));
                    }
                }

                function setActiveById(id, updateUrl) {
                    var activeLink = findLinkById(id);

                    if (!activeLink.length) {
                        return;
                    }

                    toc.find('a').removeClass('active').removeAttr('aria-current');
                    activeLink.addClass('active').attr('aria-current', 'location');
                    moveMarker(activeLink);
                    keepActiveVisible(activeLink);

                    if (updateUrl && history.pushState) {
                        history.pushState(null, '', '#' + id);
                    }
                }

                toc.on('click', 'a', function (e) {
                    var id = $(this).attr('href').replace(/^#/, '');
                    var target = document.getElementById(id);

                    e.preventDefault();

                    if (!target) {
                        return;
                    }

                    $('html, body').animate({
                        scrollTop: $(target).offset().top - headerOffset() - settings.scrollOffset
                    }, settings.scrollDuration);

                    setActiveById(id, true);

                    if (window.innerWidth < settings.mobileWidth) {
                        toc.removeClass('open');
                    }
                });

                toc.find('.toc-toggle').on('click', function () {
                    toc.toggleClass('open');
                });

                $(window).off('resize.docTocMarker').on('resize.docTocMarker', function () {
                    var activeLink = toc.find('a.active');

                    moveMarker(activeLink);
                    keepActiveVisible(activeLink);
                });

                if ('IntersectionObserver' in window) {
                    var observer = new IntersectionObserver(function (entries) {
                        $.each(entries, function () {
                            if (!this.isIntersecting) {
                                return;
                            }

                            setActiveById(this.target.id, !isInitialLoad);
                        });
                    }, {
                        root: null,
                        rootMargin: '-' + (headerOffset() + 20) + 'px 0px -60% 0px',
                        threshold: 0
                    });

                    headers.each(function () {
                        observer.observe(this);
                    });
                } else {
                    $(window).on('scroll.docToc resize.docToc', function () {
                        var currentId = headers.first().attr('id');
                        var scrollTop = $(window).scrollTop() + headerOffset() + settings.scrollOffset + 20;

                        headers.each(function () {
                            if ($(this).offset().top <= scrollTop) {
                                currentId = this.id;
                            }
                        });

                        setActiveById(currentId, !isInitialLoad);
                    }).trigger('scroll.docToc');
                }

                if (initialHash) {
                    var target = document.getElementById(initialHash.replace(/^#/, ''));

                    if (target) {
                        setActiveById(target.id, false);

                        setTimeout(function () {
                            $('html, body').animate({
                                scrollTop: $(target).offset().top - headerOffset() - settings.scrollOffset
                            }, settings.scrollDuration);
                        }, 100);
                    }
                } else {
                    setActiveById(headers.first().attr('id'), false);
                }

                setTimeout(function () {
                    isInitialLoad = false;
                }, 500);
            });
        };
    }

    $(function () {
        $('#{$articleTocId}').docToc({
            content: '#{$articleBodyId}',
            mobileWidth: 992,
            title: '\u041e\u0433\u043b\u0430\u0432\u043b\u0435\u043d\u0438\u0435'
        });
    });
})(jQuery);
JS
);
?>

<?php echo $this->render("@app/views/include/_content-image", ['model' => $model]); ?>


<div class="sx-publication-page">
    <div class="container sx-container g-bg-white">
        <div class="row">
            <!-- Content -->
            <? if ($this->theme->element_content_layout == 'col-left') : ?>
            <div class="order-md-2 sx-content-col-main sx-content-col">
                <? endif; ?>
                <? if ($this->theme->element_content_layout == 'col-right') : ?>
                <div class="sx-content-col-main sx-content-col">
                    <? endif; ?>
                    <? if ($this->theme->element_content_layout == 'no-col') : ?>
                    <div class="col-md-12 g-py-20 sx-content-col">
                        <? endif; ?>
                        <? if ($this->theme->element_content_layout == 'col-left-right') : ?>
                        <div class="col-md-7  order-md-2 g-py-20 sx-content-col">
                            <? endif; ?>

                            <? if (!$this->theme->is_image_body_begin) : ?>
                                <?= $this->render('@app/views/breadcrumbs', [
                                    'model' => $model,
                                ]) ?>
                            <? endif; ?>
                            <div class="sx-content" itemscope itemtype="http://schema.org/NewsArticle">
                                <!-- Микроразметка новости-статьи -->
                                <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?= $model->getUrl(true); ?>"/>
                                <meta itemprop="headline" content="<?= $model->seoName; ?>">
                                <?php if ($model->createdBy) : ?>
                                    <span itemprop="author" itemscope itemtype="https://schema.org/Person"><meta itemprop="name" content="<?= $model->createdBy->displayName; ?>"></span>
                                <?php endif; ?>

                                <span itemprop="publisher" itemtype="http://schema.org/Organization" itemscope="">
                        <meta itemprop="name" content="<?= \Yii::$app->cms->appName; ?>">
                        <?php if (\Yii::$app->skeeks->site->cmsSiteAddress) : ?>
                            <meta itemprop="address" content="<?= \Yii::$app->skeeks->site->cmsSiteAddress->value; ?>">
                        <?php endif; ?>

                                    <?php if (\Yii::$app->skeeks->site->cmsSitePhone) : ?>
                                        <meta itemprop="telephone" content="<?= \Yii::$app->skeeks->site->cmsSitePhone->value; ?>">
                                    <?php endif; ?>

                        <span itemprop="logo" itemtype="http://schema.org/ImageObject" itemscope="">
                            <link itemprop="url" href="<?= $this->theme->logo; ?>">
                            <meta itemprop="image" content="<?= $this->theme->logo; ?>">
                        </span>
                    </span>
                                <meta itemprop="datePublished" content="<?= \Yii::$app->formatter->asDate($model->created_at, "php:Y-m-d"); ?>"/>
                                <meta itemprop="dateModified" content="<?= \Yii::$app->formatter->asDate($model->updated_at, "php:Y-m-d"); ?>"/>
                                <meta itemprop="genre" content="<?= $model->cmsTree ? $model->cmsTree->name : ""; ?>"/>
                                <? if ($model->description_short) : ?>
                                    <meta itemprop="description" content="<?= strip_tags($model->description_short); ?>"/>
                                <? else : ?>
                                    <meta itemprop="description" content="<?= \yii\helpers\StringHelper::truncate(strip_tags($model->description_full), 250); ?>"/>
                                <? endif; ?>
                                <? if ($model->image) : ?>
                                    <span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                        <link itemprop="url" href="<?= $model->getUrl(true); ?>">
                        <span itemprop="image" content="<?= $model->image->src; ?>">
                            <meta itemprop="width" content="<?= $model->image->image_width; ?>">
                            <meta itemprop="height" content="<?= $model->image->image_height; ?>">
                        </span>
                    </span>
                                <? endif; ?>
                                <!-- /Микроразметка новости -->
                                <? if ($model->image_full_id && $isShowMainImage && !$this->theme->is_image_body_begin) : ?>
                                    <div class="" style="margin-bottom: 20px;">
                                        <img src="<?= \Yii::$app->imaging->thumbnailUrlOnRequest($model->fullImage ? $model->fullImage->src : null,
                                            new \skeeks\cms\components\imaging\filters\Thumbnail([
                                                'w' => 0,
                                                'h' => 400,
                                            ]), $model->code
                                        ) ?>" title="<?= $model->seoName; ?>" alt="<?= $model->seoName; ?>" class="img-responsive"/>
                                    </div>

                                <? endif; ?>
                                <!--<img src="<? /*= \skeeks\cms\helpers\Image::getCapSrc(); */ ?>" title="<? /*= $model->name; */ ?>" alt="<? /*= $model->name; */ ?>" class="img-responsive" />-->
                                <? if (!$this->theme->is_image_body_begin) : ?>
                                    <?= $model->description_short; ?>
                                <? endif; ?>
                                <div class="sx-article-with-toc">
                                    <div id="<?= $articleBodyId; ?>" class="sx-article-body" itemprop="articleBody">
                                        <?= $model->description_full; ?>

                                        <?php if ($model->cmsFaqs) : ?>
                                            <?php echo $this->render('@app/views/include/faq', [
                                                'elements' => $model->cmsFaqs,
                                            ]); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="sx-article-toc-col">
                                        <div id="<?= $articleTocId; ?>"></div>
                                    </div>
                                </div>
                            </div>


                            <? if ($model->images) : ?>
                                <h2><?= count($model->images); ?> фото</h2>
                                <?= $this->render("@app/views/include/gallery", ['images' => $model->images]); ?>
                            <? endif; ?>


                            <ul class="list-inline d-sm-flex sx-list-short-info sx-main-text-color sx-news-item-short-info">
                                <?php /*if ($model->createdBy) : */ ?><!--
                                    <li class="list-inline-item sx-news-item-created_by">
                                        <img src="<? /*= $model->createdBy->avatarSrc; */ ?>" style="height: 25px; border-radius: 50%;"/>
                                        <a href="<? /*= $model->createdBy->getPageUrl(); */ ?>" title="<? /*= $model->createdBy->name; */ ?>" class="g-color-gray-dark-v4 g-color-primary--hover">
                                            <? /*= $model->createdBy->shortDisplayName; */ ?>
                                        </a>
                                    </li>
                                    <li class="list-inline-item g-mx-10 sx-news-item-created_by">/</li>
                                --><?php /*endif; */ ?>


                                <li class="list-inline-item">
                                    <?= \Yii::$app->formatter->asDate($model->published_at, 'medium') ?>
                                </li>
                                <li class="list-inline-item sx-news-item-comments sx-delimiter">/</li>
                                <li class="list-inline-item sx-news-item-comments sx-item">
                                    <a class="sx-main-text-color g-text-underline--none--hover g-color-primary--hover">
                                        <i class="fas fa-comments"></i>
                                        <?= (int)$model->relatedPropertiesModel->getAttribute('comments'); ?>
                                    </a>
                                </li>
                                <li class="list-inline-item sx-news-item-shows sx-delimiter">/</li>
                                <li class="list-inline-item sx-news-item-shows sx-item">
                                    <a class="sx-main-text-color g-text-underline--none--hover g-color-primary--hover">
                                        <i class="fas fa-eye"></i> <?= (int)$model->show_counter; ?>
                                    </a>
                                </li>
                                <li class="list-inline-item ml-auto">

                                    <?= \skeeks\cms\yandex\share\widget\YaShareWidget::widget([
                                        'namespace' => 'YaShareWidget-default',
                                    ]); ?>

                                </li>
                            </ul>

                            <!--<div class="card g-brd-gray-light-v7 g-bg-gray-light-v8 g-pa-15 g-pa-25-30--md g-mb-30 g-mt-30">
                    <? /* echo \skeeks\cms\comments\widgets\CommentsWidget::widget(['model' => $model]); */ ?>
                </div>-->

                            <? if ($model->cms_content_model_id) : ?>
                                <?
                                /**
                                 * @var \skeeks\cms\models\CmsContent[] $contetns
                                 */
                                $contetns = \skeeks\cms\models\CmsContent::find()->andWhere([
                                    'id' => $model->cmsContentModel->getCmsContentElements()->andWhere(['!=', \skeeks\cms\models\CmsContentElement::tableName() . '.id', $model->id])->joinWith("cmsContent as cmsContent")->select("cmsContent.id")->groupBy(['cmsContent.id']),
                                ])->sort()->all();
                                if ($contetns) :
                                    ?>
                                    <div class="sx-joins">
                                    <? foreach ($contetns as $content) : ?>
                                    <div class="sx-section">
                                        <div class="h3">Связанные <?php echo \skeeks\cms\helpers\StringHelper::strtolower($content->name); ?></div>

                                        <?php 
                                        $elementsQuery = $model->cmsContentModel->getCmsContentElements()->andWhere(['!=', 'id', $model->id])->contentId($content->id)->select("id");
                                        if ($content->isProducts) : ?>
                                            <?
                                            $this->registerCss(<<<CSS
.sx-products-stick .slick-track {
    margin-left: 0;
}
CSS
);

                                            $widgetElements2 = \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::beginWidget("joines-products", [
                                                'viewFile'            => '@app/views/widgets/ContentElementsCmsWidget/products-stick',
                                                'label'               => false,
                                                'enabledPaging'       => "N",
                                                /*'content_ids'         => [\Yii::$app->shop->contentProducts->id],*/
                                                //'tree_ids'             => $treeIds,
                                                'enabledSearchParams' => "N",
                                                'enabledCurrentTree'  => "N",
                                                'limit'               => 15,
                                                'contentElementClass' => \skeeks\cms\shop\models\ShopCmsContentElement::class,
                                                'activeQueryCallback' => function (\yii\db\ActiveQuery $query) use ($model, $elementsQuery) {
                                                    $query->andWhere(['in', \skeeks\cms\models\CmsContentElement::tableName().".id", $elementsQuery]);
                                                },
                                            ]);
                                            ?>

                                            <? if ($widgetElements2->dataProvider->query->count()) : ?>
                                                <section class="sx-products-slider-section sx-product-viewed">
                                                        <? $widgetElements2::end(); ?>
                                                </section>
                                            <? endif; ?>
                                        <? else : ?>
                                            <?
                                        
                                            $widgetElements = \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::beginWidget("joines-elements", [
                                                'viewFile'                   => '@app/views/widgets/ContentElementsCmsWidget/news-grid',
                                                'label'                      => false,
                                                'enabledRunCache'            => "N",
                                                'content_ids'                => [1],
                                                'limit'                      => 4,
                                                'pageSize'                   => 4,
                                                'enabledPaging'              => 'N',
                                                'enabledCurrentTree'         => \skeeks\cms\components\Cms::BOOL_N,
                                                'enabledCurrentTreeChild'    => skeeks\cms\components\Cms::BOOL_N,
                                                'enabledCurrentTreeChildAll' => skeeks\cms\components\Cms::BOOL_N,
                                                'activeQueryCallback' => function (\yii\db\ActiveQuery $query) use ($model, $elementsQuery) {
                                                    $query->andWhere(['!=', \skeeks\cms\models\CmsContentElement::tableName().".id", $model->id]);
                                                    $query->andWhere(['in', \skeeks\cms\models\CmsContentElement::tableName().".id", $elementsQuery]);
                                                },
                                            ]);
                                            $widgetElements::end();
                                            ?>
                                        <? endif; ?>

                                    </div>

                                <? endforeach; ?>
                                <? endif; ?>
                                </div>
                            <? endif; ?>

                            <?= $this->render("@app/views/include/bottom-block"); ?>

                        </div>
                        <? if ($this->theme->element_content_layout == 'col-left') : ?>
                            <?= $this->render("@app/views/include/col-left"); ?>
                        <? endif; ?>
                        <? if ($this->theme->element_content_layout == 'col-right') : ?>
                            <?= $this->render("@app/views/include/col-left"); ?>
                        <? endif; ?>
                        <? if ($this->theme->element_content_layout == 'no-col') : ?>

                        <? endif; ?>
                        <? if ($this->theme->element_content_layout == 'col-left-right') : ?>
                            <?= $this->render("@app/views/include/col-left"); ?>
                        <? endif; ?>
                    </div>
                </div>

            </div>

