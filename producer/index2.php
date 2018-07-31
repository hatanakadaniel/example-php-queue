<?php
/**
 * Created by PhpStorm.
 * User: s2it_dhatanaka
 * Date: 7/30/18
 * Time: 10:08 PM
 */

require_once __DIR__.'/vendor/autoload.php';

$client = new \Predis\Client([
    'scheme' => 'tcp',
    'host'   => 'redis',
    'port'   => 6379,
    'read_write_timeout' => 0
]);

