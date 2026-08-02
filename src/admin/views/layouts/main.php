<?php

/**
 * Backward-compatible layout alias.
 *
 * The reusable document and shell composition is owned by cms-backend.
 * Existing applications may keep the historical Unify path while migrating
 * their theme path maps.
 */

echo $this->render('@skeeks/cms/backend/views/layouts/main', [
    'content' => $content,
    'theme'   => $this->theme,
]);
