<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 03.07.2015
 */
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\vk\community\VkCommunityWidget */
?>

<? if ($widget->apiId) : ?>
    <?
    $this->registerJs(<<<JS
        VK.Widgets.Group("{$widget->id}", {$widget->getJsonOptions()}, "{$widget->apiId}");
JS
    );
    ?>
    <div id="<?= $widget->id; ?>"></div>
<? endif; ?>