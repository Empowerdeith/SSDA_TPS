<?php

namespace Tests\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;

use App\Http\Requests\UpdateUserRequest;
use Tests\TestCase;

use Illuminate\Support\Facades\DB;



class DeleteUserTest extends TestCase
{
    use DatabaseTransactions;

    public function test_user_delete()
    {
        $user = User::create([
            'name'      =>'Manuel Rojas',
            'rut'       =>'25615612',
            'username'  =>'manuel',
            'email'     =>'manuel@example.com',
            'password'  =>'password',
            'cargo'     =>'RRHH',

        ]);

        $this->post("/deleteUser/{$user->id}")
        ->assertRedirect('/showUsers');

        $this->assertDatabaseMissing('users', ['id' => $user->id]);


    }
    }



