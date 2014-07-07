Using Menu
----------

Menu manager used for build hierarchical menu. This is automatically look of user 
role and permision then return menus that he has access.

```php
use orcsis\admin\components\AccessHelper;
use yii\bootstrap\Nav;

echo Nav::widget([
    'items' => AccessHelper::getAssignedMenu(Yii::$app->user->id)
]);

```
Return of `orcsis\admin\components\AccessHelper::getAssignedMenu()` has default format like:
```php
[
    [
        'label' => $menu['name'], 
        'url' => [$menu['route']],
        'items' => [
			[
				'label' => $menu['name'], 
				'url' => [$menu['route']]
            ],
            ....
        ]
    ],
    [
        'label' => $menu['name'], 
        'url' => [$menu['route']],
        'items' => [
			[
				'label' => $menu['name'], 
				'url' => [$menu['route']]
            ]
        ]
    ],
    ....
]
```
where `$menu` variable corresponden with a record of table `menu`. You can customize 
return format of `orcsis\admin\components\AccessHelper::getAssignedMenu()` by provide a callback to this methode.
The callback must have format `function($menu){}`. E.g:
```php
$callback = function($menu){
    $data = eval($menu['data']);
    return [
        'label' => $menu['name'], 
        'url' => [$menu['route']],
        'options' => $data,
        'items' => $menu['children']
        ]
    ]
}

$items = AccessHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
```
Default result is get from `cache`. If you want to force regenerate, provide boolean `true` as forth parameter.


Second parameter of `mdm\admin\components\AccessHelper::getAssignedMenu()` used to get menu on it's own hierarchy.
E.g. Your menu structure:

* Side Menu
  * Menu 1
    * Menu 1.1
    * Menu 1.2
    * Menu 1.3
  * Menu 2
    * Menu 2.1
    * Menu 2.2
    * Menu 2.3
* Top Menu
  * Top Menu 1
    * Top Menu 1.1
    * Top Menu 1.2
    * Top Menu 1.3
  * Top Menu 2
  * Top Menu 3
  * Top Menu 4

You can get 'Side Menu' chldren by calling
```php
$items = AccessHelper::getAssignedMenu(Yii::$app->user->id, $sideMenuId);
```
It will result in
* Menu 1
  * Menu 1.1
  * Menu 1.2
  * Menu 1.3
* Menu 2
  * Menu 2.1
  * Menu 2.2
  * Menu 2.3
