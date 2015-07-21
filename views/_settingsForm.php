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

    <?= $form->fieldSet('Параметры виджета'); ?>
        <?= $form->fieldInputInt($model, 'apiId')->hint('https://vk.com/apps?act=manage - посмотреть тут'); ?>
        <?= $form->field($model, 'selectMode')->checkboxList(\skeeks\cms\vk\community\VkCommunityWidget::$possibleMode); ?>

        <?= $form->fieldCheckboxBoolean($model, 'wide')->hint('используется только для новостей'); ?>

        <?= $form->fieldInputInt($model, 'width')->hint('целое число > 120'); ?>
        <?= $form->fieldInputInt($model, 'height')->hint('задает максимальную высоту виджета в пикселях. Целое число > 250. Если содержимое виджета больше, чем максимально допустимое, то появляется внутренняя прокрутка.'); ?>

        <?= $form->fieldInputInt($model, 'color1'); ?>
        <?= $form->fieldInputInt($model, 'color2') ?>
        <?= $form->fieldInputInt($model, 'color3') ?>

<?= $form->fieldSetEnd(); ?>

<?= $form->buttonsStandart($model) ?>
<?php ActiveForm::end(); ?>