<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 03.07.2015
 */
namespace skeeks\cms\vk\community;

use skeeks\cms\base\WidgetRenderable;
use skeeks\cms\components\Cms;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * @property string $jsonOptions
 *
 * Class VkCommunityWidget
 * @package skeeks\cms\vk\comments
 */
class VkCommunityWidget extends WidgetRenderable
{
    const MODE_MEMBER       = 0;
    const MODE_NEWS         = 2;
    const MODE_NAME         = 1;

    public $adaptiveWith    = true;

    public $wide            = Cms::BOOL_N;
    public $width           = 220;
    public $height          = 400;
    public $autoPublish     = 1;
    public $color1          = 'FFFFFF';
    public $color2          = '2B587A';
    public $color3          = '5B7FA6';

    public $norealtime      = 0;

    static public $possibleMode = [
        self::MODE_NEWS         => 'Новости',
        self::MODE_MEMBER       => 'Участники',
        self::MODE_NAME         => 'Только название',
    ];

     /**
     * @var string
     */
    public $selectMode = self::MODE_MEMBER;

    public $apiId;

    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => 'Виджет для сообществ VK'
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
            'selectMode'            => 'Вид',
            'height'                => 'Максимальную высоту виджета в пикселях',
            'width'                 => 'Ширина блока',

            'color1'                => 'Цвет фона',
            'color2'                => 'Цвет текста',
            'color3'                => 'Цвет кнопок',

            'wide'                  => 'Расширенный режим',
        ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),
        [
            [['apiId'],         'integer'],
            [['apiId'],         'required'],
            [['width'],         'integer', 'min' => 120],
            [['height'],        'integer', 'min' => 250],
            [['wide'],          'string'],
            [['selectMode'],    'integer'],
            [['selectMode'],    'required'],
            [['color1'],        'string'],
            [['color2'],        'string'],
            [['color3'],        'string'],
        ]);
    }

    /**
     * @return string
     */
    public function getJsonOptions()
    {
        $res = [
            'mode' => (int) $this->selectMode,
            'width' => (int) $this->width,
            'height' => (int) $this->height,


        ];
        if ($this->selectMode == self::MODE_NEWS)
        {
            $res = array_merge($res, [
                'wide' => (int) ($this->wide == Cms::BOOL_Y)
            ]);
        }
        else
        {
            $res = array_merge($res, [
                'color1' =>  $this->color1,
                'color2' =>  $this->color2,
                'color3' =>  $this->color3
            ]);
        }
        return Json::encode($res);
    }
    /**
     * @return string
     */
    protected function _run()
    {
        VkCommunityAsset::register($this->view);
        return parent::_run();
    }
}