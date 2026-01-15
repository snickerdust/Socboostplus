<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FirebaseService;

class SeedPremiumProducts extends Command
{
    protected $signature = 'firebase:seed-premium';
    protected $description = 'Seed premium products into Firebase for testing';

    protected $firebaseService;

    public function __construct(FirebaseService $firebaseService)
    {
        parent::__construct();
        $this->firebaseService = $firebaseService;
    }

    public function handle()
    {
        $database = $this->firebaseService->getDatabase();

        $premiumData = [
            'facebook' => [
                'page_followers_premium' => [
                    ['quantity' => 1000, 'price' => 29.99],
                    ['quantity' => 2500, 'price' => 59.99],
                    ['quantity' => 5000, 'price' => 99.99],
                ],
                'post_likes_premium' => [
                    ['quantity' => 500, 'price' => 14.99],
                    ['quantity' => 1000, 'price' => 24.99],
                ],
            ],
            'instagram' => [
                'followers_premium' => [
                    ['quantity' => 1000, 'price' => 19.99],
                    ['quantity' => 5000, 'price' => 79.99],
                ],
                'likes_premium' => [
                    ['quantity' => 1000, 'price' => 9.99],
                    ['quantity' => 5000, 'price' => 39.99],
                ],
                'reels_views_premium' => [
                    ['quantity' => 5000, 'price' => 14.99],
                    ['quantity' => 10000, 'price' => 24.99],
                ],
                 'story_views_premium' => [
                    ['quantity' => 1000, 'price' => 4.99],
                ],
            ],
            'tiktok' => [
                'followers_premium' => [
                    ['quantity' => 1000, 'price' => 15.99],
                ],
                'likes_premium' => [
                    ['quantity' => 1000, 'price' => 12.99],
                ],
                'shares_premium' => [
                    ['quantity' => 500, 'price' => 9.99],
                ],
                'views_premium' => [
                    ['quantity' => 10000, 'price' => 19.99],
                ],
            ],
        ];

        foreach ($premiumData as $platform => $categories) {
            foreach ($categories as $category => $products) {
                $path = "products/{$platform}/{$category}";
                $this->info("Seeding $path...");
                $database->getReference($path)->set($products);
            }
        }

        $this->info('Premium products seeded successfully!');
    }
}
