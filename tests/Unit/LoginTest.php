<?php

namespace Tests\Unit;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_page_login()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_login()
    {
        $user = User::create([
            'name'      =>'Manuel Rojas',
            'rut'       =>'25615612',
            'username'  =>'manuel',
            'email'     =>'manuel@example.com',
            'password'  =>'password',
            'cargo'     =>'RRHH',

        ]);
        //$user = User::factory()->create();

        $credentials = [
            "email" => $user->email,//"manuel@example.com",
            "password" =>"password"
        ];

        $response = $this->post('/login', $credentials);

        $response->assertRedirect('/');
        $this->assertCredentials($credentials);

    }


    public function test_login_invalid_password()
    {
        $user = User::create([
            'name'      =>'Manuel Rojas',
            'rut'       =>'25615612',
            'username'  =>'manolo',
            'email'     =>'manuel@example.com',
            'password'  =>'password',
            'cargo'     =>'RRHH',

        ]);
        //$user = User::factory()->create();


        $this->post('/login', [
            'email' => $user->email,//'manuel@example.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }


}
