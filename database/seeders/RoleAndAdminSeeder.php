<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['admin', 'landlord', 'student'];
        
        foreach ($roles as $roleTitle) {
            Role::firstOrCreate(['title' => $roleTitle]);
        }

        $adminRole = Role::where('title', 'admin')->first();
        
        User::firstOrCreate(
            ['email' => 'admin@weroom.test'],
            [
                'name' => 'Admin taha',
                'phone' => '0620202020',
                'address' => 'Youssoufia',
                'password' => Hash::make('password'),
                'role_id' => $adminRole->id,
            ]
        );
    }
}
