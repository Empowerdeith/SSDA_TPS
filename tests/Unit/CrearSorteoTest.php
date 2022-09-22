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

class CrearSorteoTest extends TestCase
{
    /**
    * @test
    */

    use DatabaseTransactions;

    public function crear_raffle()
    {
        $insertedraffle = Raffle::create([
            'id' => '2',
            'rut' => '25615612',
            'name' => 'Manuel Rojas',
            'cargo' => 'RRHH',
            'CREATED_AT' => '20/09/22 13:09:09,819585300',
            'UPDATED_AT' => '20/09/22 13:09:09,819585300',
        ]);
        
        $retrievedraffle = Raffle::latest()->get();
        
        $this->assertEquals($insertedraffle->toArray(), $retrievedraffle[0]->toArray());
    }
}
