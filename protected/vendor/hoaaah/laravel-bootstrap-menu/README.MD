Laravel Bootstrap Menu Helper
==================================

Laravel Bootstrap Menu are helper to create dynamic menu within laravel. This helper temporary tested with [SB Admin 2](https://github.com/BlackrockDigital/startbootstrap-sb-admin-2). So please be patient for further development.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require hoaaah/laravel-bootstrap-menu:dev-master
```

or add

```
"hoaaah/laravel-bootstrap-menu": "dev-master"
```

to the require section of your `composer.json` file.

# Usage

You can use this helper in your view. It also support blade template.

## Breadcrumb Skeleton

This helper consist of this following code.

```
use hoaaah\LaravelMenu\Menu as Menu;

// ..........

$menu = new Menu; // class
// render menu
$menu->render(
        'options' => [...] // optional
        'items' => [...]  // required
    );
```

## Options

This is optional parameter. You can pass this following params in options.

* `divClass` param are div class for your Bootstrap menu. Default value of divClass is 'sidebar-nav navbar-collapse'. You can change your div class with `divClass` param.

* `ulClass` param are ul class for your Bootstrap menu. Default value of ulClass is 'nav'. You can change your ul class with `ulClass` param.

* `ulId` param are ul id for your Bootstrap menu. Default value of ulId is 'side-menu'. You can change your ul id with `ulId` param.

The following code as an example.
```
$menu->render(
        'options' => [
            'ulId' => 'side-menu'
        ],
        'items' => [...]  // required
    );
```

## Items

`items` params are required to render menu. `items` is an array. This helper support three menu level. You can pass this following params in `items`.

* `label` is a string. This param use for label of your menu. This param is required for `items`
* `url` is a string. This param use for link of your menu. You don't need to use 'url()' helper. This param is required unless this items are header of next level menu (dropdown)
* `icon` is a string. This param use for icon of your menu. Default value of `icon` is `fa fa-circle-o`. This param is optional, you can change the icon of your menu with `icon` param.
* `visible` is a bool. This param use for visibility of your menu. Default value of `visible` is 'true'. This param is optional, you can change visibility of your menu with `visible` param
* `items` is an array. This param use for add another level of your menu. You can use all of items params in this param. If `items` param exist, `url` param will be ignored.

The following code are complete example of breadcrumb item

```
use hoaaah\LaravelMenu\Menu as Menu;

$menu = new Menu; // class

$menu->render(
        'options' => [
            'ulId' => 'side-menu'
        ],
        'items' => [
            ['label' => 'Dashboard', 'icon' => 'fa fa-home', 'url' => '/'],
            [
                'label' => 'First Level 1',
                'visible' => true,
                'items' => [
                    ['label' => 'Second Level -1', 'url' => '/renja'],
                    ['label' => 'Second Level -2', 'url' => '/renja'],
                ]
            ],            
            [
                'label' => 'First Level 2',
                'items' => [
                    [
                        'label' => 'Second Level 1',
                        'visible' => true,
                        'items' => [
                            ['label' => 'Third Level 1', 'url' => '/ranwalrkpd'],
                            ['label' => 'Third Level 2', 'url' => '/ranwalrkpd'],
                        ]
                    ],
                ]
            ],
        ]
    );
```
