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
            'type' =>"Moto",
        ];
        $dados2 =[
            'type' =>"Carro",
        ];
        $dados3 =[
            'type' =>"Caminhão",
        ];
        Vehicle::create($dados);
        echo "veículo 1 criado \n";
        Vehicle::create($dados2);
        echo "veículo 2 criado \n";
        Vehicle::create($dados3);
        echo "veículo 3 criado \n";
    }
}
