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
                $('.sx-filters-block').trigger("show");
                return false;
            });

            $('body').on("click", ".sx-mobile-filters-hide", function () {
                $('.sx-filters-block').animate({left: '-100%'});
                $('.sx-filters-block').trigger("hide");
                return false;
            });

            $('body').on("click", ".sx-btn-sort", function () {
                $('.sorting').fadeToggle();
                return false;
            });

            $('body').on("breforeSubmit", "#sx-filters-form", function () {

            });

            $('body').on("click", ".sx-saved-filters-list .sx-close-btn", function () {
                var jLi = $(this).closest("li");

                var property_id = jLi.data("property_id");
                var value_id = jLi.data("value_id");

                if (property_id == 'price') {
                    
                    $("#sx-filter-price-from", jFilter).val("");
                    $("#sx-filter-price-to", jFilter).val("");
                    $("#sx-filters-form").submit();
                    
                } else {
                    var jFilter = $("." + property_id);
                    if (value_id) {
                        $("input[value=" + value_id + "]", jFilter).prop("checked", false);
                        $("#sx-filters-form").submit();
                    } else {
                        $("input", jFilter).val("");
                        $("#sx-filters-form").submit();
                    }
                }
                

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
    
    sx.classes.FiltersForm = sx.classes.Component.extend({

        _onDomReady: function()
        {
            var self = this;
            this.JqueryForm = $("#sx-filters-form");
            this.jFilterFormWrapper = $(".sx-filters-form");
            $('.sx-filter-action').on('click', function()
            {
                var jFilter = $($(this).data('filter'));
                jFilter.prop("disabled", false);
                jFilter.val($(this).data('filter-value')).change();

                return false;
            });
                        
            if ($(".form-group", this.JqueryForm).length > 0)
            {
                $("button", self.JqueryForm).fadeIn();
            }

            $("input, checkbox, select", this.JqueryForm).on("change", function()
            {
                if ($(this).data('no-submit'))
                {
                    return false;
                }

                var jFilter = $(this).closest(".sx-filter");
                $(".sx-btn-apply-wrapper", jFilter).show();
                //self.JqueryForm.submit();
            });

            $('.dropdown-menu.keep-open').on('click', function (e) {
              e.stopPropagation();
            });
            
            
            var jSelectedWrapper = $(".sx-filters-selected-wrapper");
            
            $("input[type=checkbox]:checked", this.jFilterFormWrapper).each(function() {
                
                var jOption = $(this); 
                var text = $(this).closest('div').find('label').text(); 
                
                var jRemoveBtn = $("<i>", {
                    'class' : 'hs-icon hs-icon-close',
                    'title' : 'Отменить выбранную опцию',
                });
                
                var jBtn = $("<button>", {
                    'href' : '#', 
                    'class' : 'btn btn-sm sx-fast-filters-btn',
                    'title' : jOption.closest(".filter--group").find('header').text(),
                })
                    .append(text)
                    .append(" ")
                    .append(jRemoveBtn)
                ;
                
                jSelectedWrapper.append(jBtn);
                
                jRemoveBtn.on('click', function() {
                    jOption.click(); 
                    jBtn.fadeOut();
                    jBtn.remove();
                    jOption.closest("form").submit();
                    return false;
                });
            });
            
            $(".sx-filter-selected .range-slider", this.jFilterFormWrapper).each(function() {
                var From = $(this).data('from');
                var To = $(this).data('to');
                var Min = $(this).data('min');
                var Max = $(this).data('max');
                
                
                var jOption = $(this); 
                var text = "от " + new Intl.NumberFormat('ru-RU').format(From) + " до " + new Intl.NumberFormat('ru-RU').format(To) + $(this).data('postfix'); 
                
                var jRemoveBtn = $("<i>", {
                    'class' : 'hs-icon hs-icon-close',
                    'title' : 'Отменить выбранную опцию',
                });
                
                var jBtn = $("<button>", {
                    'href' : '#', 
                    'class' : 'btn btn-sm sx-fast-filters-btn',
                    'title' : jOption.closest(".filter--group").find('header').text(),
                })
                    .append(text)
                    .append(" ")
                    .append(jRemoveBtn)
                ;
                
                jSelectedWrapper.append(jBtn);
                
                jRemoveBtn.on('click', function() {
                    jOption.click(); 
                    jBtn.fadeOut();
                    jBtn.remove();
                    return false;
                });
                
            });
        }
    });
})(sx, sx.$, sx._);