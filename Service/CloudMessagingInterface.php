<?php
/**
 * Created by IntelliJ IDEA.
 * User: kevin
 * Date: 19.06.2017
 * Time: 13:27
 */

namespace Watershine\FirebaseBundle\Service;

use Watershine\FirebaseBundle\Entity\CloudMessagingResponse;

interface CloudMessagingInterface
{
    public function sendMessageToDevice(string $to, $data): CloudMessagingResponse;
    public function setFirebaseURL(string $url);
    public function setAuthorizationKey(string $key);
}