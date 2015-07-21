<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 03.07.2015
 */
namespace skeeks\cms\vk\comments;

use skeeks\cms\base\WidgetRenderable;
use skeeks\cms\components\Cms;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * @property string $jsonOptions
 *
 * Class VkCommentsWidget
 * @package skeeks\cms\vk\comments
 */
class VkCommentsWidget extends WidgetRenderable
{
    const ATTACH_PHOTO      = 'photo';
    const ATTACH_GRAFFITI   = 'graffiti';
    const ATTACH_AUDIO      = 'audio';
    const ATTACH_VIDEO      = 'video';
    const ATTACH_LINK       = 'link';

    public $limit           = 10;
    public $width           = 500;
    public $autoPublish     = 1;
    public $mini            = 'auto';
    public $height          = 0;
    public $norealtime      = 0;

    public $attach = [
        self::ATTACH_GRAFFITI,
        self::ATTACH_PHOTO,
        self::ATTACH_AUDIO,
        self::ATTACH_VIDEO,
        self::ATTACH_LINK,
    ];

    static public $possibleAttach = [
        self::ATTACH_GRAFFITI   => 'Граффити',
        self::ATTACH_PHOTO      => 'Фотографии',
        self::ATTACH_VIDEO      => 'Видео',
        self::ATTACH_AUDIO      => 'Аудио',
        self::ATTACH_LINK       => 'Ссылки',
    ];

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
        return dirname($class->getFileName()) . DIRECTORY_SEPARATOR . 'views/_settingsForm.php';
    }


    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),
        [
            'apiId'                 => 'ID приложения vk',
            'limit'                 => 'Количество записей',
            'attach'                => 'Возможность создания прикреплений к комментариям.',
            'autoPublish'           => 'Автоматическая публикация комментария в статус пользователю',
            'mini'                  => 'Минималистичный вид виджета',
            'height'                => 'Максимальную высоту виджета в пикселях',
            'width'                 => 'Ширина блока',
            'norealtime'            => 'Отключить обновление ленты комментариев в реальном времени.',
        ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),
        [
            [['apiId'], 'integer'],
            [['apiId'], 'required'],
            [['limit'], 'integer', 'min' => 5, 'max' => 100],
            [['width'], 'integer', 'min' => 300],
            [['attach'], 'safe'],
            [['autoPublish'], 'in', 'range' => [0,1]],
            [['mini'], 'in', 'range' => [0,1,'auto']],
            [['height'], 'integer'],
            [['norealtime'], 'in', 'range' => [0,1]],
        ]);
    }

    /**
     * @return string
     */
    public function getJsonOptions()
    {
        return Json::encode([
            'width' => (int) $this->width,
            'limit' => (int) $this->limit,
            'attach' => implode(',', (array) $this->attach),
            'autoPublish' => (int) $this->autoPublish,
            'mini' => $this->mini,
            'height' => (int) $this->height,
            'norealtime' => (int) $this->norealtime,
        ]);
    }
    /**
     * @return string
     */
    protected function _run()
    {
        VkAsset::register($this->view);
        return parent::_run();
    }
}