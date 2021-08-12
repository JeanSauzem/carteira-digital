<?php

namespace App\Services;

use App\Contracts\Services\NotificationContract;
use App\Traits\IntegrationExternalTrait;

class NotificationService implements NotificationContract
{
    use IntegrationExternalTrait;

    public function sendNotificationTransaction()
    {
        $result = $this->get(env('URL_NOTIFICATION_EXTERNO'));
    
        if (isset($result['message'])  || $result['message'] == 'Success') {
            return true;
        }

        return false;
    }
}