<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Egri csillagok',
                'author' => 'Gárdonyi Géza',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'A Pál utcai fiúk',
                'author' => 'Molnár Ferenc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tüskevár',
                'author' => 'Fekete István',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

