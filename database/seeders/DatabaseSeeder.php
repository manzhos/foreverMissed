<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		DB::table('roles')->insert([
			'role' => 'Admin',
			'description' => 'Can control all aspects of the website, including moderating content posted by others and changing website settings'
		]);
		DB::table('roles')->insert([
			'role' => 'Guest',
			'description' => 'Default access level, can leave tributes, share media and stories'
		]);
    }
}
