<?php

function unifyAdminSortableExpect($condition, $message)
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

$source = file_get_contents(dirname(__DIR__).'/src/admin/UnifyThemeAdmin.php');

unifyAdminSortableExpect(
    strpos($source, 'class UnifyThemeAdmin extends BackendTheme') !== false
    && strpos($source, 'parent::initBeforeRender();') !== false,
    'Unify admin theme does not inherit backend provider definitions.'
);
unifyAdminSortableExpect(
    strpos($source, 'Sortable::class') === false
    && strpos($source, 'JuiSortableWidget') === false,
    'Unify admin theme still overrides the inherited legacy Sortable provider.'
);
unifyAdminSortableExpect(
    strpos($source, '\\skeeks\\yii2\\form\\fields\\SelectField::class') !== false,
    'Unify admin theme lost its own select-field override during cleanup.'
);

echo "Unify admin sortable provider cleanup: OK\n";
