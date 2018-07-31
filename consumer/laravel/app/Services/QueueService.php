<?php
/**
 * Created by PhpStorm.
 * User: s2it_dhatanaka
 * Date: 7/30/18
 * Time: 8:01 PM
 */

namespace App\Services;

interface QueueService
{

    const WAIT_BEFORE_RECONNECT = 1000000; // 1 second

    public function connect();
    public function disconnect();
    public function processMessage(\Illuminate\Console\Command $command);

}