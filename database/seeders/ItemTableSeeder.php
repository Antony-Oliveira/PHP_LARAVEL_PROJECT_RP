<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{

    static $items = [
        'Sultan',
        'Kombi da paz',
        'Rhino',
        'Escudo',
        'Capa de fogo',
        'VIP Comum',
        'VIP Platina'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$items as $item) {
            DB::table('items')->insert([
                'item_nome' => $item,
                'type' => 'Seed',
                'item_valor' => rand(1, 20),
                'image' => 'black.jpg'
            ]);
        }
    }
}
