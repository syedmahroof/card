<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
     function run()
    {

        $destinations = [
            [
                'name' => 'Dubai',
                'image' => 'canvas/images/destination/3.jpg',
                'price_starting_from' => '100',
                'show_on_index_page'=> '1',
            ],
            [
                'name' => 'Maldives',
                'image' => 'canvas/images/destination/2.jpg',
                'price_starting_from' => '3200',
                'show_on_index_page'=> '1',
            ],
            [
                'name' => 'Bali',
                'image' => 'canvas/images/destination/1.jpg',
                'price_starting_from' => '999',
                'show_on_index_page'=> '1',
            ],
            [
                'name' => 'Georgia',
                'image' => 'canvas/images/destination/4.jpg',
                'price_starting_from' => '1250',
                'show_on_index_page'=> '1',
            ],
            [
                'name' => 'Morocco',
                'image' => 'canvas/images/destination/5.jpg',
                'price_starting_from' => '3000',
                'show_on_index_page'=> '1',
            ],
        ];
        
        foreach ($destinations as $destination) {
            Destination::create([
                'name' => $destination['name'],
                'image' =>$destination['image'],
                'price_starting_from' =>$destination['price_starting_from'],
                'show_on_index_page' =>$destination['show_on_index_page'],
            ]);
        }
    }
}
