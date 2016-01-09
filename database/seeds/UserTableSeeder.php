<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email'    => 'test@email.com',
            'password' => 'password',
            'role'     => 100
        ]);
    }
}
