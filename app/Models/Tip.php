<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tip extends Model
{
    use HasFactory;
    protected $fillable = [
        'tip',
        'brand',
        'model',
        'version',
        'fk_user',
        'fk_vehicle',
    ];

    public function vehicle(){

         return $this->BelongsTo(Vehicle::class, 'fk_vehicle');
    }

    public function user(){

        return $this->BelongsTo(User::class, 'fk_user');
   }
}
