<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 03.07.2015
 */
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\vk\comments\VkCommentsWidget */
?>

<? if ($widget->apiId) : ?>
    <?
    $this->registerJs(<<<JS
        VK.init({apiId: {$widget->apiId}, onlyWidgets: true});
        VK.Widgets.Comments("{$widget->id}", {$widget->getJsonOptions()});
JS
    );
    ?>
    <div id="<?= $widget->id; ?>"></div>
<? endif; ?>