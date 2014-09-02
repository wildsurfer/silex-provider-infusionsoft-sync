<?php

namespace Wildsurfer\Infusionsoft\Silex\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Wildsurfer\Infusionsoft\Sync;

class SyncServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['infusionsoft.sync'] = $app->share(function() use ($app) {
            $options = array(
                'appname' => $app['infusionsoft.appname'],
                'apikey' => $app['infusionsoft.apikey'],
                'tags' => $app['infusionsoft.tags'],
                'fields' => $app['infusionsoft.fields']
            );
            $s = new Sync($options);
            return $s;
        });
    }

    public function boot(Application $app)
    {
    }
}
