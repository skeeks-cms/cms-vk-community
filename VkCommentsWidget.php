<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 03.07.2015
 */
namespace skeeks\cms\vk\comments;

use skeeks\cms\base\WidgetRenderable;

/**
 * Class VkCommentsWidget
 * @package skeeks\cms\vk\comments
 */
class VkCommentsWidget extends WidgetRenderable
{
    public $limit;
    public $apiId;

    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => 'Виджет комментарии VK'
        ]);
    }

    /**
     * Файл с формой настроек, по умолчанию
     *
     * @return string
     */
    public function getConfigFormFile()
    {
        $class = new \ReflectionClass($this->className());
        return dirname($class->getFileName()) . DIRECTORY_SEPARATOR . 'views/_VkCommentsWidgetForm.php';
    }


    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),
        [
            'limit'                 => 'Количество записей',
            'apiId'                 => 'ID приложения vk',
        ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),
        [
            [['limit'], 'integer'],
            [['apiId'], 'integer'],
            [['apiId'], 'require'],
        ]);
    }

    protected function _run()
    {
        return [];
    }
}