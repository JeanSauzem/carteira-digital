<?php

use Illuminate\Support\Str;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TransactionTest extends TestCase
{
    public function testDepositMoney()
    {
        $this->post('/transaction/deposit', [
            'user_id' => 4,
            'value' => 150
        ]);

        $this->assertResponseStatus('201');
    }
}