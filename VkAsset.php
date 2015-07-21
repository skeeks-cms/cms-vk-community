<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.03.2015
 */
namespace skeeks\cms\vk\comments;
use yii\web\AssetBundle;
/**
 * Class VkAsset
 * @package skeeks\cms\assets
 */
class VkAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/vk/comments';

    public $js = [
        '//vk.com/js/api/openapi.js?116'
    ];
}
