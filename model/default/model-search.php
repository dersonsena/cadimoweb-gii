<?php
/* @var $this yii\web\View */
/* @var $generator \dersonsena\cadimowebgii\model\Generator */
/* @var $tableName string full table name */
/* @var $className string class name */
/* @var $queryClassName string query class name */
/* @var $tableSchema yii\db\TableSchema */
/* @var $properties array list of properties (property => [type, name. comment]) */
/* @var $labels string[] list of attribute labels (name => label) */
/* @var $rules string[] list of validation rules */
/* @var $relations array list of relations (name => relation declaration) */
$firstColumn = array_shift($properties)['name'];
$sortColumn = (!empty($generator->searchDefaultOrderField) ? $generator->searchDefaultOrderField : $firstColumn);
$sortDirection = '';

switch ($generator->searchDefaultOrderDirection) {
    case SORT_ASC:
        $sortDirection = 'SORT_ASC';
        break;
    case SORT_DESC:
        $sortDirection = 'SORT_DESC';
        break;
}

echo "<?php\n";
?>

namespace <?= $generator->ns ?>\search;

use Yii;
use <?= $generator->ns . '\\' . $className ?>;<?= "\n" ?>
use yii\data\ActiveDataProvider;
use yii\db\Query;

/**
 * This is the model search class for table "<?= $generator->generateTableName($tableName) ?>".
 */
class <?= $className ?>Search extends <?= $className . "\n" ?>
{
   /**
    * @var array Search Params List
    */
    public $params = [];

   /**
    * @inheritdoc
    */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
<?php foreach ($labels as $name => $label): ?>
            <?= "'$name' => " . $generator->generateString($label) . ",\n" ?>
<?php endforeach; ?>
        ];
    }

   /**
    * Creates data provider instance with search query applied
    * @param array $params
    * @return ActiveDataProvider
    */
    public function search(array $params)
    {
        $this->params = $params;

        /** @var Query $query */
        $query = <?= $className ?>::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->params['pagination']['pageSize'],
            ],
            'sort' => [
                'defaultOrder' => ['<?= $sortColumn ?>' => <?= $sortDirection ?>]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        /*$query->where([
            'column_name_1' => $this->column_name_1,
            'column_name_2' => $this->column_name_2,
        ]);

        $query->andWhere(['ILIKE', 'columns_name', $this->column_name . '%', false]);*/

        return $dataProvider;
    }
}
