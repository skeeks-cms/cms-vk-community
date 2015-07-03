<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 27.05.2015
 */
/* @var $this yii\web\View */
use skeeks\cms\modules\admin\widgets\form\ActiveFormUseTab as ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->fieldSet('Отображение'); ?>
        <?= $form->field($model, 'viewFile')->textInput(); ?>
    <?= $form->fieldSetEnd(); ?>

    <?= $form->fieldSet('Параметр виджета'); ?>
        <?= $form->fieldInputInt($model, 'apiId'); ?>
        <?= $form->fieldInputInt($model, 'limit'); ?>
    <?= $form->fieldSetEnd(); ?>

<?= $form->buttonsStandart($model) ?>
<?php ActiveForm::end(); ?>