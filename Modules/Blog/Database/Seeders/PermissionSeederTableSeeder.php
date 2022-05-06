<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class PermissionSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('permissions')->insert([
           'name' => 'view blog posts',
           'guard_name' => 'web'
        ]);

        DB::table('permissions')->insert([
            'name' => 'insert blog posts',
            'guard_name' => 'web'
        ]);

        DB::table('permissions')->insert([
            'name' => 'edit blog posts',
            'guard_name' => 'web'
        ]);

        DB::table('permissions')->insert([
            'name' => 'delete blog posts',
            'guard_name' => 'web'
        ]);

        DB::table('permissions')->insert([
            'name' => 'insert blog category',
            'guard_name' => 'web'
        ]);

        DB::table('permissions')->insert([
            'name' => 'edit blog category',
            'guard_name' => 'web'
        ]);

        DB::table('permissions')->insert([
            'name' => 'delete blog category',
            'guard_name' => 'web'
        ]);

        DB::table('permissions')->insert([
            'name' => 'view blog category',
            'guard_name' => 'web'
        ]);

        // $this->call("OthersTableSeeder");
    }
}
