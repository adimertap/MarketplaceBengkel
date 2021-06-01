<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $response = Http::withHeaders([
            'key'=> '941b51f4786c2ad2cf4e8a43828be7c4'
        ])->get('https://api.rajaongkir.com/starter/city');

        $cities = $response['rajaongkir']['results'];
        
        foreach($cities as $city){
            $data_city[]=[
                'id' => $city['city_id'],
                'province_id' => $city['province_id'],
                'type' => $city['type'],
                'city_name' => $city['city_name'],
                'postal_code' => $city['postal_code'],
            ];
        }
        City::insert($data_city);
    }
}
