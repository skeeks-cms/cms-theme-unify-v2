<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

$activeUsers = [];
$favoriteItems = [];
$userId = \Yii::$app->user->id;

try {
    $activeUsers = \skeeks\cms\models\CmsUser::find()
        ->isWorker()
        ->andWhere(['not', ['last_admin_activity_at' => null]])
        ->orderBy(['last_admin_activity_at' => SORT_DESC])
        ->limit(8)
        ->all();
} catch (\Throwable $e) {
    $activeUsers = [];
}

try {
    if ($userId) {
        $favoriteItems = \skeeks\cms\controllers\AdminQuickAccessController::getFavoriteItems($userId);
    }
} catch (\Throwable $e) {
    $favoriteItems = [];
}

\skeeks\cms\backend\widgets\AjaxControllerActionsWidget::registerAssets();

$this->registerJs('window.sxQuickAccessData = ' . Json::encode([
    'favorites' => $favoriteItems,
    'endpoints' => [
        'favorites' => Url::to(['/cms/admin-quick-access/favorites']),
        'toggleFavorite' => Url::to(['/cms/admin-quick-access/toggle-favorite']),
        'sortFavorites' => Url::to(['/cms/admin-quick-access/sort-favorites']),
    ],
    'userId'   => $userId,
    'workers'  => array_map(function ($user) {
        return [
            'id'     => (int) $user->id,
            'name'   => (string) $user->shortDisplayName,
            'image'  => (string) ($user->avatarSrc ?: \skeeks\cms\helpers\Image::getCapSrc()),
            'online' => (bool) $user->isOnline,
        ];
    }, $activeUsers),
]) . ';', \yii\web\View::POS_HEAD);
?>
<div class="sx-quick-access-edge" data-sx-quick-access>
    <button class="sx-quick-access-edge__toggle" type="button" data-sx-quick-access-toggle title="Быстрый доступ">
        <i class="fas fa-bolt"></i>
    </button>

    <div class="sx-quick-access-edge__group sx-quick-access-edge__group--users">
        <?php foreach (array_slice($activeUsers, 0, 5) as $user) : ?>
            <?php $workerActionData = Json::encode([
                'isOpenNewWindow' => true,
                'url'             => (string) \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams([
                    '/cms/admin-worker/view',
                    'pk' => $user->id,
                ])->enableEmptyLayout()->enableNoActions()->url,
            ]); ?>
            <span class="sx-quick-access-tooltip"
                  title="<?= Html::encode($user->shortDisplayName); ?>"
                  data-toggle="tooltip"
                  data-placement="left"
                  data-container="body"
                  data-boundary="window"
                  data-offset="0, 10">
                <a class="sx-quick-access-avatar"
                   href="#"
                   data-pjax="0"
                   onclick='new sx.classes.backend.widgets.Action(<?= $workerActionData; ?>).go(); return false;'>
                    <img src="<?= Html::encode($user->avatarSrc ?: \skeeks\cms\helpers\Image::getCapSrc()); ?>" alt="">
                    <span class="<?= $user->isOnline ? 'is-online' : 'is-away'; ?>"></span>
                </a>
            </span>
        <?php endforeach; ?>
    </div>

    <div class="sx-quick-access-edge__separator" data-sx-quick-access-edge-favorites-separator></div>
    <div class="sx-quick-access-edge__group" data-sx-quick-access-edge-favorites></div>
</div>

<div class="sx-quick-access-panel" data-sx-quick-access-panel>
    <div class="sx-quick-access-panel__header">
        <div>
            <div class="sx-quick-access-panel__title">Быстрый доступ</div>
            <div class="sx-quick-access-panel__subtitle">Сотрудники и избранное</div>
        </div>
        <button class="sx-quick-access-panel__close" type="button" data-sx-quick-access-close title="Закрыть">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="sx-quick-access-section" data-sx-quick-access-section="users">
        <div class="sx-quick-access-section__head">
            <i class="fas fa-user-friends"></i>
            <span>Активные сотрудники</span>
        </div>
        <div class="sx-quick-access-list">
            <?php foreach ($activeUsers as $user) : ?>
                <?php $userAction = \skeeks\cms\backend\widgets\AjaxControllerActionsWidget::begin([
                    'controllerId'            => '/cms/admin-worker',
                    'modelId'                 => $user->id,
                    'content'                 => $user->shortDisplayNameWithAlias,
                    'isRunFirstActionOnClick' => true,
                    'tag'                     => 'a',
                    'options'                 => [
                        'class'     => 'sx-quick-access-row',
                        'href'      => '#',
                        'data-pjax' => '0',
                    ],
                ]); ?>
                    <span class="sx-quick-access-row__avatar">
                        <img src="<?= Html::encode($user->avatarSrc ?: \skeeks\cms\helpers\Image::getCapSrc()); ?>" alt="">
                        <span class="<?= $user->isOnline ? 'is-online' : 'is-away'; ?>"></span>
                    </span>
                    <span class="sx-quick-access-row__body">
                        <span class="sx-quick-access-row__title"><?= Html::encode($user->shortDisplayName); ?></span>
                        <span class="sx-quick-access-row__meta"><?= $user->isOnline ? 'онлайн' : 'был в сети ' . \Yii::$app->formatter->asRelativeTime($user->last_admin_activity_at); ?></span>
                    </span>
                <?php $userAction::end(); ?>
            <?php endforeach; ?>
            <?php if (!$activeUsers) : ?>
                <div class="sx-quick-access-empty">Активных сотрудников пока нет</div>
            <?php endif; ?>
        </div>
    </div>

    <div class="sx-quick-access-section" data-sx-quick-access-section="favorites">
        <div class="sx-quick-access-section__head">
            <i class="fas fa-star"></i>
            <span>Избранное</span>
        </div>
        <div class="sx-quick-access-list" data-sx-quick-access-list="favorites"></div>
    </div>
</div>
<div class="sx-quick-access-backdrop" data-sx-quick-access-close></div>
