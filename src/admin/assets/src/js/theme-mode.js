(function (window, document) {
    'use strict';

    var root = document.documentElement;
    var allowedModes = ['light', 'dark'];
    var storageKey = root.getAttribute('data-sx-theme-storage-key') || 'sx-theme-mode';
    var media = window.matchMedia ? window.matchMedia('(prefers-color-scheme: dark)') : null;

    var normalize = function (mode) {
        return allowedModes.indexOf(mode) === -1 ? 'light' : mode;
    };

    var resolve = function (mode) {
        return normalize(mode);
    };

    var apply = function (mode, persist, source) {
        mode = normalize(mode);
        var resolvedMode = resolve(mode);

        root.setAttribute('data-sx-theme-mode', mode);
        root.setAttribute('data-sx-theme', resolvedMode);
        root.setAttribute('data-sx-theme-source', source || (persist === false ? 'config' : 'user'));
        root.style.colorScheme = resolvedMode;

        if (persist !== false) {
            try {
                window.localStorage.setItem(storageKey, mode);
            } catch (e) {
            }
        }

        var event;
        try {
            event = new CustomEvent('sx:themechange', {
                detail: {
                    mode: mode,
                    resolvedMode: resolvedMode
                }
            });
        } catch (e) {
            event = document.createEvent('CustomEvent');
            event.initCustomEvent('sx:themechange', false, false, {
                mode: mode,
                resolvedMode: resolvedMode
            });
        }
        document.dispatchEvent(event);

        return resolvedMode;
    };

    var getMode = function () {
        return normalize(root.getAttribute('data-sx-theme-mode'));
    };

    var onSystemChange = function () {
        if (root.getAttribute('data-sx-theme-source') === 'system') {
            apply(media && media.matches ? 'dark' : 'light', false, 'system');
        }
    };

    var modeMeta = {
        light: {
            fallbackLabel: 'Light theme'
        },
        dark: {
            fallbackLabel: 'Dark theme'
        }
    };

    var updateSwitchers = function () {
        var mode = getMode();
        var switchers = document.querySelectorAll('.sx-theme-switcher');

        Array.prototype.forEach.call(switchers, function (switcher) {
            var nextMode = mode === 'dark' ? 'light' : 'dark';
            var toggle = switcher.querySelector('[data-sx-theme-mode-toggle]');
            var labelNode = switcher.querySelector('.sx-theme-switcher__current-label');
            var label = toggle
                ? toggle.getAttribute('data-sx-theme-' + nextMode + '-label') || modeMeta[nextMode].fallbackLabel
                : modeMeta[nextMode].fallbackLabel;

            if (labelNode) {
                labelNode.textContent = modeMeta[mode].fallbackLabel;
            }
            if (toggle) {
                toggle.setAttribute('data-sx-theme-current-mode', mode);
                toggle.setAttribute('aria-pressed', mode === 'dark' ? 'true' : 'false');
                toggle.setAttribute('aria-label', label);
                toggle.setAttribute('title', label);
            }
        });
    };

    document.addEventListener('click', function (event) {
        var toggle = event.target.closest
            ? event.target.closest('[data-sx-theme-mode-toggle]')
            : null;

        if (!toggle) {
            return;
        }

        event.preventDefault();
        apply(getMode() === 'dark' ? 'light' : 'dark', true, 'user');
    });

    document.addEventListener('sx:themechange', updateSwitchers);

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', updateSwitchers);
    } else {
        updateSwitchers();
    }

    if (media) {
        if (media.addEventListener) {
            media.addEventListener('change', onSystemChange);
        } else if (media.addListener) {
            media.addListener(onSystemChange);
        }
    }

    window.sxTheme = {
        modes: allowedModes.slice(),
        getMode: getMode,
        getResolvedMode: function () {
            return resolve(getMode());
        },
        setMode: function (mode) {
            return apply(mode, true, 'user');
        },
        reset: function () {
            try {
                window.localStorage.removeItem(storageKey);
            } catch (e) {
            }
            return apply(media && media.matches ? 'dark' : 'light', false, 'system');
        }
    };

    root.setAttribute('data-sx-theme-ready', 'true');
})(window, document);
