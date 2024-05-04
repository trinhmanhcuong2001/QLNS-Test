<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory()->count(20)->create()->each(function ($company){
            $company->departments()->createMany([
                ['code' => 'BGD', 'name' => 'Ban giám đốc', 'parent_id' => 0],
                ['code' => 'DEV', 'name' => 'Phòng phát triển phần mềm', 'parent_id' => 0],
                ['code' => 'QA-Department', 'name' => 'Phòng quản trị chât lượng', 'parent_id' => 0],
                ['code' => 'KT', 'name' => 'Phòng kinh tế', 'parent_id' => 0],
            ]);
        });
    }
}
