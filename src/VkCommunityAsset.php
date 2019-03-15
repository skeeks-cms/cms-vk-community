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
 * Class VkCommunityAsset
 * @package skeeks\cms\assets
 */
class VkCommunityAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/vk/community';

    public $js = [
        '//vk.com/js/api/openapi.js?116'
    ];
}
