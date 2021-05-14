<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Url;
class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Url::create([
            'protocol' => 'https',
            'domain' => 'test.com',
            'query_parameters' => 'click=1',
            'multiple_clicks_allowed' => false,
            'status' => true
        ]);

        Url::create([
            'protocol' => 'http',
            'domain' => 'helloworld.in',
            'query_parameters' => 'name=sahil&hobby=movies',
            'multiple_clicks_allowed' => true,
            'status' => true
        ]);
    }
}
