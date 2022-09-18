<?php

namespace Database\Seeders;

use App\Models\Service;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           
    
       $services =[
        [
            'reference'=>'Ref1DOU001',
            'name' =>'Ouverture de compte / opening account',
            'price'=>'30.00',
            

        ],
        [
            'reference'=>'Ref1DOU002',
            'name' =>'Notification d un titre de transit',
            'price'=>'25.00',

        ],
        [
            'reference'=>'Ref1DOU003',
            'name' =>'Notification a partir du deuxieme transit',
            'price'=>'15.00',
            

        ],
        [
            'reference'=>'Ref1DOU005',
            'name' =>'Frais de rechargement par coup de fourche',
            'price'=>'50.00',

        ],
        [
            'reference'=>'Ref1DOU006',
            'name' =>'Stockage : forfait de 48 h par palette',
            'price'=>'15.00',

        ], [
            'reference'=>'Ref1DOU014',
            'name' =>'Impression documents 1 à 10 pages',
            'price'=>'10.00',

        ],
        [
            'reference'=>'Ref1DOU015',
            'name' =>'Impression documents 11 à 20 pages',
            'price'=>'5.00',

        ],
        [
            'reference'=>'Ref1DOU016',
            'name' =>'Impression document > 20 pages / page',
            'price'=>'0.50',

        ],
];
            foreach ( $services as $key =>  $service) {
                Service::create( $service);
            }
    }
}
