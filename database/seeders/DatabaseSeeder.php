<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $data = [
            'first_name' => 'admin',
            'email' => 'admin@laravelcrm.loc',
            'password' => Hash::make('12345678')
        ];
        $r = User::create($data);

        //add user to admin role
        $userRole = [
            'user_id'=> $r->id,
            'role_id'=> 1
        ];
        UserRole::create($userRole);   
    }
}
