<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tip extends Model
{
    use HasFactory;

    public function vehicle(){

         return $this->BelongsTo(Vehicle::class);
    }

    public function user(){

        return $this->BelongsTo(User::class);
   }
}
