<?php

namespace Watershine\FirebaseBundle\Service;


use Curl\Curl;

class CloudMessagingImpl
{

    private $contentType;
    private $authorizationKey;
    private $firebaseUrl;


    private $curl;

    /**
     * CloudMessagingImpl constructor.
     */
    public function __construct()
    {

        $this->loadConfig();

        $curl = new Curl();
        $curl->setHeader('Authorization:key', $this->authorizationKey);
        $curl->setHeader('Content-Type', $this->contentType);

        $this->curl = $curl;
    }

    private function loadConfig()
    {
        $this->firebaseUrl = 'https://fcm.googleapis.com/fcm/send';
        $this->contentType = 'application/json';
    }

    public function sendMessageToDevice(string $to, string $data) {
        $dataArray = array(
            'to' => $to,
            'data' => $data
        );
        $this->curl->post($this->firebaseUrl, $dataArray);
        var_dump($this->curl->response->json);
    }


}