<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Raffle;
use App\Models\Lista;
use App\Models\ListaRaffle;
use App\Http\Controllers\HistorialController;


class HistorialTest extends TestCase
{   
    use RefreshDatabase;
    
    /**
     *
     * @test
     */

    public function mostrar_trabajador_raffle(): void
    {
        User::factory()->create();
        
        Lista::factory()->create();

        Raffle::factory()->create();

        $listaRaffle = ListaRaffle::factory()->create();

        $this->get(action([HistorialController::class, 'historialdetalle'], $listaRaffle->id))
            ->assertStatus(200);            
    }
}


