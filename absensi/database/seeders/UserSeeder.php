<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\Roles;
use App\Models\Users;
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
        $role = Roles::where('name', 'dosen')->first();
        Users::insert([
            'role_id'   => $role->id,
            'nim'       => '1703022',
            'password'  => Hash::make('123456'),
            'nama'      => 'Iryanto., M. SI'
        ]);
    }
}
