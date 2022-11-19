<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Providers\RouteServiceProvider;
use Database\Factories\UserFactory;
use App\Http\Controllers\ManageEmailController;
use Illuminate\Http\Request;

class ManageMailTest extends TestCase
{   
    //Para esta prueba se requiere crear los roles. Antes de ejecutar la prueba en la terminal ejecutar: php artisan migrate:fresh --seed
    
    //use RefreshDatabase;
    /**
     *
     * @test
     */
    

    function test_add_mail()
    {
        $user = User::create([
            'name'      =>'Jose Rojas',
            'rut'       =>'5453533',
            'username'  =>'man33344',
            'email'     =>'manuel34345@example.com',
            'cargo'     =>'RRHH',
            'password'  =>'password',           
        ])->assignRole('Admin');

        $this->actingAs($user)->post("/manage_emails",[
            'name'      =>'Rodrigo Diaz',
            'cargo'     =>'RRHH',
            'email'     =>'testing@test.com',
        ]);

        $this->assertDatabaseHas('recipients', [
            'name'      =>'Rodrigo Diaz',
            'cargo'     =>'RRHH',
            'email'     =>'testing@test.com',
        ]);
        
    }

    function test_show_mail()
    {
        $user = User::create([
            'name'      =>'Jose Rojas',
            'rut'       =>'5453533',
            'username'  =>'man33344',
            'email'     =>'manuel34345@example.com',
            'cargo'     =>'RRHH',
            'password'  =>'password',           
        ])->assignRole('Admin');

        $this->actingAs($user)->post("/manage_emails",[
            'name'      =>'Rodrigo Diaz',
            'cargo'     =>'RRHH',
            'email'     =>'testing@test.com',
        ]);

        $response = $this->actingAs($user)->get(action([ManageEmailController::class, 'show']));
        $response->assertSee('testing@test.com');
    }

    public function test_recipient_delete()
    { 
        $user = User::create([
            'id'        =>'1',
            'name'      =>'Manuel Rojas',
            'rut'       =>'25615612',
            'username'  =>'manolo',
            'email'     =>'manuel@example.com',
            'password'  =>'password',
            'cargo'     =>'RRHH',

        ])->assignRole('Admin');//se le asigna rol de admin

        $recipient = $this->actingAs($user)->post("/manage_emails",[
            'name'      =>'Rodrigo Diaz',
            'cargo'     =>'RRHH',
            'email'     =>'testing@test.com',
        ]);

        $this->actingAs($user)->post("/deleteRecipient/1");
        $this->assertDatabaseMissing('recipients', ['id' => 1]);


    }
}
