<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\category;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            'Villa',
            'Apartment',
            'Chillat',
            'Mansion',
        ];

        foreach($categories as $category) {
            category::create([
                'name' => $category
            ]);
        }

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'customer']);

    }
}
