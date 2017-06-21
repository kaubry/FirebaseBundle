<?php
/**
 * Created by IntelliJ IDEA.
 * User: kevin
 * Date: 20.06.2017
 * Time: 17:48
 */

namespace Watershine\FirebaseBundle\Entity;


class CloudMessagingResponse
{

    private $multicast_id;
    private $success;
    private $failure;
    private $canonical_ids;
    private $results;

    /**
     * CloudMessagingResponse constructor.
     * @param $multicast_id
     * @param $success
     * @param $failure
     * @param $canonical_ids
     * @param $results
     */
    public function __construct()
    {
        $this->multicast_id = 0;
        $this->success = 0;
        $this->failure = 0;
        $this->canonical_ids = 0;
        $this->results =  array();
    }

    /**
     * @return mixed
     */
    public function getMulticastId()
    {
        return $this->multicast_id;
    }

    /**
     * @param mixed $multicast_id
     */
    public function setMulticastId($multicast_id)
    {
        $this->multicast_id = $multicast_id;
    }

    /**
     * @return mixed
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @param mixed $success
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }

    /**
     * @return mixed
     */
    public function getFailure()
    {
        return $this->failure;
    }

    /**
     * @param mixed $failure
     */
    public function setFailure($failure)
    {
        $this->failure = $failure;
    }

    /**
     * @return mixed
     */
    public function getCanonicalIds()
    {
        return $this->canonical_ids;
    }

    /**
     * @param mixed $canonical_ids
     */
    public function setCanonicalIds($canonical_ids)
    {
        $this->canonical_ids = $canonical_ids;
    }

    /**
     * @return mixed
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param mixed $results
     */
    public function setResults($results)
    {
        $this->results = $results;
    }




}