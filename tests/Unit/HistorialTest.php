<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Raffle;
use App\Models\Lista;
use App\Models\ListaRaffle;
use App\Http\Controllers\HistorialController;
use Illuminate\Support\Facades\DB;

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

        Raffle::create([
            'id' => '1',
            'rut' => '7651222',
            'name' => 'Colby Herzog',
            'cargo' => 'Veterinarian',
        ]);

        $listaRaffle = ListaRaffle::factory()->create();

        $raffleResult = 
            DB::table('raffle')
            ->select()
            ->join('lista_raffle', 'lista_raffle.raffle_id', '=','raffle.id')
            ->where('lista_raffle.lista_id', '=', 1)
            ->get();

        $response = $this->get(action([HistorialController::class, 'historialdetalle'], $listaRaffle->id));
        $this->assertEquals($raffleResult, $response['query']);
        
        /*$this->get(action([HistorialController::class, 'historialdetalle'], $listaRaffle->id))
            ->assertSuccessful();
        $this->assertDatabaseHas('raffle', ['id' => '1']);
            ->assertTrue(contains('id', '1'));
        
        $response = $this->get(action([HistorialController::class, 'historialdetalle'], $listaRaffle->id));
        dd($response);*/
        
        /*$response->assertViewHasAll([
            'id' => '1',
            'rut' => '7651222',
        ]);*/
    }
}


