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
        <?= $form->fieldInputInt($model, 'apiId'); ?>
        <p>Как получить id приложения подробно описано <a href="http://vk.com/pages?oid=-4489985&p=%D0%9A%D0%B0%D0%BA_%D1%83%D0%B7%D0%BD%D0%B0%D1%82%D1%8C_id_%D0%B3%D1%80%D1%83%D0%BF%D0%BF%D1%8B_%D0%B8%D0%BB%D0%B8_%D0%BF%D1%80%D0%BE%D1%84%D0%B8%D0%BB%D1%8F%3F" target="_blank">здесь</a>.</p>

        <?= $form->field($model, 'selectMode')->radioList(\skeeks\cms\vk\community\VkCommunityWidget::$possibleMode); ?>

        <?= $form->fieldCheckboxBoolean($model, 'wide')->hint('используется только для новостей'); ?>

        <?= $form->fieldInputInt($model, 'width')->hint('целое число > 120'); ?>
        <?= $form->fieldInputInt($model, 'height')->hint('задает максимальную высоту виджета в пикселях. Целое число > 250. Если содержимое виджета больше, чем максимально допустимое, то появляется внутренняя прокрутка.'); ?>

        <?= $form->fieldInputInt($model, 'color1'); ?>
        <?= $form->fieldInputInt($model, 'color2') ?>
        <?= $form->fieldInputInt($model, 'color3') ?>

<?= $form->fieldSetEnd(); ?>

<?= $form->buttonsStandart($model) ?>
<?php ActiveForm::end(); ?>