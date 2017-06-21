<?php
/**
 * Created by IntelliJ IDEA.
 * User: kevin
 * Date: 11.06.2017
 * Time: 17:56
 */

namespace Watershine\FirebaseBundle\Tests\Service;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Watershine\FirebaseBundle\Service\CloudMessagingInterface;
use Watershine\FirebaseBundle\Tests\AppKernel;


class CloudMessagingTest extends TestCase
{

    /** @var  $cloudMessagingService CloudMessagingInterface */
    private $cloudMessagingService;

    protected function setUp()
    {
        $kernel = new AppKernel('test', true);
        $kernel->boot();
        $container = $kernel->getContainer();
        $this->cloudMessagingService = $container->get('watershine_firebase.cloud_messaging');
    }

    public function testSend()
    {
        $data = array('bonjour' => 'salut');
        $to = "et-Br49VRAM:APA91bF-cuTBUlPLgKKSY0tjfLVeUFlKT2oeUUf9Vf6veuTq57e6Qn1BgGjETCKkctIZhC-Vts0jd39n5SZmPc9thTf42s7fFrKR5ngFneRAUxehCn8r4oO57-DXH5ENTwtTF0noMUEd";
        try {
            $cloudMessagingResponse = $this->cloudMessagingService->sendMessageToDevice($to, $data);
            self::assertEquals(1, $cloudMessagingResponse->getSuccess());
        }
        catch(HttpException $e) {
            self::fail($e->getMessage());
        }
    }

}