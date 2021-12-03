<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('table')->truncate();
        DB::table('status')->delete();
        DB::table('status')->insert(['id' => 1, 'name' => 'Ativo', 'created_at' => date('Y-m-d H:i:s')]);
        DB::table('status')->insert(['id' => 2, 'name' => 'Inativo', 'created_at' => date('Y-m-d H:i:s')]);
        DB::table('status')->insert(['id' => 3, 'name' => 'Cancelado', 'created_at' => date('Y-m-d H:i:s')]);
        DB::table('status')->insert(['id' => 4, 'name' => 'Inadimplente', 'created_at' => date('Y-m-d H:i:s')]);
        DB::table('status')->insert(['id' => 5, 'name' => 'Pendente', 'created_at' => date('Y-m-d H:i:s')]);
    }
}
