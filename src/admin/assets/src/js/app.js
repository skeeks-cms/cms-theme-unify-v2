/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

(function (sx, $, _) {


    sx.classes.App = sx.classes.Component.extend({

        _init: function () {

        },

        _onDomReady: function () {
            // initialization of custom select
            //$('.js-select').selectpicker();

            $('.sx-main-col').fadeIn();


            $(document).on('pjax:complete', function (e) {
                $('[data-toggle="tooltip"]').tooltip();
            });

            $(document).on('pjax:error', function (e, data) {
                console.error('Не удалось перезагрузить контейнер: ' + e.target.id + ' — ' + data.statusText);
                e.preventDefault();
            });

            if ($.pjax) {
                $.pjax.defaults.timeout = 60000;
            }

            this._initQuickAccess();

            // initialization of sidebar navigation component
            //$.HSCore.components.HSSideNav.init('.js-side-nav');
            // initialization of HSDropdown component
            //$.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {dropdownHideOnScroll: false});
            // initialization of custom scrollbar
            //$.HSCore.components.HSScrollBar.init($('.js-custom-scroll'));
        },


        _initQuickAccess: function () {
            var data = window.sxQuickAccessData || {};
            if ((!data.workers || !data.workers.length) && window.parent && window.parent !== window && window.parent.sxQuickAccessData) {
                data = window.parent.sxQuickAccessData;
            }
            if ((!data.workers || !data.workers.length) && window.top && window.top !== window && window.top.sxQuickAccessData) {
                data = window.top.sxQuickAccessData;
            }
            var maxItems = 8;
            sx.Project = sx.Project || {};

            var getInitials = function (name) {
                name = $.trim(name || '');
                if (!name) {
                    return '?';
                }

                var parts = name.split(/\s+/);
                var result = parts[0].charAt(0);
                if (parts.length > 1) {
                    result += parts[1].charAt(0);
                }

                return result.toUpperCase();
            };

            var favorites = $.isArray(data.favorites) ? data.favorites : [];
            var endpoints = data.endpoints || {};

            var getTouchedAt = function (item) {
                return parseInt(item && item.touchedAt ? item.touchedAt : 0, 10) || 0;
            };

            var getItems = function (type) {
                if (type === 'workers') {
                    return data.workers || [];
                }

                var items = [];
                $.each(getFavorites(), function (index, item) {
                    if (item.type === type) {
                        items.push(item);
                    }
                });

                return items.slice(0, maxItems);
            };

            var getItemKey = function (item) {
                if (!item || !item.type || !item.id) {
                    return '';
                }

                return item.type + ':' + item.id;
            };

            var normalizeFavoriteItem = function (item) {
                var normalized = $.extend({}, item);
                normalized.touchedAt = getTouchedAt(normalized) || Math.floor(Date.now() / 1000);
                return normalized;
            };

            var getFavorites = function () {
                var items = [];
                $.each(favorites || [], function (index, item) {
                    if (item && item.type && item.id) {
                        items.push(normalizeFavoriteItem(item));
                    }
                });

                return items;
            };

            var isFavorite = function (item) {
                var key = getItemKey(item);
                var found = false;

                if (!key) {
                    return false;
                }

                $.each(favorites || [], function (index, storedItem) {
                    if (getItemKey(storedItem) === key) {
                        found = true;
                        return false;
                    }
                });

                return found;
            };

            var toggleFavorite = function (item) {
                var key = getItemKey(item);
                var nextItems = [];
                var removed = false;

                if (!key) {
                    return false;
                }

                $.each(favorites || [], function (index, storedItem) {
                    if (getItemKey(storedItem) === key) {
                        removed = true;
                        return;
                    }
                    nextItems.push(storedItem);
                });

                if (!removed) {
                    nextItems.unshift(normalizeFavoriteItem(item));
                }

                favorites = nextItems.slice(0, maxItems * 2);

                return !removed;
            };

            var reorderFavorites = function (keys) {
                var byKey = {};
                var nextItems = [];

                $.each(favorites || [], function (index, item) {
                    byKey[getItemKey(item)] = item;
                });

                $.each(keys || [], function (index, key) {
                    if (byKey[key]) {
                        nextItems.push(byKey[key]);
                        delete byKey[key];
                    }
                });

                $.each(favorites || [], function (index, item) {
                    var key = getItemKey(item);
                    if (byKey[key]) {
                        nextItems.push(item);
                        delete byKey[key];
                    }
                });

                favorites = nextItems;
            };

            var applyServerFavorites = function (items) {
                if (!$.isArray(items)) {
                    return;
                }

                favorites = items;
                renderAll();
                updateFavoriteButtons(document);
            };

            var postQuickAccess = function (url, data, callback) {
                if (!url) {
                    return;
                }

                $.ajax({
                    url: url,
                    type: 'post',
                    data: data,
                    dataType: 'json',
                    success: function (response) {
                        if (response && response.success && response.data && response.data.favorites) {
                            applyServerFavorites(response.data.favorites);
                        }

                        if ($.isFunction(callback)) {
                            callback(response);
                        }
                    }
                });
            };

            var typeMetaText = {
                companies: 'компания',
                projects: 'проект',
                clients: 'клиент'
            };

            var openAction = function (item) {
                if (item.action && sx.classes && sx.classes.backend && sx.classes.backend.widgets && sx.classes.backend.widgets.Action) {
                    new sx.classes.backend.widgets.Action({
                        isOpenNewWindow: true,
                        url: item.action
                    }).go();
                    return;
                }

                if (item.url) {
                    window.location.href = item.url;
                }
            };

            var renderList = function (type) {
                var items = getItems(type);
                var $list = $('[data-sx-quick-access-list="' + type + '"]');
                var isProject = type === 'projects';
                var emptyText = {
                    companies: 'Недавних компаний пока нет',
                    projects: 'Недавних проектов пока нет',
                    clients: 'Недавних клиентов пока нет'
                };
                var metaText = {
                    companies: 'компания',
                    projects: 'проект',
                    clients: 'клиент'
                };

                if (!$list.length) {
                    return;
                }

                $list.empty();
                if (!items.length) {
                    $list.append($('<div class="sx-quick-access-empty">').text(emptyText[type] || 'Недавних объектов пока нет'));
                    return;
                }

                $.each(items, function (index, item) {
                    var $row = $('<a class="sx-quick-access-row">').attr('href', '#').attr('data-pjax', '0');
                    var $icon = $('<span class="sx-quick-access-row__icon">')
                        .toggleClass('sx-quick-access-row__icon--project', isProject)
                        .toggleClass('sx-quick-access-row__icon--has-image', !!item.image);
                    var $body = $('<span class="sx-quick-access-row__body">');

                    if (item.image) {
                        $icon.append($('<img>').attr('src', item.image).attr('alt', ''));
                    } else {
                        $icon.text(getInitials(item.name));
                    }

                    $body.append($('<span class="sx-quick-access-row__title">').text(item.name || 'Без названия'));
                    $body.append($('<span class="sx-quick-access-row__meta">').text(metaText[type] || 'объект'));
                    $row.append($icon).append($body);
                    $row.on('click', function (e) {
                        e.preventDefault();
                        openAction(item);
                    });
                    $list.append($row);
                });
            };

            var buildObjectIcon = function (item, className) {
                var isProject = item.type === 'projects';
                var isClient = item.type === 'clients';
                var $icon = $('<span>').addClass(className)
                    .toggleClass(className + '--project', isProject)
                    .toggleClass(className + '--client', isClient)
                    .toggleClass(className + '--has-image', !!item.image);

                if (item.image) {
                    $icon.append($('<img>').attr('src', item.image).attr('alt', ''));
                } else {
                    $icon.text(getInitials(item.name));
                }

                return $icon;
            };

            var draggingFavoriteKey = null;

            var renderFavorites = function () {
                var items = getFavorites();
                var $list = $('[data-sx-quick-access-list="favorites"]');

                if (!$list.length) {
                    return;
                }

                $list.empty();
                if (!items.length) {
                    $list.append($('<div class="sx-quick-access-empty">').text('В избранном пока ничего нет. Добавляйте компании, клиентов и проекты в эту область для быстрого доступа.'));
                    return;
                }

                $.each(items, function (index, item) {
                    var key = getItemKey(item);
                    var $row = $('<a class="sx-quick-access-row sx-quick-access-row--favorite">')
                        .attr({
                            href: '#',
                            'data-pjax': '0',
                            'data-sx-favorite-key': key
                        });
                    var $drag = $('<span class="sx-quick-access-row__drag" title="Перетащить">')
                        .attr('draggable', 'true')
                        .append($('<i class="fas fa-arrows-alt-v"></i>'));
                    var $body = $('<span class="sx-quick-access-row__body">');
                    var $remove = $('<button type="button" class="sx-quick-access-row__remove" title="Убрать из избранного">')
                        .append($('<i class="fas fa-star"></i>'));

                    $body.append($('<span class="sx-quick-access-row__title">').text(item.name || 'Без названия'));
                    $body.append($('<span class="sx-quick-access-row__meta">').text(typeMetaText[item.type] || 'объект'));
                    $row.append($drag).append(buildObjectIcon(item, 'sx-quick-access-row__icon')).append($body).append($remove);
                    $row.on('click', function (e) {
                        e.preventDefault();
                        openAction(item);
                    });
                    $drag.on('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                    });
                    $remove.on('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        sx.Project.quickAccessToggleFavorite(item);
                    });
                    $drag.on('dragstart', function (e) {
                        e.stopPropagation();
                        $row.addClass('is-dragging');
                        draggingFavoriteKey = key;
                        e.originalEvent.dataTransfer.effectAllowed = 'move';
                        e.originalEvent.dataTransfer.setData('text/plain', key);
                    });
                    $drag.on('dragend', function (e) {
                        e.stopPropagation();
                        $row.removeClass('is-dragging');
                        draggingFavoriteKey = null;
                    });
                    $row.on('dragover', function (e) {
                        var draggingKey = draggingFavoriteKey || e.originalEvent.dataTransfer.getData('text/plain');
                        var $dragging = $list.find('[data-sx-favorite-key="' + draggingKey + '"]');
                        var rect = this.getBoundingClientRect();

                        e.preventDefault();
                        if (!$dragging.length || $dragging[0] === this) {
                            return;
                        }

                        if (e.originalEvent.clientY > rect.top + rect.height / 2) {
                            $row.after($dragging);
                        } else {
                            $row.before($dragging);
                        }
                    });
                    $row.on('drop', function (e) {
                        var keys = [];
                        e.preventDefault();
                        $list.find('[data-sx-favorite-key]').each(function () {
                            keys.push($(this).attr('data-sx-favorite-key'));
                        });
                        reorderFavorites(keys);
                        renderAll();
                        postQuickAccess(endpoints.sortFavorites, {keys: keys});
                    });

                    $list.append($row);
                });
            };

            var renderEdge = function () {
                var items = getFavorites().slice(0, maxItems);
                var $edge = $('[data-sx-quick-access-edge-favorites]');
                var $separator = $('[data-sx-quick-access-edge-favorites-separator]');

                if (!$edge.length) {
                    return;
                }

                $separator.toggle(!!items.length);
                $edge.empty();
                $.each(items, function (index, item) {
                    var isProject = item.type === 'projects';
                    var isClient = item.type === 'clients';
                    var $item = $('<a class="sx-quick-access-object">')
                        .toggleClass('sx-quick-access-object--project', isProject)
                        .toggleClass('sx-quick-access-object--client', isClient)
                        .toggleClass('sx-quick-access-object--has-image', !!item.image)
                        .attr({
                            href: '#',
                            title: item.name || '',
                            'data-toggle': 'tooltip',
                            'data-placement': 'left',
                            'data-container': 'body',
                            'data-boundary': 'window',
                            'data-offset': '0, 10',
                            'data-template': '<div class="tooltip sx-quick-access-tooltip-popover" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
                            'data-pjax': '0'
                        })
                    if (item.image) {
                        $item.append($('<img>').attr('src', item.image).attr('alt', ''));
                    } else {
                        $item.text(getInitials(item.name));
                    }
                    $item.on('click', function (e) {
                        e.preventDefault();
                        openAction(item);
                    });
                    $edge.append($item);
                });
            };

            var renderAll = function () {
                renderFavorites();
                renderEdge();

                $('[data-sx-quick-access] [data-toggle="tooltip"]').tooltip('dispose').tooltip();
            };

            sx.Project.quickAccessAdd = function () {};

            sx.Project.quickAccessGet = getItems;
            sx.Project.quickAccessGetFavorites = getFavorites;
            sx.Project.quickAccessIsFavorite = isFavorite;
            sx.Project.quickAccessToggleFavorite = function (item) {
                var active = toggleFavorite(item);
                renderAll();
                updateFavoriteButtons(document);
                postQuickAccess(endpoints.toggleFavorite, {item: item});
                return active;
            };

            var readFavoriteButtonItem = function ($button) {
                var item = $button.data('sxQuickAccessItem') || $button.attr('data-sx-quick-access-item');

                if (typeof item === 'string') {
                    try {
                        item = JSON.parse(item);
                    } catch (e) {
                        item = null;
                    }
                }

                return item;
            };

            var updateFavoriteButton = function ($button) {
                if ($button.attr('data-sx-quick-access-external') === '1') {
                    return;
                }

                var item = readFavoriteButtonItem($button);
                var active = isFavorite(item);

                $button.toggleClass('is-active', active);
                $button.attr('title', active ? 'Убрать из избранного' : 'Добавить в избранное');
                $button.find('i').toggleClass('fas', active).toggleClass('far', !active);
            };

            var updateFavoriteButtons = function (context) {
                var $context = context ? $(context) : $(document);
                $context.find('[data-sx-quick-access-favorite]').add($context.filter('[data-sx-quick-access-favorite]')).each(function () {
                    updateFavoriteButton($(this));
                });
            };

            $(document).on('click', '[data-sx-quick-access-favorite]', function (event) {
                var $button = $(this);
                var item = readFavoriteButtonItem($button);

                event.preventDefault();
                event.stopPropagation();

                if (!item) {
                    return;
                }

                sx.Project.quickAccessToggleFavorite(item);
            });

            var findOptionByValue = function ($field, value) {
                return $field.find('option').filter(function () {
                    return String($(this).val()) === String(value);
                }).first();
            };

            var triggerFieldUpdate = function ($field, itemId, itemText) {
                var select2Data = {
                    id: itemId,
                    text: itemText,
                    selected: true
                };

                if ($field.data('select2') && $.isFunction($field.select2)) {
                    try {
                        var currentData = $field.select2('data') || [];
                        currentData = $.isArray(currentData) ? currentData : [currentData];
                        var found = false;

                        $.each(currentData, function (index, dataItem) {
                            if (dataItem && String(dataItem.id) === String(itemId)) {
                                found = true;
                                return false;
                            }
                        });

                        if (!found) {
                            currentData.push(select2Data);
                        }

                        $field.select2('data', currentData);
                    } catch (e) {
                    }

                    try {
                        $field.select2('trigger', 'select', {
                            data: select2Data
                        });
                    } catch (e) {
                    }
                }

                $field
                    .trigger('input')
                    .trigger('change')
                    .trigger('change.select2')
                    .trigger({
                        type: 'select2:select',
                        params: {
                            data: select2Data
                        }
                    });
            };

            var getFieldValues = function ($field) {
                var values = $field.val() || [];

                if (!$.isArray(values)) {
                    values = String(values).split(',');
                }

                return $.grep(values.map(function (value) {
                    return String(value);
                }), function (value) {
                    return value !== '';
                });
            };

            var getItemText = function (item) {
                return item.name || item.text || item.title || item.label || String(item.id);
            };

            var setFieldValue = function ($field, item) {
                if (!$field.length || !item || !item.id) {
                    return;
                }

                var itemId = String(item.id);
                var itemText = getItemText(item);

                var $option = $field.is('select') ? findOptionByValue($field, itemId) : $();

                if ($field.is('select') && !$option.length) {
                    $option = $(new Option(itemText, itemId, true, true));
                    $field.append($option);
                }

                if ($field.is('select') && $field.prop('multiple')) {
                    var values = getFieldValues($field);

                    if ($.inArray(itemId, values) === -1) {
                        values.push(itemId);
                    }

                    $option.prop('selected', true);
                    $field.val(values);
                    triggerFieldUpdate($field, itemId, itemText);
                    return;
                }

                if (!$field.is('select') && $field.attr('multiple')) {
                    var inputValues = getFieldValues($field);

                    if ($.inArray(itemId, inputValues) === -1) {
                        inputValues.push(itemId);
                    }

                    $field.val(inputValues.join(','));
                    triggerFieldUpdate($field, itemId, itemText);
                    return;
                }

                if ($option.length) {
                    $option.prop('selected', true);
                }
                $field.val(itemId);
                triggerFieldUpdate($field, itemId, itemText);
            };

            var resolvePickerField = function ($field, $context) {
                if (!$field.length) {
                    return $field;
                }

                if ($field.is('input[type="hidden"]')) {
                    var name = $field.attr('name');
                    var id = $field.attr('id');
                    var $scope = $field.closest('form');
                    var $replacement = $();

                    if (!$scope.length) {
                        $scope = $context && $context.length ? $context : $(document);
                    }

                    if (name && name.slice(-2) !== '[]') {
                        $replacement = $scope.find('select[name="' + name + '[]"]');
                    }

                    if (!$replacement.length && id) {
                        $replacement = $scope.find('select#' + id);
                    }

                    if ($replacement.length) {
                        return $replacement.first();
                    }
                }

                return $field;
            };

            var renderPicker = function ($field, type) {
                var items = getItems(type).slice(0, 8);

                if (!$field.length || !items.length) {
                    return;
                }

                var $group = $field.closest('.form-group, [class*="field-"], .form-group-row, .sx-field');
                if (!$group.length) {
                    $group = $field.closest('.select2-container, .select2, .input-group, .form-control').parent();
                }

                if (!$group.length || $group.find('[data-sx-quick-access-picker="' + type + '"]').length) {
                    return;
                }

                var $picker = $('<div class="sx-quick-access-picker">').attr('data-sx-quick-access-picker', type);
                var syncPickerState = function () {
                    var values = $field.val() || [];
                    values = $.isArray(values) ? values.map(String) : [String(values)];

                    $picker.find('[data-sx-quick-access-picker-item-id]').each(function () {
                        var $item = $(this);
                        $item.toggleClass('is-selected', $.inArray(String($item.attr('data-sx-quick-access-picker-item-id')), values) !== -1);
                    });
                };

                $.each(items, function (index, item) {
                    var $button = $('<button type="button" class="sx-quick-access-picker__item">')
                        .toggleClass('sx-quick-access-picker__item--has-image', !!item.image)
                        .attr('title', item.name || '')
                        .attr('data-sx-quick-access-picker-item-id', item.id)
                        .attr('data-toggle', 'tooltip')
                        .attr('data-placement', 'top');

                    if (item.image) {
                        $button.append($('<img>').attr('src', item.image).attr('alt', ''));
                    } else {
                        $button.text(getInitials(item.name));
                    }

                    $button.on('mousedown', function (event) {
                        event.preventDefault();
                    });

                    $button.on('click', function (event) {
                        event.preventDefault();
                        event.stopPropagation();
                        setFieldValue($field, item);
                        syncPickerState();
                        setTimeout(syncPickerState, 120);
                    });
                    $picker.append($button);
                });

                var $control = $field;
                if ($field.next('.select2-container').length) {
                    $control = $field.next('.select2-container');
                } else if ($field.closest('.input-group').length) {
                    $control = $field.closest('.input-group');
                } else if (!$field.is(':visible')) {
                    $control = $group.find('.select2-container, .select2, .form-control:visible, .input-group').first();
                }

                if ($control.length) {
                    $picker.insertAfter($control);
                } else {
                    $picker.appendTo($group);
                }

                $picker.find('[data-toggle="tooltip"]').tooltip();
                $field.on('change.sxQuickAccessPicker select2:select.sxQuickAccessPicker select2:unselect.sxQuickAccessPicker', syncPickerState);
                syncPickerState();
            };

            var initFormPickers = function (context) {
                var $context = context ? $(context) : $(document);
                var configs = [
                    {selector: '[name="executor_id"], [name$="[executor_id]"], [id$="-executor_id"], [id$="-executor-id"], [name="managers"], [name$="[managers]"], [name="managers[]"], [name$="[managers][]"], [id$="-managers"]', type: 'workers'},
                    {selector: '[name="cms_company_id"], [name$="[cms_company_id]"], [id$="-cms_company_id"], [id$="-cms-company-id"]', type: 'companies'},
                    {selector: '[name="cms_project_id"], [name$="[cms_project_id]"], [id$="-cms_project_id"], [id$="-cms-project-id"]', type: 'projects'},
                    {selector: '[name="cms_user_id"], [name$="[cms_user_id]"], [id$="-cms_user_id"], [id$="-cms-user-id"]', type: 'clients'}
                ];

                $.each(configs, function (index, config) {
                    $context.find(config.selector).add($context.filter(config.selector)).each(function () {
                        renderPicker(resolvePickerField($(this), $context), config.type);
                    });
                });

                $context.find('.field-cmstask-executor_id, #cmstask-executor_id')
                    .add($context.filter('.field-cmstask-executor_id, #cmstask-executor_id'))
                    .each(function () {
                        var $field = $(this).is('select, input') ? $(this) : $(this).find('#cmstask-executor_id, [name$="[executor_id]"]').first();
                        renderPicker($field, 'workers');
                    });
            };

            var pickerInitTimer = null;
            var scheduleInitFormPickers = function (context) {
                clearTimeout(pickerInitTimer);
                pickerInitTimer = setTimeout(function () {
                    initFormPickers(context || document);
                }, 80);
            };

            renderAll();
            updateFavoriteButtons(document);
            scheduleInitFormPickers(document);

            $(document).on('click', '[data-sx-quick-access-toggle]', function (event) {
                if (event) {
                    event.preventDefault();
                }

                $('body').addClass('sx-quick-access-open');

                var tab = $(this).attr('data-sx-quick-access-tab');
                if (tab) {
                    var $panel = $('[data-sx-quick-access-panel]');
                    var $section = $('[data-sx-quick-access-section="' + tab + '"]');
                    if ($panel.length && $section.length) {
                        $panel.animate({
                            scrollTop: $section.position().top + $panel.scrollTop() - 12
                        }, 160);
                    }
                }
            });

            $(document).on('click', '[data-sx-quick-access-close]', function () {
                $('body').removeClass('sx-quick-access-open');
            });

            $(document).on('keyup', function (e) {
                if (e.key === 'Escape') {
                    $('body').removeClass('sx-quick-access-open');
                }
            });

            $(document).on('pjax:complete pjax:end shown.bs.modal ajaxComplete', function (event) {
                scheduleInitFormPickers(event.target || document);
                updateFavoriteButtons(event.target || document);
            });

            if (window.MutationObserver) {
                var formPickerObserver = new MutationObserver(function (mutations) {
                    var hasAddedNodes = false;
                    $.each(mutations, function (index, mutation) {
                        if (mutation.addedNodes && mutation.addedNodes.length) {
                            hasAddedNodes = true;
                            return false;
                        }
                    });

                    if (hasAddedNodes) {
                        scheduleInitFormPickers(document);
                        updateFavoriteButtons(document);
                    }
                });

                formPickerObserver.observe(document.body, {
                    childList: true,
                    subtree: true
                });
            }
        },

        _initNotify: function () {
            //Глобальные настройки JGrowl
            $.jGrowl.defaults.closer = false;
            $.jGrowl.defaults.closeTemplate = '×';
            $.jGrowl.defaults.position = 'top-right';
            $.jGrowl.defaults.life = 5000;
        },

    });

    sx.App = new sx.classes.App();


    /**
     * Добавление звездочек в формы обрамленные .sx-project-form-wrapper
     */
    sx.classes.ProjectForm = sx.classes.Component.extend({

        _onDomReady: function () {
            $(document).on('pjax:complete', function (e) {
                $('.form-group.required label').each(function () {
                    var jLabel = $(this);
                    _.delay(function () {
                        jLabel.find(".sx-from-required").remove();
                        jLabel.append($('<span class="sx-from-required" title="Это поле обязательно для заполнения">').text(' *'));
                    }, 200);
                });
            });

            $('.form-group.required label').each(function () {
                var jLabel = $(this);
                _.delay(function () {
                    jLabel.find(".sx-from-required").remove();
                    jLabel.append($('<span class="sx-from-required" title="Это поле обязательно для заполнения">').text(' *'));
                }, 200);
            });
        }
    });

    new sx.classes.ProjectForm();

})(sx, sx.$, sx._);
