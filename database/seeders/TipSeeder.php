<?php

namespace Database\Seeders;

use App\Models\Tip;
use Illuminate\Database\Seeder;

class TipSeeder extends Seeder
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
            'fk_user' =>"1",
            'fk_vehicle' => "1",
            'tip' => "Essa moto é top",
            'brand' => "Honda",
            'model' => "Titan 150",
            'version' => "Edição de 150 anos",
        ];
        if(Tip::create($dados)){
            echo "moto criada criado \n";
        }

        $dados2 =[
            'fk_user' =>"1",
            'fk_vehicle' => "2",
            'tip' => "Carro é top",
            'brand' => "Toyota",
            'model' => "Corolla",
            'version' => "XRL",
        ];
        if(Tip::create($dados2)){
            echo "carro criado criado \n";
        }

        $dados3 =[
            'fk_user' =>"1",
            'fk_vehicle' => "3",
            'tip' => "Aí  é potencia",
            'brand' => "Mercedes",
            'model' => "1518",
            'version' => "turbo",
        ];
        if(Tip::create($dados3)){
            echo "caminhao criado criado \n";
        }


    }
}
