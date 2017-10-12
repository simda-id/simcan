Laravel Bootstrap Breadcrumb Helper
==================================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require hoaaah/laravel-bootstrap-breadcrumb:dev-master
```

or add

```
"hoaaah/laravel-bootstrap-breadcrumb": "dev-master"
```

to the require section of your `composer.json` file.

# Usage

You can use this helper in your view. It also support blade template.

## Breadcrumb Skeleton

This helper consist of this following code.

```
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;

// ..........

$breadcrumb = new Breadcrumb(); // class
$breadcrumb->begin(); //required to begin breadcrumb
//your breadcrumb ---------------------------
$breadcrumb->end(); //required to end breadcrumb
```

## Costum Homepage

This helper use `url('\')` as default home Url. You can change your home url with `homeUrl` method. The following code as an example.
```
$breadcrum = new Breadcrumb();
$breadcrumb->homeUrl = 'home'; // Use this if you want costum homeUrl, default to url('/');
$breadcrumb->begin();
//.....................
$breadcrumb->end();
```

## Add Breadcrumb Item

You can use method `add` to add your breadcrumb. This method have two parameter,
* `label` is a string. This param use for label of your breadcrumb. This param is required for add breadcrumb
* 'url' is a string. This param use for link of your breadcrumb. You don't need to use 'url()' helper. This param is optional

The following code are complete example of breadcrumb item

```
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;

$breadcrumb = new Breadcrumb();
$breadcrumb->begin();
$breadcrumb->add(['label' => 'Link 1']);
$breadcrumb->add(['url' => '/link2', 'label' => 'Link 2']);
$breadcrumb->add(['label' => $this->title]);
$breadcrumb->end();
```
