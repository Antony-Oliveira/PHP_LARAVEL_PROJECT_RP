<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServerTableSeeder extends Seeder
{
    static $servers = [
        'Brazillian RP',
        'São Paulo RP',
        'Green RP'
    ];
    
    public function run()
    {
        foreach (self::$servers as $server) {
            DB::table('servers')->insert([
                'server_nome' => $server
            ]);
        }
    }
}
