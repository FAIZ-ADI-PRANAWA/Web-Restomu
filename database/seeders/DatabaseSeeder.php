<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Categories
        $categories = [
            ['name' => 'Starter', 'slug' => 'starter'],
            ['name' => 'Main Course', 'slug' => 'main-course'],
            ['name' => 'Dessert', 'slug' => 'dessert'],
            ['name' => 'Signature Drink', 'slug' => 'signature-drink'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert(array_merge($category, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Get Category IDs
        $starterId = DB::table('categories')->where('slug', 'starter')->value('id');
        $mainId = DB::table('categories')->where('slug', 'main-course')->value('id');
        $dessertId = DB::table('categories')->where('slug', 'dessert')->value('id');
        $drinkId = DB::table('categories')->where('slug', 'signature-drink')->value('id');

        // 2. Seed Menus
        $menus = [
            [
                'category_id' => $starterId,
                'name' => 'Truffle Mushroom Soup',
                'description' => 'Creamy wild mushroom soup infused with white truffle oil and served with garlic croutons.',
                'price' => 55000,
                'image' => '/images/food-1.jpg', // Using food-1
                'is_featured' => false,
            ],
            [
                'category_id' => $starterId,
                'name' => 'Bruschetta Pomodoro',
                'description' => 'Grilled rustic bread topped with fresh tomatoes, basil, garlic, and extra virgin olive oil.',
                'price' => 45000,
                'is_featured' => false,
                'image' => '/images/food-2.jpg', // Using food-2
            ],
            [
                'category_id' => $mainId,
                'name' => 'Wagyu Beef Steak',
                'description' => 'Premium Wagyu beef grilled to perfection, served with mashed potatoes and seasonal vegetables.',
                'price' => 350000,
                'is_featured' => true,
                'image' => '/images/food-1.jpg', // Reusing food-1
            ],
            [
                'category_id' => $mainId,
                'name' => 'Salmon En Papillote',
                'description' => 'Fresh salmon fillet baked in parchment with lemon, herbs, and asparagus.',
                'price' => 180000,
                'is_featured' => true,
                'image' => '/images/food-2.jpg', // Reusing food-2
            ],
            [
                'category_id' => $mainId,
                'name' => 'Chicken Cordon Bleu',
                'description' => 'Breaded chicken breast stuffed with smoked ham and melted swiss cheese.',
                'price' => 95000,
                'is_featured' => false,
                'image' => '/images/food-1.jpg',
            ],
            [
                'category_id' => $dessertId,
                'name' => 'Molten Chocolate Lava Cake',
                'description' => 'Warm chocolate cake with a gooey center, served with vanilla bean ice cream.',
                'price' => 65000,
                'is_featured' => true,
                'image' => '/images/food-2.jpg',
            ],
            [
                'category_id' => $dessertId,
                'name' => 'Tiramisu Classico',
                'description' => 'Traditional Italian dessert with layers of coffee-soaked ladyfingers and mascarpone cream.',
                'price' => 60000,
                'is_featured' => false,
                'image' => '/images/food-1.jpg',
            ],
             [
                'category_id' => $drinkId,
                'name' => 'Restomu Signature Mocktail',
                'description' => 'Refreshing blend of lime, mint, and elderflower syrup topped with soda water.',
                'price' => 45000,
                'is_featured' => false,
                'image' => '/images/food-2.jpg',
            ],
        ];

        foreach ($menus as $menu) {
            DB::table('menus')->insert(array_merge($menu, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
