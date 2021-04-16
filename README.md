[DEPRECATED] silex-provider-infusionsoft-sync
================================

This is a Silex service provider for library `wildsurfer/infusionsoft-sync`.

More info: https://github.com/wildsurfer/infusionsoft-sync

Example
=======

``` php
<?php
use Silex\Application;

$key = 'secretkey';
$appName = 'appname';

$apikey = 'rdtdhtdid56urdtdcgfhdrhgf';
$appname = 'test';
$tags = array(1, 2, 3);
$fields = array('FirstName', 'LastName');

$app = new Application();
$app->register(new SyncServiceProvider(), array(
    'infusionsoft.apikey' => $apikey,
    'infusionsoft.appname' => $appname,
    'infusionsoft.tags' => $tags,
    'infusionsoft.fields' => $fields
));

$contacts = $app['infusionsoft.sync']->pull();

```

Install with Composer
=====================

``` js
  {
      require: {
          "wildsurfer/silex-provider-infusionsoft-sync": "~0.1"
      }
  }
```
