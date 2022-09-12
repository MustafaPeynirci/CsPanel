<?php

namespace Database\Seeders;

use App\Models\User\Role;
use App\Models\User\User;
use App\Models\User\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $user = new User([
            'name' => 'Root',
            'email'=> 'grhn@gmail.com',
            'password'=>bcrypt('123456'),
        ]);
        $user->save();
        $role = new Role([
            'name' => 'root',
            'text' => 'root'
        ]);
        $role->save();
        $user_role = new UserRole([
            'user_id' => 1,
            'role_id' => 1
        ]);
        $user_role->save();
    }
}
