<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Province;

class ProvinceSeeder extends Seeder
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
        ])->get('https://api.rajaongkir.com/starter/province');

        $provinces = $response['rajaongkir']['results'];
        
        foreach($provinces as $province){
            $data_provinces[]=[
                'id' => $province['province_id'],
                'province' => $province['province'],
            ];
        }
        Province::insert($data_provinces);

    }
}
