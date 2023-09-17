<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     

        DB::table('roles')->insert([
            'name'=>'Admin'
        ]);

        DB::table('roles')->insert([
            'name'=>'Product manager'
        ]);

        DB::table('roles')->insert([
            'name'=>'Category manager'
        ]);

        DB::table('roles')->insert([
            'name'=>'Subcategory manager'
        ]);
        DB::table('roles')->insert([
            'name'=>'Sub-subcategory manager'
        ]);
    }
}
