<?php
/**
 * Created by IntelliJ IDEA.
 * User: kevin
 * Date: 11.06.2017
 * Time: 17:56
 */

namespace Watershine\FirebaseBundle\Tests\Service;

use PHPUnit\Framework\TestCase;
use Watershine\FirebaseBundle\Tests\AppKernel;


class CloudMessagingTest extends TestCase
{


    private $cloudMessagingService;

    protected function setUp()
    {

        $kernel = new AppKernel('test', true);
        $kernel->boot();
        $container = $kernel->getContainer();
        $this->cloudMessagingService = $container->get('watershine_firebase.cloud_messaging');
    }

    public function testSend() {

        $this->assertTrue(true);
    }

}