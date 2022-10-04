<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\RaffleController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lista;
use App\Models\ListaRaffle;
use App\Models\Raffle;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailsend;
use Session;
use Alert;

use Illuminate\Foundation\Testing\RefreshDatabase;


class RaffleTest extends TestCase
{
    /**
     *
     * @test
     */
    
    public function test_raffle_get_vacaciones()
    {
        $response = $this->get(action([RaffleController::class, 'get_vacaciones']));
        array($response);
        dd($response);
    }

    public function test_raffle_licenciapermiso()
    {
        $response = $this->get(action([RaffleController::class, 'licenciapermiso']));
        dd($response);
    }

    public function test_raffle_generateRaffle()
    {
        $response = $this->get(action([RaffleController::class, 'generateRaffle']));
        dd($response);
    }
}
