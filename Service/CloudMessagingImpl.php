<?php

namespace Watershine\FirebaseBundle\Service;


use Curl\Curl;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Watershine\FirebaseBundle\Entity\CloudMessagingResponse;

class CloudMessagingImpl implements CloudMessagingInterface
{

    private $firebaseUrl;
    private $serializer;


    /** @var Curl $curl */
    private $curl;

    /**
     * CloudMessagingImpl constructor.
     */
    public function __construct()
    {

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $this->serializer = new Serializer($normalizers, $encoders);

        $curl = new Curl();
        curl_setopt($curl->curl, CURLOPT_SSL_VERIFYPEER, false);
        $curl->setHeader('Content-Type', 'application/json');
        $this->curl = $curl;
    }

    /**
     * @param string $to
     * @param $data
     * @throws HttpException if there is an error with HTTP
     * @return CloudMessagingResponse
     */
    public function sendMessageToDevice(string $to, $data): CloudMessagingResponse
    {
        $dataArray = array(
            'to' => $to,
            'data' => $data
        );
        $this->curl->post($this->firebaseUrl, $dataArray);
        if ($this->curl->httpError) {
            throw new HttpException($this->curl->httpStatusCode, $this->curl->httpErrorMessage);
        }
        $response = $this->curl->rawResponse;
        return $this->serializer->deserialize($response, CloudMessagingResponse::class, 'json');

    }

    public function setFirebaseURL(string $url)
    {
        $this->firebaseUrl = $url;
    }

    public function setAuthorizationKey(string $key)
    {
       $this->curl->setHeader('Authorization', 'key=' . $key);
    }


}