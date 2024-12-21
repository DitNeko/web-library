<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Fiksi', 'Non-Fiksi', 'Sains', 'Teknologi', 'Sejarah'];

        foreach($data as $item) {
            Category::create([
                'name' => $item
            ]);
        }
    }
}
