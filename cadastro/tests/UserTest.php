<?php

use Illuminate\Support\Str;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    public function testCreateUserWallet()
    {
        $this->post('/register/users', [
            'name' => "teste",
            'cpf_cnpj' => rand(21212121, 99999999),
            'email' => Str::random(14).'@gmail.com',
            'password' => '12345',
            "type_users_id" => "2"
        ]);
        $this->assertResponseStatus(201);
    }

    public function testCreateUserWalletFail()
    {
        $this->post('/register/users', [
            'name' => "teste",
            'cpf_cnpj' => rand(21212121, 99999999),
            'email' => Str::random(14).'@gmail.com',
            'password' => '12345'
        ]);
        $this->assertResponseStatus(400);
    }

    public function testCreateUserWalletTypeUserFail()
    {
        $this->post('/register/users', [
            'name' => "teste",
            'cpf_cnpj' => rand(21212121, 99999999),
            'email' => Str::random(14).'@gmail.com',
            'password' => '12345',
            "type_users_id" => "20000"
        ]);
        $this->assertResponseStatus(400);
    }

    public function testCreateUserWalletMailFail()
    {
        $this->post('/register/users', [
            'name' => "teste",
            'cpf_cnpj' => rand(21212121, 99999999),
            'email' => Str::random(14),
            'password' => '12345',
            "type_users_id" => "20000"
        ]);
        
        $this->assertResponseStatus(400);
    }
}