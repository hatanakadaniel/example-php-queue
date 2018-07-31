<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;

/**
 * Created by PhpStorm.
 * User: s2it_dhatanaka
 * Date: 7/30/18
 * Time: 8:07 PM
 */

class QueueServiceRabbitMQImpl implements QueueService
{

    /**
     * @var AMQPStreamConnection
     */
    private $connection;

    public function connect()
    {
        $this->connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
    }

    public function disconnect()
    {
        if (isset($this->connection)) {
            $this->connection->channel()->close();
            $this->connection->close();
        }
    }

    public function processMessage(\Illuminate\Console\Command $command)
    {
        $channel = $this->connection->channel();
        $channel->queue_declare('hello', false, false, false, false);
        $channel->basic_consume('hello', '', false, true, false, false, function ($message) use ($command) {
            $command->info($message->body);
        });
        while (count($channel->callbacks)) {
            $channel->wait();
        }
    }
}