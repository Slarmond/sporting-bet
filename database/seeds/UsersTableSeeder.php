<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'id' => 1,
            'name' => 'John Smith',
            'email' => 'jsmith@degenerates.com',
            'role_id' => 1,
        ]);

        factory(App\User::class)->create([
            'id' => 2,
            'name' => 'James Brown',
            'email' => 'jbrown@degenerates.com',
            'role_id' => 2,
        ]);

        factory(App\User::class)->create([
            'id' => 3,
            'name' => 'George Davis',
            'email' => 'gdavis@degenerates.com',
            'role_id' => 3,
        ]);
    }
}
