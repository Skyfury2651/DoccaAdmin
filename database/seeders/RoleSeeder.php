<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => Role::ROLE_SUPER_ADMIN]);
        Role::create(['name' => Role::ROLE_MEMBER]);
        Role::create(['name' => Role::ROLE_CUSTOMER]);
        Role::create(['name' => Role::ROLE_SHIPPER]);
    }
}
