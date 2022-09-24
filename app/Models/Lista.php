<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{

    use HasFactory;
    public $table = "lista";

    protected $primarykey = 'id';

    protected $fillable = ['user_id'];

    public function raffles(){
        return $this->belongsToMany(Raffle::class);
    }
    public function UserModels(){
        return $this->belongsTo(User::class);
    }

}
