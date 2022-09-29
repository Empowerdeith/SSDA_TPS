<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Raffle;
use App\Models\Lista;
use App\Models\ListaRaffle;
use App\Http\Controllers\HistorialController;


class HistorialExportarTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     *
     * @test
     */

    public function exportar_raffle(): void
    {
        User::factory()->create();
        
        Lista::factory()->create();

        Raffle::factory()->create();

        $listaRaffle = ListaRaffle::factory()->create();

        $this->get(action([HistorialController::class, 'export'], $listaRaffle->id))
             ->assertDownload();

    }
}
