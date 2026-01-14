<?php

namespace Database\Seeders;

use App\Services\FirebaseService;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    protected $firebase;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebase = $firebaseService->getDatabase();
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            'instagram' => [
                'followers' => [
                    ['quantity' => 100, 'price' => 2.97, 'discount' => 0],
                    ['quantity' => 250, 'price' => 4.97, 'discount' => 0],
                    ['quantity' => 500, 'price' => 6.99, 'discount' => 10],
                    ['quantity' => 1000, 'price' => 12.99, 'discount' => 15],
                    ['quantity' => 2500, 'price' => 29.99, 'discount' => 20],
                ],
                'reels_views' => [
                    ['quantity' => 500, 'price' => 1.99, 'discount' => 0],
                    ['quantity' => 1000, 'price' => 3.99, 'discount' => 0],
                    ['quantity' => 2500, 'price' => 7.99, 'discount' => 10],
                    ['quantity' => 5000, 'price' => 14.99, 'discount' => 15],
                ],
                'story_views' => [
                    ['quantity' => 100, 'price' => 1.49, 'discount' => 0],
                    ['quantity' => 500, 'price' => 3.49, 'discount' => 0],
                    ['quantity' => 1000, 'price' => 5.49, 'discount' => 10],
                ]
            ],
            'tiktok' => [
                'views' => [
                    ['quantity' => 1000, 'price' => 1.99, 'discount' => 0],
                    ['quantity' => 5000, 'price' => 6.99, 'discount' => 10],
                    ['quantity' => 10000, 'price' => 11.99, 'discount' => 15],
                ],
                'followers' => [
                    ['quantity' => 100, 'price' => 3.99, 'discount' => 0],
                    ['quantity' => 500, 'price' => 9.99, 'discount' => 10],
                    ['quantity' => 1000, 'price' => 16.99, 'discount' => 15],
                ],
                'likes' => [ // Changed from 'like' to 'likes' for plural consistency
                    ['quantity' => 100, 'price' => 2.99, 'discount' => 0],
                    ['quantity' => 500, 'price' => 8.99, 'discount' => 10],
                ],
                'shares' => [
                    ['quantity' => 100, 'price' => 1.99, 'discount' => 0],
                    ['quantity' => 500, 'price' => 4.99, 'discount' => 0],
                ]
            ],
            'facebook' => [
                'page_followers' => [
                    ['quantity' => 100, 'price' => 4.99, 'discount' => 0],
                    ['quantity' => 500, 'price' => 14.99, 'discount' => 10],
                    ['quantity' => 1000, 'price' => 24.99, 'discount' => 15],
                ],
                'post_likes' => [
                    ['quantity' => 100, 'price' => 3.49, 'discount' => 0],
                    ['quantity' => 500, 'price' => 9.99, 'discount' => 10],
                ]
            ]
        ];

        $this->firebase->getReference('products')->set($products);
        $this->command->info('Firebase products seeded successfully!');
    }
}
