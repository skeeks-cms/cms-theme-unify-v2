<?
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 06.03.2015
 */
/* @var $this \yii\web\View */
?>

<? /*= $this->render('@template/include/breadcrumbs', [
    'title' => "Результаты поиска: " . \Yii::$app->cmsSearch->searchQuery
])*/ ?>
<section style="padding: 40px 0;">
    <div class="container sx-content">
        <div class="row">
            <div class="col-md-12">
                <? \skeeks\cms\modules\admin\widgets\Pjax::begin(); ?>
                <div class="alert alert-info" role="alert">
                    Вы искали: <strong><?= \Yii::$app->cmsSearch->searchQuery; ?></strong>
                </div>
                <!--=== Content Part ===-->
                <div class="row">
                    <div class="col-md-12">
                        <?= \skeeks\cms\cmsWidgets\contentElements\ContentElementsCmsWidget::widget([
                            'namespace' => 'ContentElementsCmsWidget-search-result',
                            'viewFile' => '@app/views/modules/cmsSearch/_widget',
                            'enabledCurrentTree' => \skeeks\cms\components\Cms::BOOL_N,
                            'active' => "Y",
                            'dataProviderCallback' => function (\yii\data\ActiveDataProvider $dataProvider) {
                                \Yii::$app->cmsSearch->buildElementsQuery($dataProvider->query);
                                \Yii::$app->cmsSearch->logResult($dataProvider);
                            },
                        ]) ?>
                    </div>
                </div>
                <? \skeeks\cms\modules\admin\widgets\Pjax::end(); ?>
            </div>
        </div>
    </div>
</section>
