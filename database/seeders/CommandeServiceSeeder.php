<?php

namespace Database\Seeders;
use App\Models\CommandeService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommandeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commandesServices =[
            [
                'commande_id'=>'1',
                'service_id' =>'1',
                'quantity'=>1,
                'total'=>30
    
            ],
            [
                'commande_id'=>'1',
                'service_id' =>'2',
                'quantity'=>1,
                'total'=>25
    
            ],
            [
                'commande_id'=>'1',
                'service_id' =>'3',
                'quantity'=>2,
                'total'=>30
            ],
    
    ];
                foreach ( $commandesServices as $key =>  $commandeService) {
                    CommandeService::create( $commandeService);
                }
        }
    }
    