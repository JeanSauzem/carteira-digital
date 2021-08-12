<?php

namespace App\Services;

use App\Contracts\Services\TransactionContract;
use App\Traits\IntegrationExternalTrait;

class TransactionService implements TransactionContract
{
    use IntegrationExternalTrait;

    public function checkAutorizador()
    {
        $result = $this->get(env('URL_AUTORIZADOR_EXTERNO'));

        if (isset($result['message'])  || $result['message'] == 'Autorizado') {
            return true;
        }

        return false;
    }
}