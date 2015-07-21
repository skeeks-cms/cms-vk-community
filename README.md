Виджет комментарии VK
===================================

Информация
-------------------

Виджет комментарии VK

Установка
------------


1) Добавить в `composer.json` файл проекта.

```
"skeeks/cms-vk-comments": "*"
```

2) Запуск миграций и необходимых установок.

```
php yii cms/update
```

3) Пример использования

```php

<?= \skeeks\cms\vk\comments\VkCommentsWidget::widget([
    'namespace' => 'VkCommentsWidget-main',
    'apiId'     => 4982033
]); ?>

```


> [![skeeks!](https://gravatar.com/userimage/74431132/13d04d83218593564422770b616e5622.jpg)](http://www.skeeks.com)  
<i>Быстро, просто, эффективно</i>
[cms.skeeks.com](http://cms.skeeks.com)