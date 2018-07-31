<?php

namespace App\Console\Commands;

use App\Services\QueueService;
use Illuminate\Console\Command;

class MQWork extends Command
{
    private $queueService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mq:work';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Worker for Message Queue';

    /**
     * MQWork constructor.
     * @param QueueService $queueService
     */
    public function __construct(QueueService $queueService)
    {
        parent::__construct();
        $this->queueService = $queueService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Iniciando Worker...');
        while (true) {
            try {
                $this->info('Estabelecendo conexao...');
                $this->queueService->connect();
                $this->info('Conexao estabelecida...');
                $this->queueService->processMessage($this);
            } catch (\Exception $e) {
                $this->queueService->disconnect();
                usleep(QueueService::WAIT_BEFORE_RECONNECT);
            }
        }
    }

}
