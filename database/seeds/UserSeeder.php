<?php

use App\User;
use Illuminate\Support\Str;
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
        // create admin
        $user = new User;
        $user->name = 'Admin';
        $user->surname = 'Admin';
        $user->type = "business";
        $user->email = 'admin@admin.com';
        $user->country = 'Slovenia';
        $user->city = 'Hrastnik';
        $user->email_verified_at = now();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $user->remember_token = Str::random(10);

        $user->save();
    }
}