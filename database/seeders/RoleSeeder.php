<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['role' => 'Mức 0',
            'description' => 'Có thể có mọi quyền'],
            ['role' => 'Mức 1',
            'description' => 'Quyền dưới mức 0'],
            ['role' => 'Mức 2',
            'description' => 'Quyền dưới mức 1'],
        ]);
    }
}
