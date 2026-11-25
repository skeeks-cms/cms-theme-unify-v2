<?php
// php -d short_open_tag=1 tests/organization-markup.php <vendor/autoload.php> [modals.php]
// Скрытая микроразметка Organization на всех страницах: логотип — полный адрес
// (относительный /uploads/... поисковики не принимают), значения настроек экранированы.
require $argv[1] ?? '/app/vendor/autoload.php';
require dirname($argv[1] ?? '/app/vendor/autoload.php').'/yiisoft/yii2/Yii.php';
new \yii\web\Application([
    'id'         => 'organization-markup-test',
    'basePath'   => __DIR__,
    'components' => [
        'request'    => ['cookieValidationKey' => 'test', 'hostInfo' => 'https://example.ru', 'baseUrl' => '', 'scriptUrl' => '/index.php'],
        'urlManager' => ['hostInfo' => 'https://example.ru', 'baseUrl' => '', 'scriptUrl' => '/index.php'],
    ],
]);
$source = file_get_contents($argv[2] ?? dirname(__DIR__).'/src/views/modals.php');
$start = strpos($source, '<div style="display: none;"  itemscope itemtype="http://schema.org/Organization">');
$end = strpos($source, '</div>', $start);
if ($start === false || $end === false) {
    throw new RuntimeException('Не найден блок Organization');
}
$template = substr($source, $start, $end + strlen('</div>') - $start);
\Yii::$app->set('skeeks', (object)['site' => (object)[
    'name'           => 'Плитка "Лаб"',
    'cmsSitePhone'   => (object)['value' => '+7 985 970-34-36'],
    'cmsSiteEmail'   => (object)['value' => 'zakaz@example.ru'],
    'cmsSiteAddress' => (object)['value' => 'Подольск, улица Лобачёва, 14'],
]]);
$cases = [
    '/uploads/all/84/logo.png'          => 'https://example.ru/uploads/all/84/logo.png',
    'https://cdn.example.com/logo.png' => 'https://cdn.example.com/logo.png',
    ''                                  => null,
];
foreach ($cases as $logo => $expected) {
    $view = new class extends \yii\web\View {};
    $view->theme = (object)['logo' => $logo];
    $render = function () use ($template) {
        ob_start();
        eval('?>'.$template);
        return ob_get_clean();
    };
    $html = $render->call($view);
    if (strpos($html, 'content="Плитка &quot;Лаб&quot;"') === false) {
        throw new RuntimeException('Название организации не экранировано');
    }
    if (strpos($html, 'itemprop="logo" content=') !== false || strpos($html, 'itemprop="image" content=') !== false) {
        throw new RuntimeException('Логотип передан текстом в meta content, а не ссылкой');
    }
    foreach (['logo', 'image'] as $prop) {
        $found = preg_match('/<link itemprop="'.$prop.'" href="([^"]*)">/', $html, $match);
        if ($expected === null ? $found : (!$found || $match[1] !== $expected)) {
            throw new RuntimeException("{$prop}: ".($found ? $match[1] : 'нет')." вместо ".($expected ?? 'отсутствия'));
        }
    }
}
echo "OK: логотип полным адресом (относительный и уже полный), без логотипа — без тегов, значения экранированы.\n";
