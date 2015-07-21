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
        <?= $form->fieldInputInt($model, 'apiId')->hint('https://vk.com/apps?act=manage - посмотреть тут');; ?>
        <?= $form->fieldInputInt($model, 'limit')->hint('количество комментариев на странице (целое число 5-100)'); ?>
        <?= $form->fieldInputInt($model, 'width')->hint('целое число > 300'); ?>
        <?= $form->fieldInputInt($model, 'height')->hint('задает максимальную высоту виджета в пикселях. Целое число > 500. Если равно 0, то высота не ограничена. Если содержимое виджета больше, чем максимально допустимое, то появляется внутренняя прокрутка. Значение по умолчанию - 0.'); ?>
        <?= $form->field($model, 'attach')->checkboxList(\skeeks\cms\vk\comments\VkCommentsWidget::$possibleAttach)->hint('задает возможность создания прикреплений к комментариям. Строка, содержащая перечисленные через запятую типы допустимых прикреплений либо false в случае отключения этой функции. Возможные типы: graffiti, photo, audio, video, link.'); ?>
        <?= $form->field($model, 'autoPublish')->radioList([
            '1' => 'включена',
            '0' => 'выключена',
        ])->hint('автоматическая публикация комментария в статус пользователю (0 - выключена, 1 - включена). Значение по умолчанию - 1.'); ?>
        <?= $form->field($model, 'norealtime')->radioList([
            '1' => 'отключено',
            '0' => 'включено',
        ])->hint('отключает обновление ленты комментариев в реальном времени. (1 - отключено, 0 - включено). Значение по умолчанию - 0.'); ?>
        <?= $form->field($model, 'mini')->radioList([
            '1' => 'включено',
            '0' => 'выключено',
            'auto' => 'выбирать автоматически в зависимости от доступной ширины',
        ])->hint('использовать ли минималистичный вид виджета - уменьшенный шрифт, уменьшенные миниатюры прикреплений, уменьшенные профильные изображения для комментариев 2го уровня. (1 - включено, 0 - выключено, \'auto\' - выбирать автоматически в зависимости от доступной ширины). Значение по умолчанию - auto'); ?>

<?= $form->fieldSetEnd(); ?>

<?= $form->buttonsStandart($model) ?>
<?php ActiveForm::end(); ?>