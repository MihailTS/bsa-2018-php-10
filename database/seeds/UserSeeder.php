<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 'admin')->create([
            'email' => 'test_admin@example.com'
        ]);
        factory(User::class)->create([
            'email' => 'test_user@example.com'
        ]);
    }
}
