<?php

namespace Database\Seeders;


use App\Models\Commande;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           
    
       $commandes =[

        [
            'reference'=>'Ref1',
            'name' =>'Commande 1',
            'date'=>'2022-09-01 00:00'

        ],
     

];
            foreach ( $commandes as $key =>  $commande) {
                Commande::create( $commande);
            }
    }
}
