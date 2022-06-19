<?php

namespace Database\Seeders;

use App\Models\CategoryType;
use Illuminate\Database\Seeder;

class CategoryTypesTableSeeder extends Seeder
{
    static $types = [
        [
            'title' => 'Receita',
            'description' => 'Valores recebidos',
            'color' => '#49be25',
            'is_active' => true
        ],
        [
            'title' => 'Despesa',
            'description' => 'Valores pagos',
            'color' => '#be4025',
            'is_active' => true
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$types as $type) {
            CategoryType::create($type);
        }
    }
}
