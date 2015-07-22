<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.03.2015
 */
namespace skeeks\cms\vk\community;
use yii\web\AssetBundle;

/**
 * Class VkCommunityAssetInnerFile
 * @package skeeks\cms\vk\community
 */
class VkCommunityAssetInnerFile extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/vk/community/assets';

    public $js = [
        'jquery.jsonp.js'
    ];
    public $depend = [
        '\yii\web\YiiAsset'
    ];
}
