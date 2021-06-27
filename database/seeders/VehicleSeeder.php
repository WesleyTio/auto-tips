<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dados =[
            'Type' =>"Moto",
        ];
        $dados2 =[
            'Type' =>"Carro",
        ];
        $dados3 =[
            'Type' =>"Caminhão",
        ];
        Vehicle::created($dados);
        echo "veículo 1 criado \n";
        Vehicle::created($dados2);
        echo "veículo 2 criado \n";
        Vehicle::created($dados3);
        echo "veículo 3 criado \n";
    }
}
