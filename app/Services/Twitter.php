<?php
/**
 * Created by PhpStorm.
 * User: sarah
 * Date: 2019-10-15
 * Time: 13:16
 */

namespace App\Services;


class Twitter
{

    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

}