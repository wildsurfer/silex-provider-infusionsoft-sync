<?php

namespace Wildsurfer\Tests\Infusionsoft\Unit\Silex\Provider;

use Silex\Application;
use Wildsurfer\Infusionsoft\Silex\Provider\SyncServiceProvider;

/*
 * SyncServiceProviderTest
 */
class SyncServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    /*
     * testRegister
     */
    public function testRegister()
    {
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

        $s = $app['infusionsoft.sync'];
        $options = $s->getConfig();

        $this->assertInstanceOf("Wildsurfer\Infusionsoft\Sync", $s);
        $this->assertEquals($s->getConfigTags(), $tags);
        $this->assertEquals($s->getConfigFields(), $fields);
        $this->assertEquals($options['appname'], $appname);
        $this->assertEquals($options['apikey'], $apikey);
    }
}
