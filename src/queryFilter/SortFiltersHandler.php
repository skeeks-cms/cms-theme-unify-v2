<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 13.11.2017
 */

namespace skeeks\cms\themes\unify\queryFilter;

use backend\models\cont\Feature;
use backend\models\cont\FeatureValue;
use common\models\V3pFeature;
use common\models\V3pFeatureValue;
use common\models\V3pFtSoption;
use common\models\V3pProduct;
use skeeks\yii2\queryfilter\IQueryFilterHandler;
use v3project\yii2\productfilter\EavFiltersHandler;
use v3project\yii2\productfilter\IFiltersHandler;
use yii\base\Model;
use yii\data\DataProviderInterface;
use yii\db\QueryInterface;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 *
 * @property int $currentValue
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class SortFiltersHandler extends Model
    implements IQueryFilterHandler
{

    public $viewFile = '@app/views/filters/sort-filter-hidden';
    public $viewFileVisible = '@app/views/filters/sort-filter';

    public $value = '-popular';
    public $formName = 's';


    public function getValueAsText()
    {
        return (string)ArrayHelper::getValue($this->getSortOptions(), $this->value);
    }


    public function formName()
    {
        return $this->formName;
    }


    public function init()
    {
        $this->value = $this->currentValue;
        return parent::init();
    }

    /**
     * @return int
     */
    public function getCurrentValue()
    {
        if (\Yii::$app->session->offsetExists("sx-sort-value")) {
            $value = (int) \Yii::$app->session->get("sx-sort-value");
            $options = $this->getSortOptions();
            if (isset($options[$value])) {
                return $value;
            }
        }

        return '-popular';
    }

    public function load($data, $formName = NULL)
    {
        $result = parent::load($data, $formName);
        \Yii::$app->session->set("sx-sort-value", $this->value);

        return $result;
    }


    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'value' => 'Сортировка',
        ];
    }

    public function rules()
    {
        return [
            [['value'], 'string'],
        ];
    }

    public function getSortOptions()
    {
        return [
            '-popular' => \Yii::t("skeeks/unify", "Popular"),
            '-new'     => \Yii::t("skeeks/unify", "New"),
        ];
    }
    /**
     * @param DataProviderInterface $dataProvider
     * @return $this
     */
    public function applyToDataProvider(DataProviderInterface $dataProvider)
    {
        return $this->applyToQuery($dataProvider->query);
    }
    /**
     * @param QueryInterface $activeQuery
     * @return $this
     */
    public function applyToQuery(QueryInterface $query)
    {
        if ($this->value) {
            switch ($this->value) {
                case ('-popular'):
                    $query->orderBy([
                        'priority' => SORT_ASC,
                        'show_counter' => SORT_DESC
                    ]);
                    break;

                case ('-new'):
                    $query->orderBy(['published_at' => SORT_DESC]);
                    break;
            }
        }

        return $this;
    }
    public function getSelected()
    {
        return [];
    }

    public function render(ActiveForm $form)
    {
        return \Yii::$app->view->render($this->viewFile, [
            'form'    => $form,
            'handler' => $this,
        ]);
    }

    public function renderVisible(ActiveForm $form = null)
    {
        return \Yii::$app->view->render($this->viewFileVisible, [
            'form'    => $form,
            'handler' => $this,
        ]);
    }
}
