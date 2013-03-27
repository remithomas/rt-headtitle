rt-headtitle
============

ZF2 HeadTitle plugin, you can easily set any title within yours controllers actions

How to install ?
============
Using composer.json

```
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

Activate the module :

application.config.php
```
<?php
return array(
    'modules' => array(
        'Application',
        'RtHeadtitle',
    )
);
?>
```

How to use ?
============

Layout.phtml
```
<html lang="en">
    <head>
      <?php echo $this->headTitle(); ?>
    </head>
    <body>content</body>
</html>
```

in your own module config (module.config.php)
```
<?php
return array(
    'controller_plugins' => array(
        'invokables' => array(
            'HeadTitle' => 'RtHeadtitle\Controller\Plugin\HeadTitle',
        )
    ),
    ...
```

In your controller action !
```
public function indexAction(){
    $this->headTitle("My website")->setSeparator(" - ")->append("easy ?!");
    return new ViewModel();
}
```
