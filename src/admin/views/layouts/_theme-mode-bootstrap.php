<?php

/**
 * Backward-compatible view alias.
 *
 * The no-flash bootstrap is owned by cms-backend. Keep this historical
 * Unify view path available for applications that still render it directly.
 */

/* @var $theme \skeeks\cms\themes\unify\admin\UnifyThemeAdmin */

echo $this->render('@skeeks/cms/backend/views/layouts/_theme-mode-bootstrap', [
    'theme' => $theme,
]);
