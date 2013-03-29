rt-headtitle
============

ZF2 HeadTitle plugin, you can easily set any title within yours controllers actions

Features / Goals
============

* Set and manage your titles from controllers actions

How to install ?
============
### Using composer.json

```json
{
    "name": "zendframework/skeleton-application",
    "description": "Skeleton Application for ZF2",
    "license": "BSD-3-Clause",
    "keywords": [
        "framework",
        "zf2"
    ],
    "minimum-stability": "dev",
    "homepage": "http://framework.zend.com/",
    "require": {
        "php": ">=5.3.3",
        "zendframework/zendframework": "dev-master",
        "remithomas/rt-headtitle": "dev-master"
    }
}
```

### Activate the module :

application.config.php
```php
<?php
return array(
    'modules' => array(
        'Application',
        'RtHeadtitle',
    )
);
?>
```


### Only activated in one module
If you need to use this plugin **only in one module**. Just copy this code and add it into your own module config (module.config.php)
```php
<?php
return array(
    'controller_plugins' => array(
        'invokables' => array(
            'HeadTitle' => 'RtHeadtitle\Controller\Plugin\HeadTitle',
        )
    ),
    ...
```
### Activated for all the application
If you need to use this plugin **in all your application**. Just copy the file [rt-headtitle.global.php.dist](https://github.com/remithomas/rt-headtitle/blob/master/config/rt-headtitle.global.php.dist) (/vendor/remithomas/rt-headtitle/config/) and paste it into the folder **/config/autoload/**

### Change your Layout.phtml
```php
<html lang="en">
    <head>
      <?php echo $this->headTitle(); ?>
    </head>
    <body>content</body>
</html>
```

How to use ?
============

### How to use in your controller action !
```php
public function indexAction(){
    $this->headTitle("My website")->setSeparator(" - ")->append("easy ?!");
    return new ViewModel();
}
```