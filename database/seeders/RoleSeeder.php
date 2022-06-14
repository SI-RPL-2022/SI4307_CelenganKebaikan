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
        $roles = ['admin', 'relawan', 'user'];

        foreach ($roles as $item) {
            Role::create([
                'nama' => $item
            ]);
        }
    }
}
