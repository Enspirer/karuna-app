<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class PermissionRemovalSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('permissions')
            ->where('name','view blog posts')
            ->delete();

        DB::table('permissions')
            ->where('name','insert blog posts')
            ->delete();

        DB::table('permissions')
            ->where('name','edit blog posts')
            ->delete();

        DB::table('permissions')
            ->where('name','delete blog posts')
            ->delete();

        DB::table('permissions')
            ->where('name','insert blog category')
            ->delete();

        DB::table('permissions')
            ->where('name','edit blog category')
            ->delete();

        DB::table('permissions')
            ->where('name','delete blog category')
            ->delete();

        DB::table('permissions')
            ->where('name','view blog category')
            ->delete();
        // $this->call("OthersTableSeeder");
    }
}
