<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Providers\RouteServiceProvider;
use Database\Factories\UserFactory;

class ListUserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_page_showUser()
    {
        $this->get('/showUsers')
            ->assertStatus(200);
    }

    function users_list()
    {


    }

}
