<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListRaffle extends Model
{
    use HasFactory;
    public $table = "list_raffle";

    protected $primarykey = 'id';

    protected $fillable = ['id','date',];

    public function raffleModels(){
        return $this->hasMany(RaffleModel::class);
    }
    
}
