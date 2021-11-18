<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['dosen', 'mahasiswa'];

        foreach($roles as $role) {
            Roles::insert([
                'name' => $role
            ]);
        }
    }
}
