<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


use Illuminate\Support\Facades\DB;


class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_page_register()
    {
        $this->get('/register')
            ->assertStatus(200);
    }

    function test_creacion_usuario_correcto(){

        $user = User::create([
            'name'      =>'Manuel Rojas',
            'rut'       =>'25615612',
            'username'  =>'manolo',
            'email'     =>'manuel@example.com',
            'password'  =>'password',
            'cargo'     =>'RRHH',

        ]);

        $this->post('/register',[
            'name'      =>'Manuel Rojas',
            'rut'       =>'25615612',
            'username'  =>'manolo',
            'email'     =>'manuel@example.com',
            'password'  =>'password',
            'cargo'     =>'RRHH',
    ])->assertRedirect('/');

        $this->assertDatabaseHas('users',[
            'name'      =>'Manuel Rojas',
            'rut'       =>'25615612',
            'username'  =>'manolo',
            'email'     =>'manuel@example.com',
            //'password'  =>'password',
            'cargo'     =>'RRHH',
        ]);
    }

    
    public function test_creacion_usuario_incorrecto()
    {
        $this->from('/register')->post('/register', [
            'name'      =>' ',
            'rut'       =>'25615612',
            'username'  =>'manolo',
            'email'     =>'manuel@example.com',
            //'password'  =>'password',
            'cargo'     =>'RRHH',
        ])
        ->assertRedirect('/register');


    }


}
