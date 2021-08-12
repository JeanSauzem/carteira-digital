<?php

namespace App\Console\Commands;

use App\Contracts\Repository\TransfersContract;
use App\Contracts\Services\NotificationContract;
use Illuminate\Console\Command;

class SendNotificationUserTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendNotificationUserTransaction {transaction}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to user after transaction';


    protected $noticationService,
              $transferRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        NotificationContract $noticationService,
        TransfersContract $transferRepository
    ){
        parent::__construct();
        $this->noticationService = $noticationService;
        $this->transferRepository= $transferRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $result = $this->noticationService->sendNotificationTransaction();

        $active = 0;

        if ($result) {
            $active = 1;
        }

        $this->transferRepository->addNotification($active, $this->argument('transaction'));

    }

}