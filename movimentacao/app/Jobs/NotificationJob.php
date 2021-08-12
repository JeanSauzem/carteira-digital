<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Artisan;

class NotificationJob extends Job
{
    protected $transacao;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($transacao)
    {
        $this->transacao = $transacao;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Artisan::call('SendNotificationUserTransaction', ['transaction' => $this->transacao]);
    }
}
