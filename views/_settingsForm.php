<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 27.05.2015
 */
/* @var $this yii\web\View */
use skeeks\cms\modules\admin\widgets\form\ActiveFormUseTab as ActiveForm;

\skeeks\cms\vk\community\VkCommunityAssetInnerFile::register($this);

$id = \yii\helpers\Html::getInputId($model, 'apiId');
?>

<?
$this->registerJs(<<<JS


(function(sx, $, _)
{
    sx.classes.VkSubmiter = sx.classes.Component.extend({

        _init: function()
        {},

        _onDomReady: function()
        {
            var self = this;
            $('#btn-vk-submit').on('click', function()
            {
                self.submit( $('#vk-input').val() );
                return this;
            });
        },

        submit: function(groupName)
        {
            $.jsonp({
                url: "https://api.vk.com/method/groups.getById",
                dataType: 'jsonp',
                data: $.param(
                {
                    "group_id" : groupName,
                }),
                callbackParameter: "callback",
                success: function(response)
                {
                    if (response.error)
                    {
                        sx.notify.error(response.error.error_msg);
                        return this;
                    }

                    $('#{$id}').val( response.response[0].gid );
                    return this;

                },
                error: function(response)
                {
                    sx.notify.error('ошибка');
                }
            });
        },

        _onWindowReady: function()
        {}
    });

    new sx.classes.VkSubmiter();
})(sx, sx.$, sx._);

    $('.show_id_group').on('click', function(){
        $('.id_group').toggle();
        $('.show_id_group').clean();
        $('.show_id_group').text('');
        return false;
    });
JS
);
?>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->fieldSet('Отображение'); ?>

    <?= $form->field($model, 'viewFile')->textInput(); ?>
    <?= $form->fieldSetEnd(); ?>

    <?= $form->fieldSet('Параметры виджета'); ?>
        <div class="form-inline">
            <?= \yii\helpers\Html::label('Название группы в VK', 'vk-input'); ?>
            <div class="form_group">
                <?= \yii\helpers\Html::textInput('group_name', '', [
                    'id' => 'vk-input',
                    'class' => 'form-control',
                ]); ?>

            <?= \yii\helpers\Html::a('Определить ID', '#', [
                'id' => 'btn-vk-submit',
                'class' => 'btn btn-default'
            ]); ?>
            </div>
        </div>
        <p <a href="#" class="show_id_group">Показать id группы</a></p>
        <div class="id_group" style="display: none;">
            <?= $form->fieldInputInt($model, 'apiId'); ?>
            <p>Как получить id приложения подробно описано <a href="http://vk.com/pages?oid=-4489985&p=%D0%9A%D0%B0%D0%BA_%D1%83%D0%B7%D0%BD%D0%B0%D1%82%D1%8C_id_%D0%B3%D1%80%D1%83%D0%BF%D0%BF%D1%8B_%D0%B8%D0%BB%D0%B8_%D0%BF%D1%80%D0%BE%D1%84%D0%B8%D0%BB%D1%8F%3F" target="_blank">здесь</a>.</p>
        </div>
        <?= $form->field($model, 'selectMode')->radioList(\skeeks\cms\vk\community\VkCommunityWidget::$possibleMode); ?>

        <?= $form->fieldCheckboxBoolean($model, 'wide')->hint('используется только для новостей'); ?>

        <?= $form->fieldInputInt($model, 'width')->hint('целое число > 120'); ?>
        <?= $form->fieldInputInt($model, 'height')->hint('задает максимальную высоту виджета в пикселях. Целое число > 250. Если содержимое виджета больше, чем максимально допустимое, то появляется внутренняя прокрутка.'); ?>

        <?= $form->field($model, 'color1')->widget(
        \skeeks\cms\widgets\ColorInput::classname(),
        [
            'options' => ['placeholder' => 'Select color ...'],
            'saveValueAs' => 'toHex',
        ]); ?>
        <?= $form->field($model, 'color2')->widget(
        \skeeks\cms\widgets\ColorInput::classname(),
        [
            'options' => ['placeholder' => 'Select color ...'],
            'saveValueAs' => 'toHex',
        ]); ?>
        <?= $form->field($model, 'color3')->widget(
        \skeeks\cms\widgets\ColorInput::classname(),
        [
            'options' => ['placeholder' => 'Select color ...'],
            'saveValueAs' => 'toHex',
        ]); ?>

<?= $form->fieldSetEnd(); ?>

<?= $form->buttonsStandart($model) ?>
<?php ActiveForm::end(); ?>