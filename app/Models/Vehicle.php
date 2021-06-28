<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'type',

    ];
    use HasFactory;
    public function tips(){

        return $this->hasmany(Tip::class, 'fk_vehicle');
    }
}
