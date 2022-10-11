<?php

namespace Tests\Unit;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Database\Factories\UserFactory;
use App\Mail\ConfirmedYourEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
class UpdateUserTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;

    public function test_update_user()
    {
        $user = User::create([
            'name'      =>'Manuel Rojas',
            'rut'       =>'25615612',
            'username'  =>'manolo',
            'email'     =>'manuel@example.com',
            'password'  =>'password',
            'cargo'     =>'RRHH',

        ]);

        $this->post("/updateUser/{$user->id}",[
            'name'      =>'Rodrigo Diaz',
            'rut'       =>'25615613',
            'username'  =>'Rdiaz',
            'email'     =>'rdiaz@example.com',
            'password'  =>'password',
            'cargo'     =>'RRHH',
        ])->assertRedirect("/");

    }
}
