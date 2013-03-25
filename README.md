rt-headtitle
============

ZF2 HeadTitle plugin

With this plugin you can easily set title from yours controllers

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
