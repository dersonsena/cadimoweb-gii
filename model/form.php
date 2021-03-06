<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator yii\gii\generators\model\Generator */
use yii\gii\generators\model\Generator;

echo $form->field($generator, 'tableName')->textInput(['table_prefix' => $generator->getTablePrefix()]);
echo $form->field($generator, 'modelClass');
echo $form->field($generator, 'ns');
echo $form->field($generator, 'baseClass');
echo $form->field($generator, 'db');
echo $form->field($generator, 'useTablePrefix')->checkbox();
echo $form->field($generator, 'generateEntityModel')->checkbox();
?>

<fieldset>
    <legend>Search Model Configuration</legend>
    <?php
    echo $form->field($generator, 'generateSearchModel')->checkbox();
    echo $form->field($generator, 'searchDefaultOrderField')->textInput([
        'placeholder' => 'If empty, the first column of table will setting.'
    ]);
    echo $form->field($generator, 'searchDefaultOrderDirection')->dropDownList([
        SORT_ASC => 'ASC',
        SORT_DESC => 'DESC',
    ])
    ?>
</fieldset>

<?php
echo $form->field($generator, 'generateRelations')->dropDownList([
    Generator::RELATIONS_NONE => 'No relations',
    Generator::RELATIONS_ALL => 'All relations',
    Generator::RELATIONS_ALL_INVERSE => 'All relations with inverse',
]);
echo $form->field($generator, 'generateRelationsFromCurrentSchema')->checkbox();
//echo $form->field($generator, 'generateQuery')->checkbox();
//echo $form->field($generator, 'queryNs');
//echo $form->field($generator, 'queryClass');
//echo $form->field($generator, 'queryBaseClass');
echo $form->field($generator, 'useSchemaName')->checkbox();
