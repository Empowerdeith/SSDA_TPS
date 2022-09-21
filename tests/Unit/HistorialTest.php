<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Factories\RaffleFactory;
use Tests\TestCase;
use App\Models\Raffle;
use App\Models\Lista;
use App\Models\ListaRaffle;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HistorialController;


class HistorialTest extends TestCase
{   
    use RefreshDatabase;
    
    /**
    * @test
    */

    public function mostrar_trabajador_raffle(): void
    {
        $raffle = Raffle::create([
            'id' => '1',
            'rut' => '173549845',
            'name' => 'Jesus de Nazareth',
            'cargo' => 'RRHH',
        ]);

        $lista = Lista::create([
            'id' => '1',         
        ]);

        $listaRaffle = ListaRaffle::create([
            'RAFFLE_ID' => '1',
            'LISTA_ID' => '1',         
        ]);

        $this->get(action([HistorialController::class, 'historialdetalle'], $lista->id))
            ->assertStatus(200)
            ->assertSee('173549845');
    }
}

