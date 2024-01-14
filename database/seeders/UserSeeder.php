<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();
        $users = [
            [
                'name' => 'ITclanBD',
                'username' => 'ic_user',
                'email' => 'user@itclanbd.com',
                'password' => Hash::make('12345678'),
                'type' => 'user',
                'status' => 'active',
                'phone' => '+880 1301055093',
                'email_verified_at' => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'AdminItclan',
                'username' => 'ic_admin',
                'email' => 'info@itclanbd.com',
                'password' => Hash::make('12345678'),
                'type' => 'admin',
                'status' => 'active',
                'phone' => '+8801301055098',
                'email_verified_at' => \Carbon\Carbon::now(),
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
