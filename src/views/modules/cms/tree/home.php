<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
/* @var $model \skeeks\cms\models\CmsTree */
if (!$model->meta_title) {
    $this->title = $this->theme->title;
}
?>
<?= $this->render('@app/views/modules/cms/tree/home-' . $this->theme->home_view_file, [
        'model' => $model,
]); ?>
