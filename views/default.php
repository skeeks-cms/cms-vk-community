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

    (function(sx, $, _)
    {
        sx.classes.VkWidgetGroup = sx.classes.Component.extend({

            getResutlOptions: function()
            {
                var options = this.get('options');
                var jQWigetWrapper = $("#" + this.get('id'));
                var jQWigetWrapperParent = jQWigetWrapper.parent();

                if (this.get('adaptiveWith'))
                {
                    if (jQWigetWrapperParent.length)
                    {
                        options = _.extend(options, {
                            'width' : jQWigetWrapperParent.width()
                        });
                    }
                }

                if (this.get('observableHeightSelector'))
                {
                    var elementHeight = $(this.get('observableHeightSelector'));
                    if (elementHeight.length)
                    {
                        options = _.extend(options, {
                            'height' : elementHeight.height()
                        });
                    }
                }

                return options;
            },

            buildWidget: function()
            {
                console.log(this.getResutlOptions());
                VK.Widgets.Group(this.get('id'), this.getResutlOptions(), this.get('apiId'));

                return this;
            },

            destroyWidget: function()
            {
                $("#" + this.get('id')).empty();
                return this;
            },

            _onDomReady: function()
            {
                var self = this;
                $( window ).resize(function() {
                   self.destroyWidget().buildWidget();
                });

                this.buildWidget();
            }

        });
    })(sx, sx.$, sx._);

    new sx.classes.VkWidgetGroup({
        'adaptiveWith' : {$widget->adaptiveWith},
        'id' : '{$widget->id}',
        'options' : {$widget->getJsonOptions()},
        'apiId' : "{$widget->apiId}",
    });

JS
    );
    ?>
    <div class="sx-vk-widget-wrapper">
        <div id="<?= $widget->id; ?>"></div>
    </div>

<? endif; ?>