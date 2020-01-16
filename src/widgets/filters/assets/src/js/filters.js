/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
(function (sx, $, _) {
    sx.classes.Filters = sx.classes.Component.extend({

        _onDomReady: function () {

            this._initSearchInFilters();

            var jHiddenWrapper = $('.sx-hidden-filters');
            $("input", jHiddenWrapper).on('change', function () {
                $(this).closest('form').submit();

            });
            $('body').on("click", ".sx-btn-filter", function () {
                $('.sx-filters-block').animate({left: '0'});
                return false;
            });

            $('body').on("click", ".sx-mobile-filters-hide", function () {
                $('.sx-filters-block').animate({left: '-100%'});
                return false;
            });

            $('body').on("click", ".sx-btn-sort", function () {
                $('.sorting').fadeToggle();
                return false;
            });


            $('.filter--group').each(function () {
                var group = $(this),
                    groupHeader = group.find('.filter--group--header'),
                    classOpen = 'opened',
                    showMore = group.find('.filter--show-more a'),
                    searchInput = group.find('.js-filter-search-hide'),
                    showMoreTxt = showMore.find('.txt'),
                    hiddenCont = group.find('.filter--hidden');

                groupHeader.click(function () {
                    if (!group.hasClass(classOpen)) {
                        group.addClass(classOpen);
                    } else {
                        group.removeClass(classOpen);
                    }
                });

                showMore.click(function (e) {
                    e.preventDefault();

                    if (hiddenCont.is(':hidden')) {
                        hiddenCont.show();
                        searchInput.show();
                        showMoreTxt.text('Скрыть');
                    } else {
                        hiddenCont.hide();
                        showMoreTxt.text('Показать еще');
                        searchInput.hide();
                    }
                });
            });
            $("#sx-filters-form").fadeIn();
            $('.sx-filters-checkbox-options').each(function () {
                var jContainer = $(this);
                var checkboxes = $('.checkbox', $(this));
                var jGroup = $(this).closest(".filter--group");
                var jSearch = $(".js-filter-search-hide", jGroup);
                var jFilterBody = $(".filter--group--body", jGroup);
                if (checkboxes.length > 4) {

                    var last = 4;
                    var counter = 0;
                    checkboxes.each(function () {
                        counter = counter + 1;
                        if ($('input', $(this)).is(":checked")) {
                            last = counter;
                        }
                    });

                    counter = 0;
                    var hiddenCount = 0;
                    checkboxes.each(function () {
                        counter = counter + 1;
                        if (counter > last) {
                            hiddenCount = hiddenCount + 1;
                            $(this).addClass('sx-filter-option-hidden');
                        }
                    });
                    var jLink = $("<a>", {'href': '#', 'class': 'dashed-link'}).append('<span class="txt">Показать еще</span> ' + hiddenCount);
                    var jLinkHide = $("<a>", {'href': '#', 'class': 'dashed-link'}).append('<span class="txt">Скрыть</span> ' + hiddenCount);
                    jLinkHide.hide();

                    jFilterBody.append(
                        $('<div>', {'class': 'filter--show-more show_all_property'}).append(jLink).append(jLinkHide)
                    );

                    jLink.on('click', function () {
                        console.log('111');
                        $('.sx-filter-option-hidden', jContainer).addClass('sx-filter-option-visible');
                        jLink.hide();
                        jLinkHide.show();
                        jSearch.show();
                        return false;
                    });

                    jLinkHide.on('click', function () {
                        $('.sx-filter-option-visible', jContainer).removeClass('sx-filter-option-visible');
                        jLink.show();
                        jLinkHide.hide();
                        jSearch.hide();
                        return false;
                    });
                }
            });
        },



        _initSearchInFilters: function() {

            $('.filter-search__input input').each(function() {

                var jInput = $(this);
                var jInputWrapper = $(this).closest(".filter--group");

                jInput.on('keyup', function() {
                    var searchText = $(this).val();

                    /*
                    Скрыть показать кнопку с
                    if (searchText) {
                        $('.js-search-list-hide', jInputWrapper).hide();
                    } else {
                        $('.js-search-list-hide', jInputWrapper).show();
                    }*/

                    $('.checkbox', jInputWrapper).each(function() {
                        var jOption = $(this);

                        var jCleanText = jOption.find("label");
                        var text = jCleanText.text();

                        var position = text.toLowerCase().indexOf(searchText.toLowerCase());

                        if(position != -1) {
                            if (searchText) {
                                var arrText = text.split("");
                                arrText[position] = '<span style="font-weight: bold;">' + arrText[position];
                                arrText[position + searchText.length - 1] = arrText[position + searchText.length -1] + '</span>';
                            } else {
                                var arrText = text.split("");
                            }

                            var newString = arrText.join("");

                            //var newString = text.replace(new RegExp(searchText.toLowerCase(),'i'), '<span style="font-weight: bold;">' + searchText.toLowerCase() + '</span>');
                            jCleanText.empty().append(newString);
                            jOption.show();
                        } else {

                            jOption.hide();
                        }
                    });



                    $('.sx-level-2', jInputWrapper).each(function() {
                        var jOption = $(this);

                        var jCleanText = jOption.children().children().children(".label-clean-text");
                        if (!jCleanText.length) {
                            jCleanText = jOption.children().children().children().children(".label-clean-text");
                        }

                        //var jCleanText = $('.label-clean-text', $(this));
                        var text = jCleanText.text();

                        var position = text.toLowerCase().indexOf(searchText.toLowerCase());

                        if(position != -1) {
                            if (searchText) {
                                var arrText = text.split("");
                                arrText[position] = '<span style="font-weight: bold;">' + arrText[position];
                                arrText[position + searchText.length - 1] = arrText[position + searchText.length -1] + '</span>';
                            } else {
                                var arrText = text.split("");
                            }

                            var newString = arrText.join("");

                            //var newString = text.replace(new RegExp(searchText.toLowerCase(),'i'), '<span style="font-weight: bold;">' + searchText.toLowerCase() + '</span>');
                            jCleanText.empty().append(newString);
                            jOption.show();

                            var parent = jOption.closest('.list-check').closest('.list-check__item');
                            parent.show();
                            var btnToggle = parent.find('.btn-js-sub-list-check');
                            if (btnToggle.text() == 'Раскрыть') {
                                btnToggle.click();
                            }

                        } else {

                            jOption.hide();
                        }
                    });

                });

            });


        }
    });
})(sx, sx.$, sx._);