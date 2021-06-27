<?php

namespace Database\Seeders;

use App\Models\Url;
use Illuminate\Database\Seeder;

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
            'domain' => 'www.google.com',
            'path' => '/search',
            'query' => 'q=hello+world',
            'max_hits' => 100,
            'hits' => 0,
            'alias' => 'helloworld',
            'created_by' => 1,
            'status' => true,
        ]);

        Url::create([
            'protocol' => 'http',
            'domain' => 'en.wikipedia.org',
            'path' => '/wiki/India',
            'query' => null,
            'max_hits' => 120,
            'hits' => 0,
            'alias' => 'india',
            'created_by' => 1,
            'status' => true,
        ]);

        Url::create([
            'protocol' => 'https',
            'domain' => 'www.google.com',
            'path' => '/search',
            'query' => 'q=hello+world&sxsrf=ALeKk01kLVVuScZNI1CurW0px6zRWtxvaw%3A1621055778102&source=hp&ei=IlmfYOWsA7KcmgfbgZbwDQ',
            'max_hits' => 120,
            'hits' => 0,
            'alias' => 'goo234',
            'created_by' => 1,
            'status' => true,
        ]);
    }
}
